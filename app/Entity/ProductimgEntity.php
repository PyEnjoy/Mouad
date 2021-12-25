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
        return PATH.'/images//'.$this->url_img;
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
}
