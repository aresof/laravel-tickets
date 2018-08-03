<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

abstract class BaseSeeder extends Seeder
{
    protected static $pool = array();

    public function run()
    {
        return $this->createMultiple($this->total);
    }

    protected function createMultiple($total)
    {

        for($i=0; $i<$total; $i++){
            $this->create();
        }
    }

    abstract public function getModel();

    abstract public function getDummyData($faker);

    protected function create()
    {
        $this->addToPool($this->getModel()->create($this->getDummyData(Faker::create())));
    }

    protected function getRandom($model)
    {
        if(!$this->collectionExist($model))
        {
            throw new Exception("The $model collection does not exist");
        }

        return static::$pool[$model]->random();
    }

    private function addToPool($entity)
    {
        $reflection = new ReflectionClass($entity);

        $class = $reflection->getShortName();

        if(!$this->collectionExist($class))
        {
            static::$pool[$class] = new Collection();
        }

        static::$pool[$class]->add($entity);

        return $entity;
    }


    private function collectionExist($class)
    {
        return isset(static::$pool[$class]);
    }



}