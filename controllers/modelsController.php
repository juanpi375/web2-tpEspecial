<?php
    require_once('./models/modelsModel.php');

    require_once('./models/commentsModel.php');

    require_once('./views/modelsView.php');
    require_once('./controllers/loginController.php');

    class ModelsController{
        private $model;
        private $view;
        private $user;
        // private $userKind;

        public function __construct(){
            $this->model = new ModelsModel();
            $this->view = new ModelsView();
            $this->user = new LoginController();

            // session_start();
            // Some function for user verification here
            // userVerify();
        }

        public function checkUser(){
            // session_start();
            return($this->user->isUser());
        }

        // public function commandModel($mod, $prodName){
        //     if(!$this->checkUser()){
        //         header("Location: ".URL."login");
        //         die();
        //     }        
        //     $selectedModel = $this->model->getModel($mod);
        //     if($selectedModel!=null){
        //         $this->view->showModel($selectedModel, $prodName,
        //         $this->user->isAdmin());
        //         // Views must know who the user is.
        //     }
        //     else{
        //         header('Location: '.URL);
        //     }
        // }
        public function commandModel($params = null){
            // if(!$this->checkUser()){
            //     header("Location: ".URL."login");
            //     die();
            // }
            // Now, visitors are allowed to see models 
            // with its comments
            $mod = $params[':MODEL'];
            $prodName = $params[':PRODUCT'];
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

        public function checkAdmin(){
            // session_start();  
            if(!$this->user->isAdmin()){
                header("Location: ".URL);
                die();
            }
            else{
                return true;
            }
        }

        public function commandAddModel(){
            // var_dump ($this->checkAdmin());
            // die();
            if($this->checkAdmin()){
                if ($_POST['p_selection']!=''
                &&$_POST['m_name']!=''
                &&$_POST['m_description']!=''
                &&$_FILES['m_photo']!=''
                &&($_FILES['m_photo']['type']=='image/jpeg'
                ||$_FILES['m_photo']['type']=='image/jpg'
                ||$_FILES['m_photo']['type']=='image/png')) {
                    $comparable = $this->model->getModel($_POST['m_name']);
                    if($comparable != null){
                        header("Location: ". URL);
                        die;
                    }
                    // First change the name of the image,
                    // then save that image in the folder,
                    // and lastly save its name in the table
                    $photoParts = explode(".", $_FILES['m_photo']['name']);
                    $type = $photoParts[1];
                    $newName = uniqid().".".$type;
                    // var_dump($_FILES);
                    // var_dump($_FILES['m_photo']['type']);
                    // var_dump($newName);die;
                    move_uploaded_file($_FILES['m_photo']['tmp_name'],
                    "images/". $newName);

                    // move_uploaded_file($_FILES['m_photo']['tmp_name'],
                    // "images/".$_FILES['m_photo']['name']);

                    // The first says the first location and 
                    // the other is where you want it to be
                    $mod = array($_POST['p_selection'],
                            $_POST['m_name'],
                            $_POST['m_description'],
                            // $_FILES['m_photo']['name']);
                            $newName);
                    $this->model->addModel($mod);
                }
            }
            header("Location: ".URL);
        }

        public function commandEditModel($params = null){
            // Solved but could be improved with one new error template
            $prodName = $params[':PRODUCT'];
            $modId = $params[':MODELID'];
            $modName = $params[':MODEL'];
            $modPhoto = $params[':PHOTO'];
            if($this->checkAdmin()){
                if (($_POST['m_name']!='') && ($_POST['m_description']!='') && ($_FILES['m_photo']!='')
                &&(($_FILES['m_photo']['type'] == 'image/png')
                ||($_FILES['m_photo']['type'] == 'image/jpeg'))
                ||($_FILES['m_photo']['type'] == 'image/jpg')) {
                    
                    $comparable = $this->model->getModel($_POST['m_name']);

                    if($comparable != null && $comparable->id_modelo != $modId){
                        // var_dump(URL.$prodName."/".modName);
                        header("Location: ". URL.$prodName."/".$modName);
                        die;
                    }

                    $photoParts = explode(".", $_FILES['m_photo']['name']);
                    $type = $photoParts[1];
                    $newName = uniqid().".".$type;
                    // var_dump($modPhoto); die;
                    unlink("././././images/". $modPhoto);
                    move_uploaded_file($_FILES['m_photo']['tmp_name'], "./images/". $newName);
                    
                    // First parameter is the actual direction of the file,
                    // second is its new direction. Notice that PHP uses only 
                    // one dot to come back in the directory while HTML uses
                    // two.
                    $editedModAndId = array($_POST['m_name'],
                            $_POST['m_description'],
                            $newName,
                            $modId);
                            // Instead of sending the photo straight
                            // we must send the link to it.

                    // Here I need a verification of non repeated name.
                    // FAKE: you don't need it because modify options are
                    // only in that specific model.
                    $this->model->editModel($editedModAndId);
                    header("Location: ".URL.$prodName."/".$_POST['m_name']);
                    die();
                }
            }
            header("Location: ".URL.$prodName."/".$modName);
        }

        public function commandDelModel($params = null){
            // First we need to delete the photo,
            // then the comments and lastly
            // the model

            $mId = $params[':MODELID'];
            $mPhoto = $params[':PHOTO'];
            if($this->checkAdmin()){
                unlink("./././images/".$mPhoto);

                $commentModel = new CommentsModel();
                $commentModel->deleteCommentsByModel($mId);

                $this->model->delModel($mId);
            }
            header("Location: ".URL);
        }
    }

    