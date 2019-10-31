<?php 
    require_once('./libs/Smarty.class.php');

    class ModelsView{
        public function __construct(){
        }

        public function showModel($mod, $prodName, $boolAdmin){
            $smarty = new Smarty();
            $smarty->assign('title', 'ElectroCom');
            $smarty->assign('URL', URL);
            $smarty->assign('prodNombre', $prodName);
            $smarty->assign('mod', $mod);
            $smarty->assign('isAdmin', $boolAdmin);
            $smarty->display('./templates/showModel.tpl');
        }
    }

