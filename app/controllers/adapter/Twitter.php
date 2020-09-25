<?php

namespace App\Controllers\Adapter;

class Twitter implements SendServiceInterface {

    protected $serviceUrl;
    protected $login;
    protected $password;
    protected $authStatus;

    public function __construct(array $options) {
        $this->serviceUrl  = $options['url'];
        $this->login    = $options['login'];
        $this->password = $options['password'];
        $this->authenticate();
    }

    public function sendMessage(string $msg) {
        if(!$this->authStatus) {
            $this->show('ERROR:Вы не прошли авторизацию');
            return;
        }
        $ch = curl_init($this->serviceUrl . "/send/{$msg}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $res = curl_exec($ch);
        $this->show("Сообщение в Twitter `{$msg}` успешно отправлено");
    }

    protected function authenticate(){

        $ch = curl_init($this->serviceUrl . "/auth/{$this->login}/{$this->password}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $res = curl_exec($ch);
        $this->authStatus = $res;

    }

    protected function show($message) {
        print_r($message . '<br>');
    }

}