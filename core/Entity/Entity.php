<?php

namespace Core\Entity;

class Entity
{
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        //return $this->$method();
        $this->$key = $this->$method();
        return $this->$key;
    }
}
