<?php

namespace App\Model;

use Core\Model\Model;

class ProductModel extends Model
{
    protected $table = "products";
    
    public function find($id)
    {
        return $this->query("SELECT *
        FROM $this->table
        where id = ?", [$id], true);
    }

}
