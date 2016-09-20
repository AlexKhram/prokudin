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

class Tag extends Model
{

    protected $table = 'tags';
    protected $id = 'id';
    protected $withColumn = 'id_photo';

    public function findAllForPhotoId($id)
    {
        $data = $this->app['db']->fetchAll("SELECT * FROM {$this->table} where {$this->withColumn} = {$id} and lang = '{$this->app['locale']}'");
        $tags = array();
        foreach ($data as $tag) {
            $tags[] = $tag['tag'];
        }

        return $tags;
    }

    public function findAllWithCount()
    {
        $tags = $this->app['db']->fetchAll("SELECT tag, COUNT({$this->withColumn}) as count FROM {$this->table} 
where lang = '{$this->app['locale']}' GROUP BY tag ORDER BY count DESC");

        return $tags;
    }

}