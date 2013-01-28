<?php

namespace Pyris;

class Router
{
    private $routes;
    
    public function __construct(Array $routes = null)
    {
        if (is_null($routes)) {
            $routes = array();
        }
        $this->routes = $routes;
    }
    
    public function route(\Zend\Uri\Http $uri)
    {
        $path = explode('/', $uri->getPath());
        $pageName = $path[0];
        
        if (!$pageName) {
            return 'default';
        } elseif (isset($routes[$pageName])) {
            return $routes[$pageName];
        } else {
            throw new Exception(sprintf('Page not found: "%s"', $pageName));
            exit;
        }
    }
}
