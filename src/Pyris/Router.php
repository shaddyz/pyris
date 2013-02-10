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
        $path = $uri->getPath();
        foreach ($this->routes as $routePattern => $routePage) {
            if (preg_match($routePattern, $path)) {
                return preg_replace($routePattern, $routePage, $path);
            }
        }
        return trim($path, '/');
    }
}
