<?php
namespace App\Controller;

use App;
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

class LoginController extends AppController{

    public function __construct()
    {
        parent::__construct();
        // $this->loadModel('Product');
        // $this->loadModel('Productimg');
    }

    public function index()
    {
        if($this->checkauth()){
            header('location:'.PATH);
        }
        $error = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'],$_POST['password'])){
                header('location:'.PATH);
            }
            $error = "Username or password incorrect ..!";
        }
        
        $form = new BootstrapForm($_POST);

        $this->render('users/login',compact('form','error'));
    }

    public function logout(){
        $auth = new DBAuth(App::getInstance()->getDb());
        $auth->logout();
        header('location:'.PATH);
    }

}