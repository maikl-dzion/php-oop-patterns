<?php

namespace App\Patterns\Facade;

class UserGroupService  {

    protected $userParam;

    public function __construct($userParam) {
        $this->userParam = $userParam;
    }

}