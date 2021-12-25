<?php

namespace App\Entity;

use Core\Entity\Entity;

class ProductEntity extends Entity
{
    private $id;

    private $titre;

    private $content;

    private $created_at;

    private $updated_at;
    
    private $imgs = []; 

    private $id_df_img;

    private $categories = [];

    
    public function getUrl()
    {
        return PATH.'/products/show/' . $this->id;
    }

    public function getImg(){
        return PATH.'/images//'.$this->id_df_img;
    }

    public function getExcerpt()
    {
        $html = '<p>' . substr($this->content, 0, 100) . '... </p>';
        $html .= '<p><a class="btn btn-primary" href="' . $this->getUrl() . '">Voir le Produit</a></p>';
        return $html;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->create_time;
    }


    public function addImgs($category): void
    {
        $this->imgs[] = $category;
        $category->setPost($this);
    }
    

    /**
     * Get the value of imgs
     */ 
    public function getImgs()
    {
        return $this->imgs;
    }

    /**
     * Set the value of imgs
     *
     * @return  self
     */ 
    public function setImgs($imgs)
    {
        $this->imgs = $imgs;

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

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
