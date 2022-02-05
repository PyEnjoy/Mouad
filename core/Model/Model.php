<?php

namespace Core\Model;

use Core\Database\Database;

class Model
{
    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class = end($parts);
            $this->table = strtolower(str_replace('Model', '', $class)) . 's';
        }
    }

    public function query($statment, $params = null, $one = false)
    {
        if ($params) {
            return $this->db->prepare(
                $statment,
                $params,
                str_replace('Model', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statment,
                str_replace('Model', 'Entity', get_class($this)),
                $one
            );
        }
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }
    
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} where id = ?", $id, true);
    }
    
    public function findInArray($id)
    {
        return $this->query("SELECT * FROM {$this->table} where id in ($id)");
    }

    public function list($key,$value)
    {
        $res = $this->all();
        $return = [];
        foreach($res as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function update(int $id,array $data)
    {
        $sqlparts = [];
        $value = [];
        foreach ($data as $key => $val) {
            $sqlparts[] = "$key = ?";
            $value[] = $val;
        }
        $value[] = $id;
        $sqlpart = implode(', ',$sqlparts);

        return $this->query("UPDATE {$this->table} set $sqlpart where id = ?", $value, true);
    }
    
    public function delete(int $id)
    {
        return $this->query("DELETE FROM {$this->table} where id = ?", [$id], true);
    }

    public function insert($data)
    {
        $sqlparts = [];
        $value = [];
        foreach ($data as $key => $val) {
            $sqlparts[] = "$key = ?";
            $value[] = $val;
        }
        $sqlpart = implode(', ',$sqlparts);

        if($this->query("INSERT INTO {$this->table} set $sqlpart ", $value, true)){
            return $this->db->getlastid();
        };
    }
}
