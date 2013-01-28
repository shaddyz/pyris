<?php

$appRoot = realpath(__DIR__ . '/..');
require $appRoot . '/vendor/autoload.php';

$configFile    = $appRoot . '/config.ini';
$configReader  = new \Zend\Config\Reader\Ini();
$configArray   = $configReader->fromFile($configFile);
$configuration = new \Zend\Config\Config($configArray);
$httpRequest   = new \Zend\Http\PhpEnvironment\Request();
$httpResponse  = new \Zend\Http\PhpEnvironment\Response();
$pyrisWebApp   = new \Pyris\WebApp($configuration);

$pyrisWebApp->process($httpRequest, $httpResponse);
