<?php

namespace App\Entity;

use Core\Entity\Entity;

class ProductimgEntity extends Entity
{
    private $id;

    private $url_img;


    /**
     * Get the value of url_img
     */ 
    public function getUrl_img()
    {
        return PATH.'/images/'.$this->url_img;
    }

    /**
     * Set the value of url_img
     *
     * @return  self
     */ 
    public function setUrl_img($url_img)
    {
        $this->url_img = $url_img;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
