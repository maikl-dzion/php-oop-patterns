<?php

namespace App\Patterns\Facade;

class UserADService  {

    protected $userParam;

    public function __construct($userParam) {
        $this->userParam = $userParam;
    }

}