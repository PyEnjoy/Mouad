<?php
namespace Core\Controller;

use App;
use Core\Auth\DBAuth;

class Controller{

    protected $viewPath;
    protected $template;

    public function render($view,$compact = [],$temp = false){

        if ($temp) {
            extract($compact);
            require($view = $this->viewPath.$view.'.php');
        }else{
            ob_start();
            extract($compact);
            $auth = $this->checkauth();
            require($view = $this->viewPath.$view.'.php');
            $content = ob_get_clean();
            require($this->viewPath.'templates/'.$this->template.'.php');
        }
    }
    
    public static function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    public static function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

    public function checkauth(){
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        return $auth->verifier();
    }
}