<?php

namespace Pyris;

class Db
{
    private static $instance;
    private $mongoClient;
    private $mongoDb;
    private $collections;
    
    public static function get()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function connect($database, $server, $options = null)
    {
        $this->mongoClient = new \MongoClient($server, $options);
        $this->mongoDb = $this->mongoClient->selectDb($database);
    }
    
    public function getClient()
    {
        return $this->mongoClient;
    }
    
    public function __get($collection)
    {
        return $this->selectCollection($collection);
    }
    
    public function selectCollection($name)
    {
        if (!isset($this->collections[$name])) {
            $this->collections[$name] = new Collection($this->mongoDb->selectCollection($name));
        }
        return $this->collections[$name];
    }
}
