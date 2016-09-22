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
 * Time: 12:55
 */

$app['translator.domains'] = array(
    'messages' => array(
        'ru' => array(
            'siteName' => 'Каталог фотографий Прокудина-Горского',
            'siteDesc' => 'первые в истории цветные фотографии',
            'mainPage' => 'ГЛАВНАЯ',
            'mapPhoto' => 'КАРТА',
            'tags' => 'ТЕГИ',
            'about'=>'О САЙТЕ',
            'listPhoto' => 'СПИСОК ФОТО',
            'photoLocation' => 'Месторасположение фото',
            'listPhotosWithTag' => 'Список фотографий с тэгом',
            'notPhotoWithTag' => 'Нет фотографий с таким тэгом',
            'listOfTags' => 'Список тэгов',
            'views' => 'просмотры',
            'photo' => 'фотография',
            'leaveComent' => 'Прокомментировать',
            'name' => 'псевдоним',
            'emailNotPublished' => 'email - не  будет опубликован -',
            'comment' => 'комментарий',
            'lettersSpaces' => 'только латинские буквы и пробел',
            'realEmail' => 'укажите реальный email',
            'sendComment' => 'прокоментировать',
            'usernameRequired' => 'Псевдоним не может быть пустым',
            'emailRequired' => 'Email не может быть пустым',
            'commentRequired' => 'Комментарий не может быть пустым',
            'somethingWentWrong' => 'Что-то пошло не так',
            'commentAdded' => 'Комментарий успешно добавлен',
            'notCaptcha' => 'Каптча не пройдена',
            'photoNotFound'=>'Фото не найдено',
            'pageNotFound'=>'Страница не найдена',
            'year'=> ' год',

        ),
        'en' => array(
            'siteName' => 'Prokudin-Gorskii Collection',
            'siteDesc' => 'First colour photo in history',
            'mainPage' => 'MAIN',
            'mapPhoto' => 'MAP',
            'tags' => 'TAGS',
            'listPhoto' => 'LIST OF PHOTO',
            'about'=>'ABOUT',
            'photoLocation' => 'Image location',
            'listPhotosWithTag' => 'List of photos with tag',
            'notPhotoWithTag' => 'Not photo with this tag',
            'listOfTags' => 'List of tags',
            'views' => 'views',
            'photo' => 'photo',
            'leaveComent' => 'Leave a comment',
            'name' => 'name',
            'emailNotPublished' => 'email - will not be published -',
            'comment' => 'comment',
            'lettersSpaces' => 'letters and spaces only',
            'realEmail' => 'type real email',
            'sendComment' => 'send comment',
            'usernameRequired' => 'Username field cannot be empty',
            'emailRequired' => 'Email field cannot be empty',
            'commentRequired' => 'Comment field cannot be empty',
            'somethingWentWrong' => 'Something went wrong',
            'commentAdded' => 'Comment successfully added',
            'notCaptcha' => 'Captcha test failed',
            'photoNotFound'=>'Photo not found',
            'pageNotFound'=>'Page not found',
            'year'=> ' year',

            
            

        ),
    ),
);
//var_dump($app->trans('Hello World'));
//var_dump($app['translator']->trans('siteName'));die();
//{{ 'photoLocation'|trans }}