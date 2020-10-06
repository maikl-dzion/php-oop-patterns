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

    $instaConf = [
        'service_url' => 'http://bolderfest.ru',
        'api_url' => 'http://bolderfest.ru',
        'user'    => 'maikl',
        'pwd'     => '1234',
    ];

    ob_start();

    $tweetMessage = 'Что нового в twitter сегодня?';
    $twitter = new Twitter($twitterConf);
    $twitter->sendMessage($tweetMessage);


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


    $result = ob_get_contents();
    ob_end_clean();

    return getResult($result);
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

    return getResult($facade->report);
}

function initBuilder() {
    ob_start();
    $builder = new Builder();

    $result = ob_get_contents();
    ob_end_clean();
    return getResult($result);
}

function initFactory() {
    ob_start();
    $factory = new Factory();

    $result = ob_get_contents();
    ob_end_clean();
    return getResult($result);
}

function initAbstractFactory() {
    $abstractFactory = new AbstractFactory();

    ob_start();

    $abstractFactory->run();

    $result = ob_get_contents();
    ob_end_clean();

    return getResult($result);
}


function getResult($data) {
    return array('result' => $data);
}

function show($data) {
   $r = $data['result'];
   echo "<pre>" . $r . "</pre>";
}
// print_r(new AbstractFactory());