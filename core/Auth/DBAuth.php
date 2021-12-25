<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        // if (session_status() === PHP_SESSION_NONE) {
        //     session_start();
        // }
    }

    public function getUserId(){
        if ($this->verifier()) {
            return $_SESSION['auth']['id'];
        }
            return false;
    }
    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users where username = ?', [$username], null, true);
        
        if ($user) {
            if(sha1($password) === $user->password){
                $_SESSION['auth']['id'] = $user->id;
                $_SESSION['auth']['name'] = $user->username;
                return true; 
            }
        }
        return false;
    }

    public function verifier()
    {
        //var_dump($_SESSION);
        return isset($_SESSION['auth']);
    }

    public function logout(){
        if(isset($_SESSION['auth'])){
            unset($_SESSION['auth']);
        }
    }

}
