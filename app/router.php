<?php
/**
 *  This file is part of the Prokudin-Gorskii gallery project.
 *
 * (c) AlexKhram <akhramenkov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 15.09.16
 * Time: 12:52
 */

// Routing
$app->get('/', 'Alexkhram\\Controllers\\CardController::index')->bind('index');;
$app->match('/photo/{name}', 'Alexkhram\\Controllers\\CardController::viewPhoto')->method('GET|POST')->bind('photo');
$app->get('/map', 'Alexkhram\\Controllers\\CardController::map')->bind('map');
$app->get('/tags', 'Alexkhram\\Controllers\\CardController::tags')->bind('tags');
$app->get('/listbytag/{tagName}', 'Alexkhram\\Controllers\\CardController::listByTag')->bind('listbytag');
$app->get('/listphotos', 'Alexkhram\\Controllers\\CardController::listPhotos')->bind('listphotos');
$app->get('/about', 'Alexkhram\\Controllers\\CardController::about')->bind('about');
