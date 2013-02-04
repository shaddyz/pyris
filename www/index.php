<?php

$appRoot = dirname(__DIR__);
require $appRoot . '/vendor/autoload.php';
$configFile = $appRoot . '/config.ini';
$appDir = $appRoot . '/app';
$pyrisWebApp = new \Pyris\WebApp($appDir, $configFile);
$pyrisWebApp->run();
