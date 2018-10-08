<?php

class Link extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $oId;

    /**
     *
     * @var string
     */
    public $linkAddress;

    /**
     *
     * @var string
     */
    public $linkDescription;

    /**
     *
     * @var integer
     */
    public $linkOrder;

    /**
     *
     * @var string
     */
    public $linkTitle;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("link");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'link';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Link[]|Link|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Link|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
