<?php
require_once("./models/commentsModel.php");
require_once("jsonView.php");

class ApiCommentsController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CommentsModel();
        $this->view = new jsonView();
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
        
        $comment_data = json_decode(file_get_contents('php://input'));
        $sent = $this->model->addComment($comment_data);
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
