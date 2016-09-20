<?php
/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 07.09.16
 * Time: 14:06
 */
ini_set('display_errors',1);

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Silex\Application;


//require_once __DIR__ . '/../app/servicesproviders.php';
require_once __DIR__ . '/../app/app.php';


$app->run();
