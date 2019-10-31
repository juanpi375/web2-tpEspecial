<?php
    require_once('./libs/Smarty.class.php');

    class ProductsView{
        public function __construct(){
        }

        public function showProducts($products, $models){
            $smarty = new Smarty();
            $smarty->assign('title', 'ElectroCom');
            $smarty->assign('URL', URL);
            $smarty->assign('prodArray', $products);
            $smarty->assign('modArray', $models);
            $smarty->display('./templates/showProducts.tpl');
            // The template that must be called
        }
    }



    