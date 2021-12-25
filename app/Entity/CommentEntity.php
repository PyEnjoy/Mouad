<?php

namespace App\Entity;

use Core\Entity\Entity;

class CommentEntity extends Entity
{
    private $created_at;



    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        $date = strtotime($this->created_at);
        return date('d M Y',$date);
    }
}
