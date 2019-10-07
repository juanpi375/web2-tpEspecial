<?php
    class ModelsModels{
        private $model;
        public function __construct(){
            $this->model = new PDO('host:mysql=localhost;dbname=modelo;charset=utf8', 'root', '');
        }

        public function getModels(){
            $ask = $this->model->prepare('SELECT * FROM modelo');
            $ok = $ask->execute();
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }

        public function addModel($mod){
            $query = $this->model->prepare('INSERT INTO modelo(nombre, descripcion, foto) VALUES (?,?,?)');
            $ok = $query->execute($mod);
            if(!$ok){
                var_dump($query->errorInfo());
                die();
            }
            $response = $query->fetchAll(PDO::FETCH_OBJ);
            return $response;
            // Is it possible to return a value we have inserted??????
        }

        public function editModel($m_id){

        }

        public function delModel($m_id){

        }
    }