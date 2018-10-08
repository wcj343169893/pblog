<?php

class Preference extends \Phalcon\Mvc\Model
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
    public $adminEmail;

    /**
     *
     * @var string
     */
    public $allowVisitDraftViaPermalink;

    /**
     *
     * @var string
     */
    public $commentable;

    /**
     *
     * @var string
     */
    public $feedOutputMode;

    /**
     *
     * @var integer
     */
    public $articleListDisplayCount;

    /**
     *
     * @var integer
     */
    public $relevantArticlesDisplayCount;

    /**
     *
     * @var integer
     */
    public $articleListPaginationWindowSize;

    /**
     *
     * @var string
     */
    public $articleListStyle;

    /**
     *
     * @var string
     */
    public $blogHost;

    /**
     *
     * @var string
     */
    public $blogSubtitle;

    /**
     *
     * @var string
     */
    public $blogTitle;

    /**
     *
     * @var string
     */
    public $enableArticleUpdateHint;

    /**
     *
     * @var integer
     */
    public $externalRelevantArticlesDisplayCount;

    /**
     *
     * @var string
     */
    public $htmlHead;

    /**
     *
     * @var string
     */
    public $keyOfSolo;

    /**
     *
     * @var string
     */
    public $localeString;

    /**
     *
     * @var string
     */
    public $metaDescription;

    /**
     *
     * @var string
     */
    public $metaKeywords;

    /**
     *
     * @var integer
     */
    public $mostCommentArticleDisplayCount;

    /**
     *
     * @var integer
     */
    public $mostUsedTagDisplayCount;

    /**
     *
     * @var integer
     */
    public $mostViewArticleDisplayCount;

    /**
     *
     * @var string
     */
    public $noticeBoard;

    /**
     *
     * @var string
     */
    public $pageCacheEnabled;

    /**
     *
     * @var integer
     */
    public $randomArticlesDisplayCount;

    /**
     *
     * @var integer
     */
    public $recentCommentDisplayCount;

    /**
     *
     * @var integer
     */
    public $recentArticleDisplayCount;

    /**
     *
     * @var string
     */
    public $signs;

    /**
     *
     * @var string
     */
    public $skinDirName;

    /**
     *
     * @var string
     */
    public $skinName;

    /**
     *
     * @var string
     */
    public $skins;

    /**
     *
     * @var string
     */
    public $timeZoneId;

    /**
     *
     * @var string
     */
    public $version;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var string
     */
    public $subject;

    /**
     *
     * @var string
     */
    public $editorType;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cjblog");
        $this->setSource("preference");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'preference';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Preference[]|Preference|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Preference|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
