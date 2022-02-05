<?php
namespace App\Controller;



class ProductsController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('Productimg');
        $this->loadModel('Comment');
    }

    public function index(){
        $products = $this->Product->All();
        $categorys = [];
        $this->render('products/index',compact('products','categorys'));
    }

    public function show($id = null){
        if(!empty($_POST)){
            $data = $_POST;
            if($this->Comment->insert($_POST)){
                header('location:'.PATH.'/products/show/'.$id);
            };
        }
        $product = $this->Product->find($id);
        if(!$product){
            $this->notFound();
        }
        $comments = $this->Comment->findwithuser($id);
        $countcomment = $this->Comment->count($id);
        $moyenrating = $this->Comment->moyenrating($id);
        $user_comment = null;
        if($this->checkauth()){
            $user_comment = $this->Comment->findusercmnt($id);
        }
        
        $Productimgs = $this->Productimg->find($product->getId());
        $this->render('products/show',compact('product','Productimgs','comments','countcomment','user_comment','moyenrating'));
    }

}