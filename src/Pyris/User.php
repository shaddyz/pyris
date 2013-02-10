<?php

namespace Pyris;

class User extends Model
{
    /**
     * User ID
     *
     * @var string
     */
    public $id;
    
    /**
     * Name
     *
     * @var string
     */
    public $name;
    
    /**
     * Email Address
     *
     * @var string
     */
    public $emailAddress;
    
    /**
     * Login Name
     *
     * @var string
     */
    public $loginName;
    
    /**
     * Password Hash
     *
     * @var string
     */
    public $passwordHash;
}
