<?php
$router = $di->getRouter();

// Define your routes here
$router->add("/search/:params\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "search",
    "params" => 1
]);
/**
 * 博客详细页面
 */
$router->add("/blog/:params", [
    "controller" => "index",
    "action" => "detail",
    "params" => 1
]);
/**
 * 博客详细地址带后缀
 */
$router->add("/blog/:params\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "detail",
    "params" => 1
]);
/**
 * 分页查询
 */
$router->add("/pages/:params\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "index",
    "params" => 1
]);
/**
 * 友情链接
 */
$router->add("/link\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "link"
]);
/**
 * 检测是否关注
 */
$router->add("/following\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "following"
]);
/**
 * 所有标签
 */
$router->add("/tags\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "tags"
]);
/**
 * 按标签查询内容
 */
$router->add("/tag/:params\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "tagcontent",
    "params" => 1
]);

/**
 * 标签带分页
 */
$router->add("/tag/:params/:page\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "tagcontent",
    "params" => 1,
    "page" => 2
]);
/**
 * 错误页面
 */
$router->add("/error\.{type:[a-z]+}", [
    "controller" => "index",
    "action" => "error"
]);
$router->handle();
