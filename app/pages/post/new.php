<?php

namespace Pyris;

$post = new Post();

$post->title = 'This is a test post ' . md5(mt_rand(0, 10000));
$post->content = ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel tincidunt lacus. Sed dapibus nibh at sem imperdiet vel rhoncus erat placerat. Vivamus id orci sed mauris convallis accumsan. Morbi iaculis vulputate tellus non placerat. Vivamus sapien magna, adipiscing sed sollicitudin a, mattis a dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc elementum arcu quis justo ornare feugiat. Phasellus bibendum massa id lorem mollis id mattis risus hendrerit.

Aliquam eu ultrices dui. Mauris viverra, sem sed interdum rhoncus, eros eros gravida massa, non interdum diam urna id tortor. Praesent congue commodo facilisis. Pellentesque auctor odio imperdiet lacus faucibus congue. Fusce mi orci, suscipit eu accumsan quis, ultrices quis eros. Vivamus adipiscing dolor eget justo laoreet non porttitor mi lobortis. Nam placerat lacus quis elit dapibus nec sodales quam sollicitudin. Donec in semper eros. In hac habitasse platea dictumst. Quisque a lectus neque. Nulla facilisi. Curabitur ac massa in felis semper mattis. ';

Db::get()->posts->save($post);
