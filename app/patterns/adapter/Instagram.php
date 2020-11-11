<?php

namespace App\Patterns\Adapter;

class Instagram  {

    public function __construct() {}

    public function sendReport(string $msg, string $sendUrl) {

        $ch = curl_init($sendUrl . "/{$msg}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $res = curl_exec($ch);
        return $res;
    }

    public function userAuth(array $options){

        $apiUrl   = $options['api_url'];
        $login    = $options['user'];
        $password = $options['pwd'];

        $ch = curl_init($apiUrl . "/initialize/{$login}/{$password}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $res = curl_exec($ch);

        return $res;

    }

}