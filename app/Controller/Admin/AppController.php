<?php
namespace App\Controller\Admin;

use \App;
use App\Controller\AppController as ControllerAppController;

class AppController extends ControllerAppController{

    public function __construct()
    {
        $this->viewPath = ROOT.'/app/Views/Admin/';
        if(!isset($_SESSION['auth']['role']) || $_SESSION['auth']['role'] !== "admin"){
            header('location:'.PATH);
        }
    }
}