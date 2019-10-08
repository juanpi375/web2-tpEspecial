<?php
    require_once('controllers/productsController.php');
    require_once('controllers/modelsController.php');

    define('URL', "http://".$_SERVER['SERVER_NAME'].$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF'])."/");

    $action = $_GET['action'];
    $prodController = new ProductsController();
    $modController = new ModelsController();

    // $modController = new ModelsController;

    if($action == ''){
        $prodController->commandProducts();
    }
    if(isset($action)){
        $thisAction = explode('/', $action);
            if(isset($thisAction[1])){
                if(isset($thisAction[2])){
                    if($thisAction[2] == 'delModel'){
                        $this->modController->commandDelModel();
                    }
                    if($thisAction[2] == 'editModel'){
                        $this->modController->commandEditModel();
                    }
                }
                if($thisAction[1] == 'addProduct'){
                    $this->prodController->commandAddProduct();
                }
                if($thisAction[1] == 'delProduct'){
                    $this->prodController->commandDelProduct($thisAction[1]);
                }
                if($thisAction[1] == 'editProduct'){
                    $this->prodController->commandEditProduct($thisAction[1]);
                }
                // ----------------------Model exception---------------------
                if($thisAction[1] == 'addModel'){
                    $this->prodController->commandAddModel();
                }
                // ----------------------------------------------------------
                // ---------------------Models part--------------------------
                else{
                    $this->modController->commandModel($thisAction[1]);
                }
    
                // ----------------------------------------------------------
            }
            elseif(isset($action[0])&&$action[0]!=null){
                $prodController->commandProduct($thisAction[0]);
            }
            // WHERE DOES THIS GO???????????????????????
        }
    
        // NOTES:
            // The modification of the products doesn't change because
            // the link will complete with the product's name either if
            // you enter by the main or by the selection of the category.
            // 
            // One option could be to show all the products and inside
            // of any of them, command the controller of the models.
            // The other way would be to make a join all parting from 
            // the controller of the products but you need to know the 
            // order of its output. Is it useful?
            // 
            // -The second is more practical given that models should 
            // only know how to show their own content but not
            // theirselves listed. Nevertheless, how are they given??
            // 
            // ORDER_BY id may be?
            // JOIN?