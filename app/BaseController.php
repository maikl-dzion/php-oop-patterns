<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 05.10.2020
 * Time: 13:36
 */

namespace App;


class BaseController
{
    protected $params;
    public $view;
    public function __construct($params = array()) {
        $this->params = $params;
        $this->view = new ViewController();
    }
}