<?php

namespace Pyris;

class WebApp
{
    private $appRoot;
    private $config;
    private $cache;
    
    public function __construct($appRoot, $configFile)
    {
        $this->appRoot = $appRoot;
        $configReader  = new \Zend\Config\Reader\Ini();
        $configArray   = $configReader->fromFile($configFile);
        $this->config  = new \Zend\Config\Config($configArray);
        $this->cache   = \Zend\Cache\StorageFactory::factory($this->config->cache);
        $mongoClient   = new \MongoClient($this->config->db->server, $this->config->db->get('options', array()));
        $this->db      = $mongoClient->{$this->config->db->dbname};
        
        View::$templateDirectory = $appRoot . '/templates';
    }
    
    public function run()
    {
        $httpRequest   = new \Zend\Http\PhpEnvironment\Request();
        $httpResponse  = new \Zend\Http\PhpEnvironment\Response();
        $this->process($httpRequest, $httpResponse);
    }
    
    public function process(\Zend\Http\Request &$request, \Zend\Http\Response &$response)
    {
        if ($this->cache->hasItem('routes')) {
            $routes = json_decode($this->cache->getItem('routes'), true);
        } else {
            $routes = array();
            foreach ($this->db->routes->find() as $route) {
                $routes[] = array();
            }
            $this->cache->setItem('routes', json_encode($routes));
        }
        $router = new Router($routes);
        $uri = $request->getUri();
        $page = $router->route($uri);
        if (!$page) {
            $page = $this->config->defaultPage;
        }
        $pageScript = realpath($this->appRoot . '/pages/' . $page . '.php');
        include $pageScript;
    }
}
