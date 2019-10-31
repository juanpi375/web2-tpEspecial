<?php
    class ModelsModel{
        private $model;
        public function __construct(){
            $this->model = new PDO('mysql:host=localhost;dbname=electrocom;charset=utf8', 'root', '');
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

        public function getSpecificModels($prodFound){
            $ask = $this->model->prepare('SELECT * FROM modelo WHERE id_producto = ?');
            // We are going to select all the models and reveal what we want
            // only in the view. The key is the first element of the array as 
            // it allows us to use the same function for showing all categories 
            // or a specific one.
            $ok = $ask->execute(array($prodFound[0]->id_producto));
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }

        public function getModel($modName)
        {
            $ask = $this->model->prepare('SELECT * FROM modelo WHERE nombre_m = ?');
            $ok = $ask->execute(array($modName));
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetch(PDO::FETCH_OBJ);
            return $response;
        }

        public function addModel($mod){
            $query = $this->model->prepare('INSERT INTO modelo(id_producto, nombre_m, descripcion, foto) VALUES (?,?,?,?)');
            $ok = $query->execute($mod);
            if(!$ok){
                var_dump($query->errorInfo());
                die();
            }
            $response = $query->fetchAll(PDO::FETCH_OBJ);
            return $response;
            // Is it possible to return a value we have inserted??????
        }

        public function editModel($newModAndId){
            $ask = $this->model->prepare('UPDATE modelo SET nombre_m = ?, descripcion = ?, foto = ? WHERE id_modelo = ?');
            $ok = $ask->execute($newModAndId);
            // I suppose this below is totally unnecesary.
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }

        public function delModel($id){
            $ask = $this->model->prepare('DELETE FROM modelo WHERE id_modelo = ?');
            $ok = $ask->execute(array($id));
        }
    }