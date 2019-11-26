<?php
    require_once("./libs/Smarty.class.php");
    class LoginView{
        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('title', 'ElectroCom');
            $this->smarty->assign('isAdmin', false);
            // $this->smarty->assign('user', $userKind);
        }
        
        public function showLogin($errorData){
            $this->smarty->assign('URL', URL);
            // $smarty->assign('prodArray', $products);
            // $smarty->assign('modArray', $models);
            $this->smarty->assign('error', $errorData);
            $this->smarty->display('./templates/login.tpl');
        }

        public function showSignUp($errorData){
            $this->smarty->assign('URL', URL);
            $this->smarty->assign('error', $errorData);
            $this->smarty->display('./templates/signUp.tpl');
        }

    }
    