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
 * Date: 08.09.16
 * Time: 19:28
 */

namespace Alexkhram\Models;

use Alexkhram\Models\Model;

class Comment extends Model
{

    protected $table = 'comments';
    protected $id = 'id';
    protected $withColumn = 'id_photo';

    public function findAllForPhotoId($id)
    {
        $comments = parent::findALLWithColumn($id);
        $comments = $this->hashForGravatar($comments);

        return $comments;
    }

    public function addComment($comment)
    {
        if ($result = $this->validation($comment)) {
            return $result;
        }

        $success = $this->app['db']->insert($this->table, [
            'name' => addslashes($comment['username']),
            'email' => addslashes($comment['email']),
            'comment' => addslashes($comment['comment']),
            'id_photo' => (int)$comment['idphoto'],
        ]);

        if ($success == 1) {
            $result['success'] = 'commentAdded';
        } else {
            $result['error'][] = 'somethingWentWrong';
        }

        return $result;
    }

    public function hashForGravatar(array $comments)
    {
        foreach ($comments as &$comment) {
            $comment['hash'] = md5(strtolower(trim($comment['email'])));
        }

        return $comments;
    }

    private function validation($comment)
    {
        $error = [];
        if (!isset($comment['username']) or empty($comment['username'])) {
            $error[] = 'usernameRequired';
        }
        if (!isset($comment['email']) or empty($comment['email'])) {
            $error[] = 'emailRequired';
        }
        if (!isset($comment['comment']) or empty($comment['comment'])) {
            $error[] = 'commentRequired';
        }
        if (!isset($comment['idphoto']) or empty($comment['idphoto'])) {
            $error[] = 'somethingWentWrong';
        }
        if (!isset($comment['g-recaptcha-response']) or empty($comment['g-recaptcha-response'])) {
            $error[] = 'notCaptcha';
        } else {
            $resp = $this->app['recaptcha']->verify($comment['g-recaptcha-response'], $comment['clientIp']);
            if (!$resp->isSuccess()) {
                $error[] = 'notCaptcha';
            }
        }

        if (!empty($error)) {
            $result['error'] = $error;
            return $result;
        }

        return false;
    }
}