<?php

class UserCitylist extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $cityid;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $tags;

    /**
     *
     * @var integer
     */
    public $ishot;

    /**
     *
     * @var string
     */
    public $t_name;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("user_citylist");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_citylist';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserCitylist[]|UserCitylist|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserCitylist|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
