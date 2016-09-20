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
 * Time: 12:53
 */

// Registering services providers
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $app['db.options'],
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => dirname(__DIR__) . '/src/Alexkhram/Views',
));
$app->register(new Silex\Provider\VarDumperServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('ru'),
));
$app->register(new Silex\Provider\SessionServiceProvider());


