<?php
    require_once('./models/productsModel.php');
    require_once('./views/productsView.php');
    require_once('usersController.php');

    // require_once('../models');
    // require_once('./views');

    class ProductsController{
        private $pModel;
        private $mModel;
        private $view;
        private $user;

        public function __construct(){
            $this->pModel = new ProductsModel();
            $this->mModel = new ModelsModel();
            $this->view = new ProductsView();
            $this->user = new UsersController();

            // Some function for user verification here
            // userVerify();

        }

        // private function checkAdmin(){
        //     if(!$this->user->isAdmin()){
        //         header("Location: ".URL);
        //         die();
        //     }
        // }

        public function checkAdmin(){
            session_start();
            return($this->user->isAdmin());
        }

        // public function checkUser(){
        //     if(!$this->userKind){
        //         die();
        //     }
        // }

        public function commandProducts(){
            $products = $this->pModel->getProducts();
            $models = $this->mModel->getModels();
            $isAdmin = $this->checkAdmin();

            $this->view->showProducts($products, $models, $isAdmin);
        }
        // This mustn't change ^

        // ----------------------------------------------
        // public function commandModels(){
        // }
        // ----------------------------------------------


        public function commandProduct($prod_name){
            $product = $this->pModel->findProduct($prod_name);
            if($product!=null){
                $productFound = $this->pModel->getProduct($product);
                $models = $this->mModel->getSpecificModels($productFound);
                // This operation of models in products controller is
                // justified because models model refers just to what 
                // a model shows and not to how the array of them are.
                
                $this->view->showProducts($productFound, $models, 
                $this->checkAdmin());
            }
            else{
                header('Location: '.URL);
            }
        }

        // public function commandAddProduct(){
        //     addProduct
        // }

        public function commandEditProduct(){
            if($this->checkAdmin()){
            // $this-> checkAdmin();
            // echo "im in";
            // die();
            // else
                if(isset($_POST['p_selected'])
                &&isset($_POST['p_name'])){
                    $pId = $_POST['p_selected'];
                    $newName = $_POST['p_name'];
                    $this->pModel->editProduct($pId, $newName);
                }
            }
            // echo "im not in";
            // die();
            header("Location: ".URL);
        }

        public function commandAddProduct(){
            if($this->checkAdmin()){
                if(isset($_POST['p_name'])){
                    $newName = $_POST['p_name'];
                    $this->pModel->addProduct($newName);
                }
            }
            header("Location: ".URL);
        }

        public function commandDelProduct($pId){
            if($this->checkAdmin()){
                $this->pModel->delProduct($pId);
            }
            header("Location: ".URL);
        }
        
    }
        // // This must be here because it's not the phone's models
        // // responsability to know about the other models.
        // // This is an extra form.
        // public function commandAddModel(){
        //     $m_name = $_POST['m_name'];
        //     $m_description = $_POST['m_description'];
        //     $m_photo = $_POST['m_photo'];
        //     $modToTest = $this->mModel->getModels();

        //     $i = false;
        //     foreach ($modToTest as $mtt){
        //         if(!$mtt->m_nombre == $m_name){
        //             $i = true;
        //         }
        //     }
        //     if($i){
        //         $this->mModel->addModel(array($m_name, $m_description, $m_photo));
        //     }

        //     commandProducts();
        // }
        

        // public function commandProduct($prod_id){
        //     $product = $this->model->getProduct($prod_id);
        //     $this->view->showProducts(array($product));
        // }
        // WRONG: we do not use an id anymore - we need a name

        // public function commandSmartphones(){
        //     $models = $this->model->getSmartphones();
        //     $this->view->showItem();
        // } 

        // public function commandProducts($prods){
        //     switch ($prods) {
        //         case 'smartphones':
        //             $products = $this->model->getSmartphones();
        //             break;
        //         case 'laptops':
        //             $products = $this->model->getLaptops();
        //             break;
        //         case 'tablets':
        //             $products = $this->model->getTablets();
        //             break;
        //     }
        //     $this->view->displayProducts();
        // }

        // public function setProductTitle(){

        // }