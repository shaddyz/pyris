<?php

namespace Pyris;

class Collection
{
    private $collection;
    
    public function __construct(\MongoCollection $collection)
    {
        $this->collection = $collection;
    }
    
    public function save(Model &$model)
    {
        $array = $model->toArray();
        $array['_class'] = get_class($model);
        if (isset($array['id']) and $array['id']) {
            $id = new \MongoId($array['id']);
            unset($array['id']);
            $this->collection->update(array('_id' => $id), $array);
        } else {
            $this->collection->insert($array);
            $model->id = (string) $array['_id'];
        }
    }
    
    public function findById($id)
    {
        return $this->findOne(array('_id' => \MongoId($id)));
    }
    
    public function findOne($query)
    {
        if (is_array($array = $this->collection->findOne($query))) {
            $class = $array['_class'];
            unset($array['_class']);
            $array = new $class($array);
        }
        return $array;
    }
    
    public function find($query = array())
    {
        return new Cursor(Db::get()->getClient(), (string) $this->collection, $query);
    }
    
    public function removeById($id)
    {
    }
    
    public function remove($query)
    {
    }
}
