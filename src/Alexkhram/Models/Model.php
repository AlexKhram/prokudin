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


class Model
{
    protected $app;
    protected $table; // table name
    protected $id; // column id (primary key) for find by name
    protected $name; // column name (uniq) - for find by name
    protected $counter; // column counter (int) - for increase counter = counter + 1
    protected $active; // column active (1/0) - for checking active is equal 1
    protected $withColumn; // column withColumn - for searching all writes with column
    protected $locale;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function findAll($params = NULL)
    {
        $cards = $this->app['db']->fetchAll("SELECT * FROM {$this->table}");
        return $cards;
    }

    public function findAllActive($params = '')
    {
        $param = $this->paramToString($params);
        if ($this->active){
            $cards = $this->app['db']->fetchAll("SELECT * FROM {$this->table} where {$this->active} = 1" . $param);
        } else {
            $cards = false;
        }
        return $cards;
    }

    public function findByName($name)
    {
        if($this->name){
            $card = $this->app['db']->fetchAssoc("SELECT * FROM {$this->table} where {$this->name} = '{$name}'");
        } else {
            $card = false;
        }        
        return $card;
    }

    public function findByNameActive($name)
    {
        if($this->name and $this->active){
            $card = $this->app['db']->fetchAssoc("SELECT * FROM {$this->table} where {$this->name} = '{$name}' and {$this->active} = 1");
        } else {
            $card = false;
        }
        return $card;
    }

    public function findALLWithColumn($column){
        if($this->withColumn){
            $data = $this->app['db']->fetchAll("SELECT * FROM {$this->table} where {$this->withColumn} = {$column}");
        } else {
            $data = false;
        }
        return $data;
    }



    public function increaseCounterById($id){
        if($this->counter and $this->id){
            $this->app['db']->executeUpdate("UPDATE {$this->table} SET `{$this->counter}` = `{$this->counter}` + 1 WHERE {$this->id} = {$id}");
        }
    }

    private function paramToString($params){
        $param = '';
        if(isset($params)){
            if(isset($params['orderBy'])){
                $param .= ' ORDER BY ' . $params['orderBy'];
            }
            if(isset($params['sort'])){
                $param .= ' '. $params['sort'];
            }
            if(isset($params['limit'])){
                $param .= ' limit ' . $params['limit'];
            }
        }

        return $param;
    }

}