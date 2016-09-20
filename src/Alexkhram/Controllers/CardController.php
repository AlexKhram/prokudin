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
 * Time: 14:26
 */

namespace Alexkhram\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class CardController
{
    public function index(Request $request, Application $app)
    {
        $cards = $app['photoModel']->findAllActiveLimited();

        return $app['twig']->render('index.twig', array(
            'content' => $cards,
            'locale' => $app['locale'],
        ));
    }

    public function viewPhoto(Request $request, Application $app, $name)
    {
        if ($request->getMethod() == "POST") {
            $postdata = $request->request->all();
            $postdata['clientIp'] = $request->getClientIp();
            $result = $app['commentModel']->addComment($postdata);
        }

        $card = $app['photoModel']->findByNameActive($name);
        if ($card) {
            $comments = $app['commentModel']->findAllForPhotoId($card['id']);
        }

        return $app['twig']->render('card.twig', array(
            'card' => $card,
            'comments' => $comments,
            'message' => $result,
        ));
    }

    public function tags(Request $request, Application $app)
    {
        $tags = $app['tagModel']->findAllWithCount();

        return $app['twig']->render('tags.twig', array(
            'tags' => $tags,
        ));

    }

    public function listByTag(Request $request, Application $app, $tagName)
    {
        $cards = $app['photoModel']->findAllActiveByTag($tagName);

        return $app['twig']->render('listbytag.twig', array(
            'cards' => $cards,
            'tag' => $tagName,
        ));
    }

    public function listPhotos(Request $request, Application $app)
    {
        $cards = $app['photoModel']->findAllActive();

        return $app['twig']->render('listphotos.twig', array(
            'cards' => $cards,
            'route' => 'listphotos',
        ));
    }

    public function map(Request $request, Application $app)
    {
        $content = $app['photoModel']->findAllWhichHasGeo();

        if (!$content) {
            $app->abort(404, "Can`t see this photo");
        }

        return $app['twig']->render('map.twig', array(
            'content' => $content,
        ));
    }

    public function about(Request $request, Application $app)
    {
        $card = $app['photoModel']->findByName('about');

        return $app['twig']->render('about.twig', array(
            'card' => $card
        ));
    }

    


}