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

class Photo extends Model
{

    protected $table = 'photos';
    protected $id = 'id';
    protected $active = 'active';
    protected $counter = 'views';
    protected $name = 'name_search';

    public function findAllActive()
    {
        $cards = parent::findAllActive(['orderBy' => 'views', 'sort' => 'DESC']);
        $cards = $this->localize($cards);

        return $cards;
    }

    public function findAllActiveLimited()
    {
        $cards = parent::findAllActive(['orderBy' => 'views', 'sort' => 'DESC', 'limit' => '8']);
        $cards = $this->localize($cards);

        return $cards;
    }

    public function findAllWhichHasGeo()
    {
        $cards = $this->app['db']->fetchAll("SELECT * FROM {$this->table} where active = 1 and geo IS NOT NULL");
        $cards = $this->localize($cards);

        return $cards;
    }

    public function findByNameActive($name)
    {
        $card = parent::findByNameActive($name);
        if (!$card) {
            return false;
        }

        $this->increaseCounter($card['id']);
        $card = $this->localize(array($card));
        $card[0]['tags'] = $this->app['tagModel']->findAllForPhotoId($card[0]['id']);

        return $card[0];

    }

    public function findByName($name)
    {
        $card = parent::findByName($name);
        if (!$card) {
            return false;
        }

        $this->increaseCounter($card['id']);
        $card = $this->localize(array($card));
        
        return $card[0];

    }

    public function findAllActiveByTag($tagName)
    {
        $cards = $this->app['db']->fetchAll("SELECT * FROM {$this->table} WHERE active = 1 AND id IN 
(SELECT id_photo FROM tags WHERE tag = '{$tagName}' and lang = '{$this->app['locale']}') ");
        $cards = $this->localize($cards);

        return $cards;
    }

    public function increaseCounter($id)
    {
        parent::increaseCounterById($id);
    }

    private function localize($datas)
    {
        if (is_array($datas)) {
            foreach ($datas as &$data) {
                if (isset($this->app['pathPhoto'])) {
                    $data['path_image'] = "/" . $this->app['pathPhoto'] . $data['path_image'];
                    $data['path_hirez'] = "/" . $this->app['pathPhoto'] . $data['path_hirez'];
                }

                $data['name'] = $data['name_' . $this->app['locale']];
                $data['description'] = $data['description_' . $this->app['locale']];
            }
        }
        return $datas;
    }
}