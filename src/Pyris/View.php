<?php

namespace Pyris;

class View
{
    public static $templateDirectory;
    private $template;
    private $attributes = array();
    
    public function __construct($template)
    {
        $this->template = $template;
    }
    
    public function &__get($key)
    {
        if (!isset($this->attributes[$key])) {
            $this->attributes[$key] = array();
        }
        
        return $this->attributes[$key];
    }
    
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
    
    public function __toString()
    {
        foreach ($this->attributes as $key => $value) {
            if (is_array($value)) {
                $newValue = '';
                foreach ($value as $valKey => $valValue) {
                    $newValue .= $valValue;
                }
                $value = $newValue;
            }
            $$key = $value;
        }
        
        ob_start();
        @include self::$templateDirectory . '/' . $this->template;
        $viewString = ob_get_contents();
        ob_clean();
        return $viewString;
    }
}

?>
