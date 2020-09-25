<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\Adapter\Twitter;
use App\Controllers\Adapter\Instagram;
use App\Controllers\Adapter\InstagramAdapter;
use App\Controllers\Adapter\SendMessageService;

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

//$instagram = new Instagram();
//$auth = $instagram->userAuth($instaConf);
//if($auth) {
//    $status = $instagram->sendReport($instaMessage, $instaConf['api_url']);
//    if($status) {
//        print_r('Сообщение в Instagram ``'.$instaMessage. '`` успешно отправлено');
//    }
//}

$instaAdapter = new InstagramAdapter($instaConf);
$instaAdapter->sendMessage($instaMessage);


/////////////////////////////////////////////
///
 echo '-----------------------------------------------------------------------<br>';
 echo '---- Сообщения отправленные через общую шину -----';


$sendInstaService = new SendMessageService(new InstagramAdapter($instaConf));
$sendTwitterService = new SendMessageService(new Twitter($twitterConf));

echo '<br>';
$sendInstaService->send('Прикольные фотки!');
$sendInstaService->send('Кто пойдет завтра на вечеринку!');
echo '<br>';


echo '<br>';
$sendTwitterService->send('Прикольные фотки!');
$sendTwitterService->send('Кто пойдет завтра на вечеринку!');
echo '<br>';