<?php
    require_once('./models/modelsModel.php');
    require_once('./views/modelsView.php');
    require_once('./controllers/usersController.php');

    class ModelsController{
        private $model;
        private $view;
        private $user;
        // private $userKind;

        public function __construct(){
            $this->model = new ModelsModel();
            $this->view = new ModelsView();
            $this->user = new UsersController();
            // Some function for user verification here
            // userVerify();
        }

        public function checkUser(){
            session_start();
            return($this->user->isUser());
        }

        public function commandModel($mod, $prodName){
            if(!$this->checkUser()){
                header("Location: ".URL."login");
                die();
            }        
            $selectedModel = $this->model->getModel($mod);
            if($selectedModel!=null){
                $this->view->showModel($selectedModel, $prodName,
                $this->user->isAdmin());
                // Views must know who the user is.
            }
            else{
                header('Location: '.URL);
            }
        }

        private function checkAdmin(){
            session_start();
            if(!$this->user->isAdmin()){
                header("Location: ".URL);
                die();
            }
        }

        public function commandAddModel(){
            $this->checkAdmin();
            if ($_POST['p_selection']!=''
            &&$_POST['m_name']!=''
            &&$_POST['m_description']!=''
            &&$_FILES['m_photo']!='') {
                move_uploaded_file($_FILES['m_photo']['tmp_name'], "images/".$_FILES['m_photo']['name']);
                $mod = array($_POST['p_selection'],
                        $_POST['m_name'],
                        $_POST['m_description'],
                        $_FILES['m_photo']['name']);
                $this->model->addModel($mod);
            }
            header("Location: ".URL);
        }

        public function commandEditModel($prodName, $modId, $modName, $mPhoto){
            $this->checkAdmin();
            if (($_POST['m_name']!='') && ($_POST['m_description']!='') && ($_FILES['m_photo']!='')) {
                unlink("./././././images/".$mPhoto);
                move_uploaded_file($_FILES['m_photo']['tmp_name'], "./images/".$_FILES['m_photo']['name']);
                // First parameter is the actual direction of the file,
                // second is its new direction. Notice that PHP uses only 
                // one dot to come back in the directory while HTML uses
                // two.
                $editedModAndId = array($_POST['m_name'],
                        $_POST['m_description'],
                        $_FILES['m_photo']['name'],
                        $modId);
                        // Instead of sending the photo straight
                        // we must send the link to it.

                // Here I need a verification of non repeated name.
                // FAKE: you don't need it because modify options are
                // only in that specific model.
                $this->model->editModel($editedModAndId);
                header("Location: ".URL.$prodName."/".$_POST['m_name']);
                
            }
            else{
                header("Location: ".URL.$prodName."/".$modName);
            }
        }

        public function commandDelModel($mId, $mPhoto){
            $this->checkAdmin();
            unlink("./././images/".$mPhoto);
            // How to delete the photo?? 0.0
            $this->model->delModel($mId);
            header("Location: ".URL);
        }
    }

    