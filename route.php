<?php
    require_once('controllers/productsController.php');
    require_once('controllers/modelsController.php');
    require_once('controllers/usersController.php');

    // define('URL', "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF'])."/");
    define('URL', "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/");
    // define('URL', "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/");

    $action = $_GET['action'];
    $prodController = new ProductsController();
    $modController = new ModelsController();
    $usController = new UsersController();

    if(isset($action)){
        $thisAction = explode('/', $action);
            if(isset($thisAction[0])){
                if(isset($thisAction[1])){
                    if ($thisAction[0]=='delModel') {
                        $modController->commandDelModel($thisAction[1], $thisAction[2]);
                    }
                    if($thisAction[1]=='editModel'){
                        $modController->commandEditModel($thisAction[2], $thisAction[3],
                        $thisAction[4], $thisAction[5]);
                    }
                    else{
                        switch ($thisAction[0]) {
                            // case 'delModel':
                            // $modController->commandDelModel($thisAction[1]);
                            // break;
                            case 'delProd':
                            $prodController->commandDelProduct($thisAction[1]);
                            break;
                            default:
                            // header("Location: ".URL."/login");
                            // $userCheck = $usController->checkLogin();
                            // We put this here so as we are obligued to 
                            // log in to access the models. 
                            $modController->commandModel($thisAction[1], $thisAction[0]);
                            break;
                        }
                    }
                }
                else{
                    switch ($thisAction[0]) {
                        case 'addModel':
                        $modController->commandAddModel();
                        break;
                        case 'editProd':
                        $prodController->commandEditProduct();
                        break;
                        case 'addProd':
                        $prodController->commandAddProduct();
                        break;
                        case 'login':
                        $usController->commandShowLogin();
                        break;
                        case 'tryLog':
                        $usController->logIn();
                        break;
                        // $userCheck = $usController->commandShowLogin();
                        // $prodController->commandProducts($userCheck);
                        case 'trySign':
                        $usController->signUp();
                        break;
                        case 'signUp':
                        $usController->commandShowSignUp();
                        break;
                        case 'logout':
                        $usController->logOut();
                        break;
                        case '':
                        $prodController->commandProducts();
                        break;
                        // $userCheck = $usController->checkLogin();
                        // 
                        default:
                        $prodController->commandProduct($thisAction[0]);
                        break;
                    }                
                }
            }
        }
            // if(isset($thisAction[1])){
            //     if(isset($thisAction[2])){
            //         if($thisAction[2] == 'delModel'){
                        // $modController->commandDelModel();
            //         }
            //         if($thisAction[2] == 'editModel'){
                        // $modController->commandEditModel();
            //         }
            //     }
            //     // All these below must have an index 0
            //     if($thisAction[1] == 'addProduct'){
                    // $prodController->commandAddProduct();
            //     }
            //     if($thisAction[1] == 'delProduct'){
                    // $prodController->commandDelProduct($thisAction[1]);
            //     }
            //     if($thisAction[1] == 'editProduct'){
                    // $prodController->commandEditProduct($thisAction[1]);
            //     }
            //     // ----------------------Model exception---------------------
            //     if($thisAction[1] == 'addModel'){
                    // $modController->commandAddModel();
            //     }
            //     // ----------------------------------------------------------
            //     // ---------------------Models part--------------------------
            //     else{
                    // $modController->commandModel($thisAction[1], $thisAction[0]);
            //     }
    
            //     // ----------------------------------------------------------
            // }
            // elseif(isset($action[0])&&$action[0]!=null){
                // $prodController->commandProduct($thisAction[0]);
            // }
    
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