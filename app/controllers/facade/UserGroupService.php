<?php

declare(strict_types=1);

namespace App\Controllers\Facade;

class UserGroupService  {

    protected $userParam;

    public function __construct($userParam) {
        $this->userParam = $userParam;
    }

}