<?php
    require_once("./models/commentsModel.php");
    require_once("jsonView.php");
    require_once("./controllers/usersController.php");

    class ApiCommentsController {
        private $model;
        private $view;
        private $user;

        public function __construct(){
            $this->model = new CommentsModel();
            $this->view = new jsonView();
            $this->user = new UsersController();
            // session_start();
        }

        public function getComments($params = null){
            $idModel = $params[':ID'];
            $comments = $this->model->getComments($idModel);
            $this->view->response($comments, 200);
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
            $userData = $this->user->findUser($comment_data->user_name);
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
