<?php
namespace App\Controller\Admin;

use App\Entity\ProductEntity;
use Core\HTML\BootstrapForm;

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
        //dd($products);
        $this->render('products/index',compact('products'));
    }

    public function add(){
        if (!empty($_POST)) {
            $_POST += ['create_time'=>date("Y-m-d H:i:s"),'update_time' => date("Y-m-d H:i:s")];
            $id = $this->Product->insert($_POST);
            // //insert images
            // // Loop all images
            for($i = 0; $i < count($_FILES['images']['name']); $i++) {
                $this->insertimg($_FILES['images']['name'][$i],$_FILES['images']['tmp_name'][$i],$id);
            }
            header('location:'.PATH.'/admin/products/edit/'.$id);
            // //die();
        }
        $form = new BootstrapForm($_POST);
        $product = new ProductEntity();
        $this->render('products/add',compact('form','product'));
    }

    public function edit($id){
        if (!empty($_POST)) {
            $_POST += ['update_time' => date("Y-m-d H:i:s")];
            $this->Product->update($id,$_POST);
            // //insert images
            // // Loop all images
            for($i = 0; $i < count($_FILES['images']['name']); $i++) {
                //dump($_FILES['images']);
                $this->insertimg($_FILES['images']['name'][$i],$_FILES['images']['tmp_name'][$i],$id);
            }
            header('location:'.PATH.'/admin/products/edit/'.$id);
            // //die();
        }
        $product = $this->Product->find($id);
        if(!$product){
            $this->notFound();
        }
        $Productimg = $this->Productimg->find($id);
        $this->render('products/edit',compact('product','Productimg'));
    }

    public function insertimg($filename,$tmpname,$id){
        $filename = $this->CheckImgName($filename);
        //dd($filename);
        $target_file = './images//'.$filename;

        // file extension
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        
        // Valid image extension
        //$valid_extension = array("png","jpeg","jpg");
        
        
        if(move_uploaded_file($tmpname,$target_file)) {
            $data['id_product'] = $id;
            $data['url_img'] = $filename;
            return $this->Productimg->insert($data);
        }
    }

    public function delete(){
        if(isset($_POST)){
            $this->Productimg->deleteproduct($_POST['product']);
            $this->Product->delete($_POST['product']);
            header('location:'.PATH.'/admin');
        }
    }

    public function deleteimg()
    {
        echo $this->Productimg->delete($_POST['id']);
    }

    public function CheckImgName($name){
        while(file_exists("./images/" . $name)){
                $temp = explode(".", $name);
                $name = $temp[0].'-1.' . end($temp);
        }
        return $name;
    }
    
}