<?php
    require_once('./models/usersModel.php');
    // require_once('./views/usersView.php');
    // I mean what is going to be the new usersView

    class UsersController{

        private $model;
        private $view;
        public function __construct(){
            $this->model = new UsersModel();
            // $this->view = new UsersView();
        }

        public function getUsers(){
            $users = $this->model->getUsers();
            $this->view->showUsers($users);
        }

        public function findUser($userName){
            return $this->model->findUser($userName);
        }

        public function addUser($user){
            $this->model->$this->model->addUser($user);
        }

        public function deleteUser($id){
            $this->model->deleteUser($id);
        }

        public function toogleAdmin($id){
            $this->model->toogleAdmin($id);
        }
}