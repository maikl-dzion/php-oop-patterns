<?php

namespace App\Patterns\Facade;

class UserServicesRun  {

    protected $userParam;
    public $report = [];
    public function __construct(array $userParam) {
        $this->userParam = $userParam;
        $this->run();
    }

    public function run() {
        $store   = new UserStoreService($this->userParam);
        $ad      = new UserADService($this->userParam);
        $group   = new UserGroupService($this->userParam);
        $facade  = new UserServicesFacade($store, $ad, $group);
        $this->report = $facade->start();
    }

}