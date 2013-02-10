<?php

namespace Pyris;

class Post extends Model
{
    /**
     * Post ID
     *
     * @var string
     */
    public $id;
    
    /**
     * Title
     *
     * @var string
     */
    public $title;
    
    /**
     * Post content
     *
     * @var string
     */
    public $content;
    
    /**
     * Date published
     *
     * @var \DateTime
     */
    public $datePublished;
    
    /**
     * Date last modified
     *
     * @var \DateTime
     */
    public $dateModified;
    
    /**
     * Author
     *
     * @var Author
     */
    public $author;
    
    /**
     * Tags
     *
     * @var Array<string>
     */
    public $tags;
    
    /**
     * The total number of comments
     *
     * @var int
     */
    public $commentsCount;
    
    /**
     * The post comments
     *
     * @var array
     */
    public $comments;
}
