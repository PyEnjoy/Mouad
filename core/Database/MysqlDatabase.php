<?php

namespace Core\Database;

use PDO;

class MysqlDatabase extends Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=store;host=localhost', 'root', 'password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($statment, $class = null, $one = false)
    {
        $req = $this->getPDO()->query($statment);
        if(
            strpos($statment,'UPDATE') === 0 ||
            strpos($statment,'DELETE') === 0 ||
            strpos($statment,'INSERT') === 0 
        ){
            return $req;
        }
        if ($class === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }

    public function prepare($statment, $params, $class = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statment);
        $res = $req->execute($params);
        
        if(
            strpos($statment,'UPDATE') === 0 ||
            strpos($statment,'DELETE') === 0 ||
            strpos($statment,'INSERT') === 0 
        ){
            return $res;
        }
        if ($class === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }

    public function getlastid(){
        return $this->getPDO()->lastInsertId();
    }
}
