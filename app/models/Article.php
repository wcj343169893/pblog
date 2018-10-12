<?php

class Article extends BaseModel
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $articleTitle;

    /**
     *
     * @var string
     */
    public $articleAbstract;

    /**
     *
     * @var string
     */
    public $articleTypeId;

    /**
     *
     * @var string
     */
    public $articleTags;

    /**
     *
     * @var string
     */
    public $articleAuthorEmail;

    /**
     *
     * @var integer
     */
    public $articleCommentCount;

    /**
     *
     * @var integer
     */
    public $articleViewCount;

    /**
     *
     * @var string
     */
    public $articleContent;

    /**
     *
     * @var string
     */
    public $articlePermalink;

    /**
     *
     * @var string
     */
    public $articleHadBeenPublished;

    /**
     *
     * @var string
     */
    public $articleIsPublished;

    /**
     *
     * @var string
     */
    public $articlePutTop;

    /**
     *
     * @var string
     */
    public $articleCreateDate;

    /**
     *
     * @var string
     */
    public $articleUpdateDate;

    /**
     *
     * @var string
     */
    public $articleRandomDouble;

    /**
     *
     * @var string
     */
    public $articleSignId;

    /**
     *
     * @var string
     */
    public $articleCommentable;

    /**
     *
     * @var string
     */
    public $articleViewPwd;

    /**
     *
     * @var string
     */
    public $articleEditorType;

    /**
     *
     * @var string
     */
    public $source;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        //动态更新字段
        $this->useDynamicUpdate(true); 
        $this->setSchema("cjblog");
        $this->setSource("article");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'article';
    }

    public static function findById($id)
    {
        return parent::findFirst("id=".$id);
    }
    
    public function updateVisite($id,$viewCount){
        $data =[
            'id' => $id,
            'articleViewCount' => $viewCount,
        ];
        $this->save($data);
    }

}
