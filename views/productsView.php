<?php
    require_once('./libs/Smarty.class.php');

    class ProductsView{
        public function __construct(){
        }

        // public function showProducts($products, $models, $boolAdmin){
        public function showProducts($products, $models, $boolAdmin, $error = 0){
            $smarty = new Smarty();
            $smarty->assign('title', 'ElectroCom');
            $smarty->assign('URL', URL);
            $smarty->assign('prodArray', $products);
            $smarty->assign('modArray', $models);
            $smarty->assign('isAdmin', $boolAdmin);
            $smarty->assign('error', $error);
            // Error1 : that model name already exists 
            // Error2 : that product name already exists
            $smarty->display('./templates/showProducts.tpl');
            // The template that must be called
        }
    }


    
