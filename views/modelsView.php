<?php 
    require_once('./libs/Smarty.class.php');

    class ModelsView{
        public function __construct(){
        }

        // public function showModel($mod, $prodName, $boolAdmin){
        public function showModel($mod, $prodName, $boolAdmin, $error = 0){
            $smarty = new Smarty();
            $smarty->assign('title', 'ElectroCom');
            $smarty->assign('URL', URL);
            $smarty->assign('prodNombre', $prodName);
            $smarty->assign('mod', $mod);
            $smarty->assign('isAdmin', $boolAdmin);
            $smarty->assign('error', $error);
            // Error1 : that model name already exists 
            // if(null != $smarty->session->user_name){
            //     $smarty->assign('userName', $smarty->session->user_name);
            // }
            $smarty->display('./templates/showModel.tpl');
        }
    }

