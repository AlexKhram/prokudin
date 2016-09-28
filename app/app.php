<?php
/**
 *
 *  This file is part of the Prokudin-Gorskii gallery project.
 *
 *  (c) AlexKhram <akhramenkov@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 07.09.16
 * Time: 14:18
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

include_once 'salt.php';
require_once 'config.php';
include_once 'router.php';
include_once 'servicesprovider.php';
include_once 'translation.php';

$app->before(function () use ($app) {
    // Choosing locale

    if (isset($_GET['lang']) and ($_GET['lang'] == 'ru' or $_GET['lang'] == 'en')) {
        $app['locale'] = $_GET['lang'];
        $app['session']->set('lang', $_GET['lang']);
    } elseif ($app['session']->get('lang')) {
        $app['locale'] = $app['session']->get('lang');
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $db = new \IP2Location\Database(
            dirname(__DIR__) . '/vendor/ip2location/ip2location-php/databases/IP2LOCATION-LITE-DB1.BIN',
            \IP2Location\Database::FILE_IO
        );
        $records = $db->lookup($_SERVER['REMOTE_ADDR'], \IP2Location\Database::ALL);
        if (in_array($records['countryCode'], $app['RUSpeaking'])) {
            $app['locale'] = 'ru';
        } else {
            $app['locale'] = 'en';
        }

    }

    $app['translator']->setLocale($app['locale']);
});

// Models
$app['photoModel'] = new Alexkhram\Models\Photo($app);
$app['tagModel'] = new Alexkhram\Models\Tag($app);
$app['commentModel'] = new Alexkhram\Models\Comment($app);

// Recaptcha
$app['recaptcha'] = new \ReCaptcha\ReCaptcha($app['recaptchaSecret']);


// Error handles
//    $app->error(function (\Exception $e, Request $request, $code) {
//        switch ($code) {
//            case 404:
//                $message = 'The requested page could not be found.';
//                break;
//            default:
//                $message = 'We are sorry, but something went terribly wrong.';
//        }
//
//        return new Response($message);
//    });