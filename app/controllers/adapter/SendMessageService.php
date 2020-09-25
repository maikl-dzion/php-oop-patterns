<?php

declare(strict_types=1);

namespace App\Controllers\Adapter;

class SendMessageService  {

    protected $service;

    public function __construct(SendServiceInterface $service) {
        $this->service = $service;
    }

    public function send(string $msg) {
        return $this->service->sendMessage($msg);
    }

}