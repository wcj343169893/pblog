<?php

class Tag extends BaseModel
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
}
