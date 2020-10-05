<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 05.10.2020
 * Time: 14:40
 */

namespace App;


class ViewController
{
    public function __construct() {}

    public function pre($data) {
        $string = print_r($data, true);
        $result = "<pre>" . $string . "<pre>";
        return $result;
    }

}