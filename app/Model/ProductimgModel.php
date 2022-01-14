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

    public function defaultimg($id)
    {
        return $this->query("SELECT *
        FROM $this->table
        where id = ?", [$id], true);
    }

    public function deleteproduct($id)
    {
        return $this->query("DELETE
        FROM $this->table
        where id_product = ?", [$id]);
    }

    // public function checkimage($name)
    // {
    //     return $this->query("SELECT *
    //     FROM $this->table
    //     where url_img like ?", [$name], false);
    // }
}
