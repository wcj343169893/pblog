<?php

class Tag extends \Phalcon\Mvc\Model
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
    public $tagPublishedRefCount;

    /**
     *
     * @var integer
     */
    public $tagReferenceCount;

    /**
     *
     * @var string
     */
    public $tagTitle;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        //动态更新字段
        $this->useDynamicUpdate(true);
        $this->setSchema("cjblog");
        $this->setSource("tag");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tag';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tag[]|Tag|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tag|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
