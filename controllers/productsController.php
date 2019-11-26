<?php
    require_once('./models/productsModel.php');
    require_once('./views/productsView.php');
    require_once('loginController.php');

    class ProductsController{
        private $pModel;
        private $mModel;
        private $view;
        private $user;

        public function __construct(){
            $this->pModel = new ProductsModel();
            $this->mModel = new ModelsModel();
            $this->view = new ProductsView();
            $this->user = new LoginController();

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
            // session_start();
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

        // OLD WAY
        // public function commandProduct($prod_name){
        //     $product = $this->pModel->findProduct($prod_name);
        //     if($product!=null){
        //         $productFound = $this->pModel->getProduct($product);
        //         $models = $this->mModel->getSpecificModels($productFound);
        //         // This operation of models in products controller is
        //         // justified because models model refers just to what 
        //         // a model shows and not to how the array of them are.
                
        //         $this->view->showProducts($productFound, $models, 
        //         $this->checkAdmin());
        //     }
        //     else{
        //         header('Location: '.URL);
        //     }
        // }
        // NEW WAY
        public function commandProduct($params = null){
            $prod_name = $params[':PRODUCT'];
            if($prod_name == ''){
                $this->commandProducts();
                die();
            }
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
                    $productFound = $this->pModel->findProductById($pId);
                    if($productFound->nombre == $newName && $productFound->id_producto != $pId){
                        // This is to avoid repeated names of
                        // products
                        header("Location: ".URL);
                        die();
                    }
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
                    $product = $this->pModel->findProduct($newName);
                    if($product == null){
                        $this->pModel->addProduct($newName);
                    }
                }
            }
            header("Location: ".URL);
        }

        public function commandDelProduct($params = null){
            $pId = $params[':PRODUCT'];
            if($this->checkAdmin()){
                $this->pModel->delProduct($pId);
            }
            header("Location: ".URL);
        }
        
    }
      