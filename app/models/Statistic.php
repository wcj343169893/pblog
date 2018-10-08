<?php

class Statistic extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $oId;

    /**
     *
     * @var integer
     */
    public $statisticBlogArticleCount;

    /**
     *
     * @var integer
     */
    public $statisticBlogCommentCount;

    /**
     *
     * @var integer
     */
    public $statisticBlogViewCount;

    /**
     *
     * @var integer
     */
    public $statisticPublishedBlogArticleCount;

    /**
     *
     * @var integer
     */
    public $statisticPublishedBlogCommentCount;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("statistic");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'statistic';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Statistic[]|Statistic|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Statistic|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
