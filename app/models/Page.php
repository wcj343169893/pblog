<?php

class Page extends \Phalcon\Mvc\Model
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
    public $pageCommentCount;

    /**
     *
     * @var string
     */
    public $pageContent;

    /**
     *
     * @var integer
     */
    public $pageOrder;

    /**
     *
     * @var string
     */
    public $pagePermalink;

    /**
     *
     * @var string
     */
    public $pageTitle;

    /**
     *
     * @var string
     */
    public $pageCommentable;

    /**
     *
     * @var string
     */
    public $pageType;

    /**
     *
     * @var string
     */
    public $pageOpenTarget;

    /**
     *
     * @var string
     */
    public $pageEditorType;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("page");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'page';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Page[]|Page|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Page|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
