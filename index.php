<?php

define('ROOT_DIR', __DIR__);

define('ASSETS_URL', 'view/assets');

require_once ROOT_DIR . '/vendor/autoload.php';

require_once ROOT_DIR . '/app/bootstrap.php';

$patterns = array();

//$record['adapter'] = initAdapter();
//$record['facade']  = initFacade();
//$record['builder'] = initBuilder();
//$record['factory'] = initFactory();
//$record['abstract_factory'] = initAbstractFactory();

print_r($container->container); die;


?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP PATTERNS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/flexslider.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>/css/style.css">
    <script src="<?php echo ASSETS_URL;?>/js/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo ASSETS_URL;?>/js/respond.min.js"></script>

</head>
<body>

<div id="colorlib-page">
    <div class="container-wrap">

     <?php require_once ROOT_DIR . '/view/template.php'; ?>

    </div><!-- end:container-wrap -->
</div><!-- end:colorlib-page -->

<script src="<?php echo ASSETS_URL;?>/js/jquery.min.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/owl.carousel.min.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/jquery.countTo.js"></script>
<script src="<?php echo ASSETS_URL;?>/js/main.js"></script>

</body></html>

