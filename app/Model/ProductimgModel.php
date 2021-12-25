<?php

namespace App\Model;

use Core\Model\Model;

class ProductimgModel extends Model
{
    protected $table = "product_img";
    
    public function find($id)
    {
        return $this->query("SELECT *
        FROM $this->table
        where id_product = ?", [$id], false);
    }
}
