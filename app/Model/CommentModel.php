<?php

namespace App\Model;

use Core\Model\Model;

class CommentModel extends Model
{
    protected $table = "comments";
    
    public function findwithuser($id)
    {
        return $this->query("SELECT comment,starts,created_at,username
        FROM comments,users
        where users.id=comments.id_user
        and id_product = ?
        order by created_at DESC", [$id]);
    }

    public function count($id)
    {
        return $this->query("SELECT COUNT(*) as countproduct from $this->table where id_product = ? ",[$id],true)->countproduct;
    }

    public function findusercmnt($id)
    {
        $userid = (int)$_SESSION['auth']['id'];
        return $this->query("SELECT comment,starts,created_at,username
        FROM comments,users
        where users.id=comments.id_user
        and id_product = ?
        and id_user = ?
        order by created_at DESC", [$id,$userid],true);
    }

    public function moyenrating($id)
    {
        return (int)$this->query("SELECT AVG(starts) as moyen FROM $this->table where id_product = ? ",[$id],true)->moyen;
    }

    public function insert($data){
        $sqlparts = [];
        $value = [];
        foreach ($data as $key => $val) {
            $sqlparts[] = "$key = ?";
            $value[] = $val;
        }
        $sqlparts[] = "created_at = ?";
        date_default_timezone_set('africa/casablanca');
        $value[] = date("Y-m-d H:i:s");
        $sqlpart = implode(', ',$sqlparts);

        if($this->query("INSERT INTO {$this->table} set $sqlpart ", $value, true)){
            return $this;
        };
    }

}
