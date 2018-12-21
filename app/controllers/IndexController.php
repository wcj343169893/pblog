<?php
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    var $columns = [
        "id",
        "articleTitle",
        "articleAbstract",
        "articleTags",
        "articleCreateDate",
        "articleViewCount"
    ];

    /**
     * 首页
     */
    public function indexAction($key = "")
    {
        $currentPage = $this->dispatcher->getParam(0);
        if (empty($currentPage)) {
            $currentPage = 1;
        }
        $articles = Article::find([
            "articleIsPublished=1",
            "columns" => $this->columns,
            "order" => [
                "id desc"
            ]
        ]);
        $paginator = new PaginatorModel([
            "data" => $articles,
            "limit" => 20,
            "page" => $currentPage
        ]);
        // Get the paginated results
        $page = $paginator->getPaginate();
        $this->set("page", $page);
        $this->set("tagNames", $this->getTagStyles());
        $this->set("hotTags", $this->getHotTags());
        $this->set("nav", 1);
        $this->set("plink", "/pages/");
        $this->setLayoutTitle("越简单，越美好");
    }

    /**
     * 搜索
     */
    public function searchAction()
    {
        $name = $this->request->getQuery("key");
        $name = str_replace([
            "'",
            "\""
        ], "", $name);
        $this->indexAction($name);
        $this->set("plink", "/search/");
        $this->setLayoutTitle("搜索：" . $name);
    }

    /**
     * 详细页面
     */
    public function detailAction()
    {
        $id = $this->dispatcher->getParam(0);
        $articles = Article::findById($id);
        if (! $articles) {
            return $this->dispatcher->forward([
                "action" => "error"
            ]);
        }
        // 增加浏览量
        $success = $this->di->get('db')->query("update article set articleViewCount = articleViewCount+1 where id = $id");
        $this->set("data", $articles);
        $this->set("tagNames", $this->getTagStyles());
        $this->setLayoutTitle($articles->articleTitle);
    }

    /**
     * 标签页面
     */
    public function tagsAction()
    {
        // 查询所有的标签
        $tag = Tag::find([
            "order" => "tagReferenceCount desc"
        ]);
        $this->set("nav", 4);
        $this->set("tags", $tag);
        $this->set("hotTags", $this->getHotTags());
        $this->set("tagNames", $this->getTagStyles());
        $this->setLayoutTitle("所有标签");
    }

    /**
     * 分页查询指定标签下的内容
     */
    public function tagcontentAction()
    {
        $name = $this->dispatcher->getParam(0);
        $currentPage = $this->dispatcher->getParam(1);
        if (empty($currentPage)) {
            $currentPage = 1;
        }
        $name = str_replace([
            "'",
            "\""
        ], "", $name);
        if ($name == "cakephp") {
            $this->set("nav", 2);
        } else {
            $this->set("nav", 4);
        }
        // 查询标签的id
        $tag = Tag::findFirst([
            "tagTitle='" . $name . "'"
        ]);
        if (! $tag) {
            return $this->dispatcher->forward([
                "action" => "error"
            ]);
        }
        $articles = ArticleWithTags::find([
            "articleIsPublished=1 and tag_oId=" . $tag->oId,
            "columns" => $this->columns,
            "order" => [
                "id desc"
            ]
        ]);
        $paginator = new PaginatorModel([
            "data" => $articles,
            "limit" => 10,
            "page" => $currentPage
        ]);
        // Get the paginated results
        $page = $paginator->getPaginate();
        $this->set("page", $page);
        $this->set("tagNames", $this->getTagStyles());
        $this->set("taginfo", $tag);
        $this->set("hotTags", $this->getHotTags());
        $this->set("plink", "/tag/" . $name . "/");
        $this->setLayoutTitle($name."下的内容");
    }

    /**
     * 友情链接
     */
    public function linkAction()
    {
        $link = Link::find([
            "order" => "linkOrder desc"
        ]);
        $this->set("nav", 3);
        $this->set("links", $link);
        $this->set("hotTags", $this->getHotTags());
        $this->setLayoutTitle("友情链接");
    }

    /**
     * 错误页面
     */
    public function errorAction()
    {
        $this->setLayoutTitle("访问错误");
    }

    public function followingAction(){
        $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1NDUzNjg2MDQsImV4cCI6MTg2MDcyODYwNCwidWlkIjoiNDE3OTA1MiIsInVzZXJuYW1lIjoiMTAwMDAwMDBmQHFxLmNvbSJ9.5zbjK3fJOPw7kiLnLVO2m8BqEv3a2Bst-IUrFarjlzU";
        $url="http://www.suyet.info/m/user/following?jwt=";
        $data = $this->httpGet($url.$token);
        $data=json_decode($data);
        $out=[];
        if(!empty($data)){
            foreach ($data as $da){
                if(in_array($da->uid, [4245978,4133835]) && $da->live_status){
                    $out[]=$da->uid;//$da->username;
                }
            }
            if(!empty($out)){
                //12小时
                $lifetime=43200;
                /**
                 * 
                 * @var \Phalcon\Cache\Backend\File $cache
                 */
                $cache = $this->getDI()->get('cache');
                $key="follow_".implode("_", $out);
                $isSend = $cache->get($key,$lifetime);
                if(empty($isSend)){
                    //如果12小时内存在，则不再推送
                    $qu=[
                        "id"=>implode(" ", $out),
                        "uid"=>1554141,
                        "name"=>"用户",
                        "url"=>"",
                    ];
                    //调用微信通知
                    $this->httpGet("http://www.mofing.com/wechat/pages/sendbdkmessage.json?".http_build_query($qu));
                    $cache->save($key,"ok",$lifetime);
                }
            }
        }
        $this->view->disableLevel(array(
            View::LEVEL_ACTION_VIEW => true,
            View::LEVEL_LAYOUT => true,
            View::LEVEL_MAIN_LAYOUT => true,
            View::LEVEL_AFTER_TEMPLATE => true,
            View::LEVEL_BEFORE_TEMPLATE => true
        ));
        //返回json格式
        $this->response->setContentType('application/json', 'UTF-8');
        echo json_encode($out);
    }
    
    private function httpGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        
        $res = curl_exec($curl);
        curl_close($curl);
        
        return $res;
    }
    /**
     * 查询当前热门的标签
     *
     * @return Tag[]|Tag|\Phalcon\Mvc\Model\ResultSetInterface
     */
    private function getHotTags()
    {
        $tags = Tag::find([
            "limit" => 10,
            "oId <>1402293843595",
            "order" => "tagReferenceCount desc",
            "columns" => [
                "oId",
                "tagTitle"
            ]
        ]);
        return $tags;
    }

    private function getTagStyles()
    {
        return [
            "label-default",
            "label-primary",
            "label-success",
            "label-info",
            "label-warning"
        ];
    }
}

