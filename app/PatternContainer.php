<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 09.11.2020
 * Time: 16:01
 */

namespace App;


class PatternContainer {

    protected $class;
    protected $method;
    protected $params;
    public    $container;

    public function __construct(){}

    public function get($key, $methodName = false, $params = []) {
         $response = [];
         if(!isset($this->container[$key]))
             return $response;

         $controller = $this->container[$key];

         if(!$methodName)
             return $controller;

         if(!empty($params))
             $response = $controller->$methodName($params);
         else
             $response = $controller->$methodName();

         return $response;
    }

    public function add($key, $component, $params = [], $obStart = false) {

        $result = [];

        if($component instanceof \Closure) {

            if(!empty($params))
              $result = $component($params);
            else
              $result = $component();

        } elseif($obStart) {

            ob_start();
            if(!empty($params))
                new $component($params);
            else
                new $component();
            $result = ob_get_contents();
            ob_end_clean();

        } else {
            if(!empty($params))
               $result = new $component($params);
            else
               $result = new $component();
        }

        $this->container[$key] = $result;
    }


    public function obStart($dataSource, $args = []) {
        ob_start();

        if($dataSource instanceof \Closure) {
            $dataSource($args);
        } else {
            print $dataSource;
        }

        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}