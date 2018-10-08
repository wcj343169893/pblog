<?php

class ArticleWithTags extends \Phalcon\Mvc\Model
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

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticleWithTags[]|ArticleWithTags|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticleWithTags|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
