<?php

namespace App\Patterns\Facade;

class UserStoreService  {

    protected $userParam;

    public function __construct($userParam) {
        $this->userParam = $userParam;
    }

    protected function giveOutEquipment() : array {
        $message = array();
        $message[] = "Выдан ноутбук -> `HP-5056`: серийный номер:3450ut-6576-4567";
        $message[] = "Выдан телефон -> `Fanvil` : серийный номер:9878";
        return $message;
    }

    public function init() : string {
        $resp = $this->giveOutEquipment();
        $result = "Пользователю " . $this->userParam['name'] . " выдано на складе: <br> " . implode('<br>', $resp);
        return $result;
    }

}