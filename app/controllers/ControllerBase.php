<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller
{
    /**
     * 设置普通变量
     * @param string $key
     * @param string|array $value
     */
    public function set($key,$value){
        $this->view->setVar($key, $value);
    }
    /**
     * 设置模板中的标题
     * @param string $value
     */
    public function setLayoutTitle($value){
        $this->view->setVar("layout_title", $value)->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
    }
}
