<?php
use Phalcon\Mvc\View;

/**
 * 获取网络链接内容
 * @author Wenchaojun <343169893@qq.com>
 *
 */
class CrawlController extends \Phalcon\Mvc\Controller
{
    
    public function indexAction()
    {
        $url = $this->request->getPost("url");
        $this->view->disableLevel(array(
            View::LEVEL_ACTION_VIEW => true,
            View::LEVEL_LAYOUT => true,
            View::LEVEL_MAIN_LAYOUT => true,
            View::LEVEL_AFTER_TEMPLATE => true,
            View::LEVEL_BEFORE_TEMPLATE => true
        ));
        $this->response->setContentType('application/json', 'UTF-8');
        echo  $this->httpGet($url);
        //die();
        //$this->response->setJsonContent(json_decode($content));
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
    
}
