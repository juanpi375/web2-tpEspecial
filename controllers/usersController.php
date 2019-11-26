<?php
    require_once('./models/usersModel.php');
    require_once('./views/usersView.php');
    require_once('loginController.php');
    // I mean what is going to be the new usersView

    class UsersController{

        private $model;
        private $view;
        private $log;
        public function __construct(){
            $this->model = new UsersModel();
            $this->view = new UsersView();
            $this->log = new LoginController();
            // session_start();

        }

        public function checkAdmin(){
            return($this->log->isAdmin());
        }

        public function commandUsers(){
            if($this->checkAdmin()){
                $users = $this->model->getUsers();
                $this->view->showUsers($users);
            }
            else{
                header("Location: ".URL);
            }
        }

        public function findUser($userName){
            return $this->model->findUser($userName);
        }

        public function addUser($user){
            if($this->checkAdmin()){
                $this->model->addUser($user);
            }
            else{
                header("Location: ".URL);
            }
        }

        public function deleteUser($params = null){
            if($this->checkAdmin()){
                $id = $params[':ID'];
                $this->model->deleteUser($id);
                header("Location: ".URL."usuarios");
            }
            else{
                header("Location: ".URL);
            }
        }

        public function toggleAdmin($params = null){
            // var_dump($id); die;
            if($this->checkAdmin()){
                $id = $params[':ID'];
                $this->model->toggleAdmin($id);
                header("Location: ".URL."usuarios");
            }
            else{
                header("Location: ".URL);
            }
        }
}