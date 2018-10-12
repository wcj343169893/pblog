<?php

class Link extends BaseModel
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

}
