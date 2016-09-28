<?php
/**
 *
 *  his file is part of the Prokudin-Gorskii gallery project.
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
 * Time: 14:19
 */

$app['debug'] = true;

$app['locale'] = 'ru'; //default language
$app['RUSpeaking'] = ['RU', 'UA' , 'BY', '-', 'Invalid IP address.']; // Russian speaking country
//$app['RUSpeaking'] = ['RU', 'UA'. 'BY']; // Russian speaking country

$app['pathPhoto'] = 'photos/';

$app['db.options'] = [
    'driver' => 'pdo_mysql',
    'host' => isset($salt['host']) ? $salt['host'] : 'localhost',
    'dbname' => isset($salt['dbname']) ? $salt['dbname'] : 'dbname',
    'user' => isset($salt['user']) ? $salt['user'] : 'user',
    'password' => isset($salt['password']) ? $salt['password'] : 'password',
    'charset' => 'utf8',

];
$app['recaptchaSecret'] = isset($salt['recaptchaSecret']) ? $salt['recaptchaSecret'] : '-';
$app['mainColour'] = 'mdl-color--grey-200';
$app['accentColour'] = 'mdl-color--indigo-300';
$app['accentTextColour'] = 'mdl-color-text--indigo-500';
$app['googleMapColour'] = '#e8eaf6';