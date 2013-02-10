<?php

namespace Pyris;

abstract class Model
{
    public $id;
    
    public $class;
    
    public function toArray()
    {
        return get_object_vars($this);
    }
    
    public static function fromArray(Array $array)
    {
        $model = new static();
        foreach ($array as $key => $value) {
            $model->$key = $value;
        }
        return $model;
    }
}
