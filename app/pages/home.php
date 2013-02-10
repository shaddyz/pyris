<?php

namespace Pyris;

$view = new View('page.phtml');
$view->title = 'Pyris CMS';

$newPost = new View('new-post.phtml');
$view->mainColumn[] = $newPost;

$db = Db::get();
//$recentPosts = $db->posts->find(array('status' => 'published'))->sort(array('datePublished' => 1))->limit(10);
$recentPosts = $db->posts->find();
$recentPosts = $recentPosts;
$postStream = new View('post-stream.phtml');
$postStream->posts = $recentPosts;
$view->mainColumn[] = $postStream;

print $view;
