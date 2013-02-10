<?php

namespace Pyris;

class Cursor extends \MongoCursor
{
    public function current()
    {
        if (is_array($array = parent::current())) {
            $class = '\\' . $array['_class'];
            unset($array['_class']);
            $array = $class::fromArray($array);
        }
        return $array;
    }
}
