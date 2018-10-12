<?php

class ArticleWithTags extends BaseModel
{

    /**
     *
     * @var string
     */
    public $tag_oId;

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
    public $articleIsPublished;

    /**
     *
     * @var string
     */
    public $articleTags;

    /**
     *
     * @var integer
     */
    public $articleViewCount;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("article_with_tags");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'article_with_tags';
    }


}
