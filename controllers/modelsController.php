<?php
    require_once('./models/modelsModel.php');
    require_once('./views/modelsView.php');

    class ModelsController{
        private $model;
        private $view;

        public function __construct(){
            $this->model = new ModelsModel();
            // $this->view = new ModelsView();
        }

        public function commandModel($mod){
            $selectedModel = $this->model->getModel($mod);
            $this->view->showModel($selectedModel);
        }

        public function commandEditModel($mod){

        }

        public function commandDelModel($mod){
            
        }
    }