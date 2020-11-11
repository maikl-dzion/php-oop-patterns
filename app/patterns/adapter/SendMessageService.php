<?php

namespace App\Patterns\Adapter;

class SendMessageService  {

    protected $service;

    public function __construct(SendServiceInterface $service) {
        $this->service = $service;
    }

    public function send(string $msg) {
        return $this->service->sendMessage($msg);
    }

}