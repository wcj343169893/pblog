<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
});
$di->set('profiler', function(){
    return new \Phalcon\Db\Profiler();
}, true);
/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function ()use($di) {
    $config = $this->getConfig();
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }
    $connection = new $class($params);
    if($config->debug){
        //新建一个事件管理器
        $eventsManager = new \Phalcon\Events\Manager();
        
        //从di中获取共享的profiler实例
        $profiler = $di->getProfiler();
        
        //监听所有的db事件
        $eventsManager->attach('db', function($event, $connection) use ($profiler) {
            //一条语句查询之前事件，profiler开始记录sql语句
            if ($event->getType() == 'beforeQuery') {
                $profiler->startProfile($connection->getSQLStatement());
            }
            //一条语句查询结束，结束本次记录，记录结果会保存在profiler对象中
            if ($event->getType() == 'afterQuery') {
                $profiler->stopProfile();
            }
        });
        //将事件管理器绑定到db实例中
        $connection->setEventsManager($eventsManager);
    }
    return $connection;
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
//在\Phalcon\DI\FactoryDefault()中默认ORM的缓存使用modelsCache名进行注册，所有我们也使用同样的名字进行注册以覆盖默认的modelsCache。
$di->set('modelsCache', function () {
    $config = $this->getConfig();
    //全局默认有效时间缓存1天
    $frontCache = new Phalcon\Cache\Frontend\Data([
        "lifetime" => 86400  
    ]);
    $cache = new Phalcon\Cache\Backend\File(
        $frontCache,
        [
            'cacheDir' => $config->application->cacheDir
        ]);
    return $cache;
});
/**
 * DI注册缓存服务
 * https://gitee.com/KevinJay/PhalconCMS/blob/master/app/core/services.php
 */
$di -> setShared('cache', function() use($config){
    return new \Phalcon\Cache\Backend\File(new \Phalcon\Cache\Frontend\Output(), array(
        'cacheDir' => $config->application->cacheDir
    ));
});
