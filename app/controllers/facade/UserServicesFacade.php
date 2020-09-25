<?php

declare(strict_types=1);

namespace App\Controllers\Facade;

class UserServicesFacade  {

    protected $store;
    protected $AD;
    protected $group;
    public $response = [];

    public function __construct(UserStoreService $store,
                                UserADService    $ad,
                                UserGroupService $group) {
        $this->store  = $store;
        $this->AD     = $ad;
        $this->group  = $group;
    }


    public function start() : array {
        $this->response['store'] = $this->store->init();
        return $this->response;
    }

}