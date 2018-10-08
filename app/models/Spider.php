<?php

class Spider extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $charset;

    /**
     *
     * @var string
     */
    public $clear_content_reg;

    /**
     *
     * @var integer
     */
    public $count;

    /**
     *
     * @var string
     */
    public $edTime;

    /**
     *
     * @var integer
     */
    public $isVisible;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $sdTime;

    /**
     *
     * @var string
     */
    public $spider_start;

    /**
     *
     * @var integer
     */
    public $start;

    /**
     *
     * @var integer
     */
    public $sumCount;

    /**
     *
     * @var string
     */
    public $tids;

    /**
     *
     * @var string
     */
    public $web_content_begin;

    /**
     *
     * @var string
     */
    public $web_content_end;

    /**
     *
     * @var string
     */
    public $web_content_title;

    /**
     *
     * @var string
     */
    public $web_host;

    /**
     *
     * @var string
     */
    public $web_list_begin;

    /**
     *
     * @var string
     */
    public $web_list_contain;

    /**
     *
     * @var string
     */
    public $web_list_end;

    /**
     *
     * @var string
     */
    public $web_list_url;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("spider");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'spider';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Spider[]|Spider|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Spider|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
