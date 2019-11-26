<?php
    require_once("./models/commentsModel.php");
    require_once("jsonView.php");
    require_once("./models/usersModel.php");
    // require_once("./controllers/usersController.php");
    require_once("./controllers/loginController.php");

    // define('URL', "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/");


    class ApiCommentsController {
        private $model;
        private $view;
        // private $user;
        private $userModel;
        private $log;

        public function __construct(){
            $this->model = new CommentsModel();
            $this->view = new jsonView();
            // $this->user = new UsersController();
            $this->userModel = new UsersModel();
            $this->log = new LoginController();
            // session_start();
        }

        // public function checkUser(){
        //     session_start();
        //     return($this->log->isUser());
        // }

        public function getComments($params = null){
            // var_dump("as");die;
            $idModel = $params[':ID'];
            $filter = $_GET['filter'];
            $order = $_GET['order'];
            // if($this->checkUser()){
                
                // if ($_GET['order'] == 'asc' )
                if($order != "ASC" && $order != "DESC"){
                    // var_dump($order); die;  
                    $order  = "ASC";
                }
                if($filter != "id_comentario" && $filter != "puntaje" && $filter != "nombre_usuario"){
                    $filter = "id_comentario";
                }

                $comments = $this->model->getComments($idModel, $filter, $order);
                $this->view->response($comments, 200);
            // }
            // else{
            //     var_dump("not now"); die;
            // }
            // The first parameter is the variable and 
            // the second the proper status
        }

        public function deleteComment($params = null){
            $id = $params[":ID"];
            $deleted = $this->model->deleteComment($id);
            $this->view->response($deleted, 200);
        }

        public function addComment(){
            // It lacks the verification here..
            // session_start();
            // var_dump($_SESSION); die;
            // $user_name = $_SESSION['user_name'];
            // Why $_SESSION is undefined here???
            $comment_data = json_decode(file_get_contents('php://input'));
            // var_dump($comment_data); die;
            $userData = $this->userModel->findUser($comment_data->user_name);
            // Finds the user in order to obtain the id..
            // If we just wanted the name that wouldn't be 
            // necessary at all.. but we may want to add other
            // data later on - user's last name, user pic.. -
            $sent = $this->model->addComment($comment_data, $userData);
            // $sent = $this->model->addComment($comment_data);
            // Needs to complete the model now..
            $this->view->response($sent, 200);
        
        }


        // public function updateComment($params = null){

        // }

        // public function getTareas($params = null) {
        //     $tareas = $this->model->getTareas();
        //     $this->view->response($tareas, 200);
        // }

        // public function getTarea($params = null) {
        //     // obtiene el parametro de la ruta
        //     $id = $params[':ID'];
            
        //     $tarea = $this->model->GetTarea($id);
            
        //     if ($tarea) {
        //         $this->view->response($tarea, 200);   
        //     } else {
        //         $this->view->response("No existe la tarea con el id={$id}", 404);
        //     }
        // }
    }
