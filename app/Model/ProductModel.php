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

    public function findWithImg($id)
    {
        return $this->query("SELECT p.*,product_img.url_img
        FROM products p,product_img
        WHERE p.id = product_img.id_product
        and p.id_df_img=product_img.id
        and p.id = ?",[$id],true);
        
    }

    /*
    public function all()
    {
        return $this->query("SELECT p.*,product_img.url_img FROM products p,product_img WHERE p.id = product_img.id_product and p.id_df_img=product_img.id");
    }
    */

}
