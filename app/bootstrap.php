<?php

//use App\Patterns\Adapter\Twitter;
//use App\Patterns\Adapter\Instagram;
//use App\Patterns\Adapter\InstagramAdapter;
//use App\Patterns\Adapter\SendMessageService;
//
//use App\Patterns\Facade\UserServicesRun;
//use App\Patterns\AbstractFactory\AbstractFactory;
//
//use App\Patterns\Builder\Builder;
//use App\Patterns\Factory\Factory;


use App\PatternContainer;

use App\Patterns\Adapter\InitAdapter;

$container = new PatternContainer();

$container->add('adapter', InitAdapter::class);

print_r($container->get('adapter', 'run')); die;

//function initAdapter() {
//
//    $twitterConf = [
//        'url'      => 'http://bolderfest.ru/',
//        'login'    => 'maikl',
//        'password' => '1234',
//    ];
//
//    $instaConf = [
//        'service_url' => 'http://bolderfest.ru',
//        'api_url' => 'http://bolderfest.ru',
//        'user'    => 'maikl',
//        'pwd'     => '1234',
//    ];
//
//    ob_start();
//
//    $tweetMessage = 'Что нового в twitter сегодня?';
//    $twitter = new Twitter($twitterConf);
//    $twitter->sendMessage($tweetMessage);
//
//
//    $instaMessage = 'Очень классная статья,ставим лайки!!!';
//
//    $instaAdapter = new InstagramAdapter($instaConf);
//    $instaAdapter->sendMessage($instaMessage);
//
//    /////////////////////////////////////////////
//    echo '----------------------------------------<br>';
//    echo '---- Сообщения отправленные через общую шину -----';
//
//    $sendTwitterService = new SendMessageService(new Twitter($twitterConf));
//    $sendInstaService   = new SendMessageService(new InstagramAdapter($instaConf));
//
//    echo '<br>';
//    $sendTwitterService->send('Прикольные фотки!');
//    $sendTwitterService->send('Кто пойдет завтра на вечеринку!');
//    echo '<br>';
//
//    echo '<br>';
//    $sendInstaService->send('Прикольные фотки!');
//    $sendInstaService->send('Кто пойдет завтра на вечеринку!');
//    echo '<br>';
//
//
//    $result = ob_get_contents();
//    ob_end_clean();
//
//    return getResult($result);
//}

//$container->add('builder', Builder::class);
//
//$container->add('factory', Factory::class);
//
//$container->add('abstract_factory', AbstractFactory::class, 'run', [], true);
//
//$container->add('adapter2', App\Patterns\Adapter2\Adapter::class, 'run');
//
//$container->add('facade' , UserServicesRun::class, 'run', [
//    'name'      => 'Maikl',
//    'last_name' => 'Abasov',
//    'age'       => 50,
//    'prof'      => 'Programmer',
//    'sex'       => 'Men',
//], true);







