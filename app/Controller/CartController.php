<?php
namespace App\Controller;



class CartController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
    }

    public function index(){
        $this->render('cart/index');
    }

    public function getcart(){
        if (isset($_POST['getcart'])) {
            $SessionCartId = $this->getallid();
            if ($SessionCartId) {
                $products = $this->Product->findInArray(implode(",",array_keys($SessionCartId)));
                $this->render('cart/cart_ajax',compact('products','SessionCartId'),true);
            }else{
                echo "<p>Cart Empty</p>";
            }
        }else{
            return $this->forbidden();
        }
    }

    public function addtocart(){
        if(!empty($_POST)){
            $this->inserttocart($_POST);
            echo count($_SESSION['cart']);
        }
    }

    public function inserttocart($post){
        $qt = (int)$post['qt'];
        if(isset($_SESSION['cart'])){
            $i = 0;
            foreach($_SESSION['cart'] as $cart){
                if(in_array($post['id'],$cart)){
                    return $_SESSION['cart'][$i]['qt'] += $qt;
                }
                $i++;
            }
        }
        $_SESSION['cart'][] = [ 'id_product' => $post['id'],'qt' => $qt];
    }

    public function getallid(){

        if (isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $cart){
                $Scart[(int)$cart['id_product']] = $cart['qt'];
            }
            return $Scart;
        }
        return null;
    }
}