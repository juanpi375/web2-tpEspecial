<?php
    require_once('./libs/Smarty.class.php');

    class UsersView{
        private $smarty;
        public function __construct(){
            
        }
        
        public function showUsers($users){
            $this->smarty = new Smarty();
            $this->smarty->assign("title", "ElectroCom");
            $this->smarty->assign("URL", URL);
            $this->smarty->assign('isAdmin', false);
            $this->smarty->assign("users", $users);
            $this->smarty->display("./templates/users.tpl");
            // A template has to be created
        }
    }