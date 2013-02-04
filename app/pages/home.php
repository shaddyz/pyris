<?php

namespace Pyris;

$view = new View('page.phtml');
$view->title = 'Pyris CMS';

$newPost = new View('new-post.phtml');
$view->mainColumn[] = $newPost;

$contentStream = new View('content-stream.phtml');
$contentStream->contents = array('test post 1', 'test post 2');
$view->mainColumn[] = $contentStream;

print $view;
