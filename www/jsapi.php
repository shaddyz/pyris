<?php

include __DIR__ . '/../init.php';

$httpRequest  = new \Zend\Http\PhpEnvironment\Request();
$httpResponse = new \Zend\Http\PhpEnvironment\Response();

$pyris = new Pyris();
$pyris->process($httpRequest, $httpResponse);

$httpResponse->send();
