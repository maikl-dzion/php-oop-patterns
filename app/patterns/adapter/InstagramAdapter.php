<?php

namespace App\Patterns\Adapter;

class InstagramAdapter implements SendServiceInterface {

    protected $serviceUrl;
    protected $authStatus;
    protected $options = array();
    protected $service;

    public function __construct(array $options) {
        $this->options     = $options;
        $this->serviceUrl  = $options['service_url'];
        $this->service = new Instagram();
        $this->authenticate();
    }

    public function sendMessage(string $msg) {
        if(!$this->authStatus) {
            $this->show('ERROR:Вы не прошли авторизацию');
            return;
        }
        $res = $this->service->sendReport($msg, $this->serviceUrl);
        if($res) {
            $this->show("Сообщение в Instagram `{$msg}` успешно отправлено");
            return;
        }
        $this->show("Не удалось отправить сообщение");
    }

    protected function authenticate(){
        $this->authStatus = $this->service->userAuth($this->options);
    }

    protected function show($message) {
        print_r($message . '<br>');
    }

}