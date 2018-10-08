<?php

class Comment extends \Phalcon\Mvc\Model
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
    public $commentContent;

    /**
     *
     * @var string
     */
    public $commentDate;

    /**
     *
     * @var string
     */
    public $commentEmail;

    /**
     *
     * @var string
     */
    public $commentName;

    /**
     *
     * @var string
     */
    public $commentOnId;

    /**
     *
     * @var string
     */
    public $commentOnType;

    /**
     *
     * @var string
     */
    public $commentSharpURL;

    /**
     *
     * @var string
     */
    public $commentThumbnailURL;

    /**
     *
     * @var string
     */
    public $commentURL;

    /**
     *
     * @var string
     */
    public $commentOriginalCommentId;

    /**
     *
     * @var string
     */
    public $commentOriginalCommentName;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("comment");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'comment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Comment[]|Comment|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Comment|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
