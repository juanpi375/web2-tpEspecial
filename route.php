<?php
    require_once('controllers/productsController.php');
    require_once('controllers/modelsController.php');
    require_once('controllers/usersController.php');
    require_once('Router.php');

    // define('URL', "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF'])."/");
    define('URL', "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/");
    // define('URL', "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/");

    // $action = $_GET['action'];
    // $prodController = new ProductsController();
    // $modController = new ModelsController();
    // $usController = new UsersController();

    // if(isset($action)){
    //     $thisAction = explode('/', $action);
    //         if(isset($thisAction[0])){
    //             if(isset($thisAction[1])){
    //                 if ($thisAction[0]=='delModel') {
    //                     $modController->commandDelModel($thisAction[1], $thisAction[2]);
    //                 }
    //                 if($thisAction[1]=='editModel'){
    //                     $modController->commandEditModel($thisAction[2], $thisAction[3],
    //                     $thisAction[4], $thisAction[5]);
    //                 }
    //                 else{
    //                     switch ($thisAction[0]) {
    //                         case 'delProd':
    //                         $prodController->commandDelProduct($thisAction[1]);
    //                         break;
    //                         default:
    //                         // header("Location: ".URL."/login");
    //                         // $userCheck = $usController->checkLogin();
    //                         // We put this here so as we are obligued to 
    //                         // log in to access the models. 
    //                         $modController->commandModel($thisAction[1], $thisAction[0]);
    //                         break;
    //                     }
    //                 }
    //             }
    //             else{
    //                 switch ($thisAction[0]) {
    //                     case 'addModel':
    //                     $modController->commandAddModel();
    //                     break;
    //                     case 'editProd':
    //                     $prodController->commandEditProduct();
    //                     break;
    //                     case 'addProd':
    //                     $prodController->commandAddProduct();
    //                     break;
    //                     case 'login':
    //                     $usController->commandShowLogin();
    //                     break;
    //                     case 'tryLog':
    //                     $usController->logIn();
    //                     break;
    //                     // $userCheck = $usController->commandShowLogin();
    //                     // $prodController->commandProducts($userCheck);
    //                     case 'trySign':
    //                     $usController->signUp();
    //                     break;
    //                     case 'signUp':
    //                     $usController->commandShowSignUp();
    //                     break;
    //                     case 'logout':
    //                     $usController->logOut();
    //                     break;
    //                     case '':
    //                     $prodController->commandProducts();
    //                     break;
    //                     // $userCheck = $usController->checkLogin();
    //                     // 
    //                     default:
    //                     $prodController->commandProduct($thisAction[0]);
    //                     break;
    //                 }                
    //             }
    //         }
    // }
            $r = new Router();

            $r->setDefaultRoute("ProductsController", "commandProducts");
            
            $r->addRoute("login", "GET", "LoginController", "commandShowLogin");
            $r->addRoute("signUp", "GET", "LoginController", "commandShowSignUp");
            $r->addRoute("tryLog", "POST", "LoginController", "logIn");
            $r->addRoute("trySign", "POST", "LoginController", "signUp");
            $r->addRoute(":PRODUCT", "GET", "ProductsController", "commandProduct");
            $r->addRoute("delModel/:MODELID/:PHOTO", "GET", "ModelsController", "commandDelModel");
            $r->addRoute("delProd/:PRODUCT", "GET", "ProductsController", "commandDelProduct");
            $r->addRoute("addModel", "POST", "ModelsController", "commandAddModel");
            $r->addRoute("addProd", "POST", "ProductsController", "commandAddProduct");
            $r->addRoute("editProd", "POST", "ProductsController", "commandEditProduct");
            $r->addRoute("editModel/:PRODUCT/:MODELID/:MODEL/:PHOTO", "POST", "ModelsController", "commandEditModel");
            $r->addRoute(":PRODUCT/:MODEL", "GET", "ModelsController", "CommandModel");

            $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
        
           