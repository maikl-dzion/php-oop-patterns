<?php

// ------ Adapter
use App\Controllers\Adapter\Twitter;
use App\Controllers\Adapter\Instagram;
use App\Controllers\Adapter\InstagramAdapter;
use App\Controllers\Adapter\SendMessageService;


// ---- Facade
use App\Controllers\Facade\UserServicesRun;


// ---- AbstractFactory
use App\Patterns\AbstractFactory\AbstractFactory;


// ---- Builder
use App\Patterns\Builder\Builder;

use App\Patterns\Factory\Factory;

function initAdapter() {

    $twitterConf = [
        'url'      => 'http://bolderfest.ru/',
        'login'    => 'maikl',
        'password' => '1234',
    ];

    $tweetMessage = 'Что нового в twitter сегодня?';
    $twitter = new Twitter($twitterConf);
    $twitter->sendMessage($tweetMessage);


    $instaConf = [
        'service_url' => 'http://bolderfest.ru',
        'api_url' => 'http://bolderfest.ru',
        'user'    => 'maikl',
        'pwd'     => '1234',
    ];

    $instaMessage = 'Очень классная статья,ставим лайки!!!';


    $instaAdapter = new InstagramAdapter($instaConf);
    $instaAdapter->sendMessage($instaMessage);

    /////////////////////////////////////////////
    echo '----------------------------------------<br>';
    echo '---- Сообщения отправленные через общую шину -----';

    $sendTwitterService = new SendMessageService(new Twitter($twitterConf));
    $sendInstaService   = new SendMessageService(new InstagramAdapter($instaConf));

    echo '<br>';
    $sendTwitterService->send('Прикольные фотки!');
    $sendTwitterService->send('Кто пойдет завтра на вечеринку!');
    echo '<br>';

    echo '<br>';
    $sendInstaService->send('Прикольные фотки!');
    $sendInstaService->send('Кто пойдет завтра на вечеринку!');
    echo '<br>';

}

function initFacade() {

    $userParam = [
        'name'      => 'Maikl',
        'last_name' => 'Abasov',
        'age'       => 50,
        'prof'      => 'Programmer',
        'sex'       => 'Men',
    ];

    $facade = new UserServicesRun($userParam);
    print_r($facade->report);

}

function initBuilder() {
    $builder = new Builder();
}

function initFactory() {
    $factory = new Factory();
}

function initAbstractFactory() {
    $abstractFactory = new AbstractFactory();
    $abstractFactory->run();
}



// print_r(new AbstractFactory());