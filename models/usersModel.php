<?php
    class UsersModel{
        private $model;

        public function __construct(){
            $this->model = new PDO('mysql:host=localhost;dbname=electrocom;charset=utf8','root','');
        }

        public function getUsers(){
            $ask = $this->model->prepare('SELECT * FROM usuario');
            $ok = $ask->execute();
            if(!$ok){
                var_dump($ask->errorInfo()); die;
            }
            return $ask->fetchAll(PDO::FETCH_OBJ);
        }

        public function findUser($name){
            $ask = $this->model->prepare('SELECT * FROM usuario WHERE nombre = ?');
            $ok = $ask->execute(array($name));
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetch(PDO::FETCH_OBJ);
            return $response;
        }

        public function addUser($newUser){
            $ask = $this->model->prepare('INSERT INTO usuario(nombre,email,edad,contraseña)
             VALUES (?,?,?,?)');
            $ok = $ask->execute($newUser);
            if(!$ok){
                $ask->errorInfo();
                die();
            }
            $response = $ask->fetch(PDO::FETCH_OBJ);
            return $response;
        }

        public function deleteUser($id){
            $ask = $this->model->prepare('DELETE FROM usuario WHERE id_usuario = ?');
            $ok = $ask->execute(array($id));
            if(!$ok){
                $ask->errorInfo();
                die();
            }
            $response = $ask->fetch(PDO::FETCH_OBJ);
            return $response;
        }

        public function toggleAdmin($id){
            // var_dump($id); die;
            $ask = $this->model->prepare('UPDATE usuario SET es_administrador = 
            IF(es_administrador = 1,0,1) WHERE id_usuario = ?');
            $ok = $ask->execute(array($id));
            if(!$ok){
                $ask->errorInfo();
                die();
            }
            $response = $ask->fetch(PDO::FETCH_OBJ);
            return $response;
        }    
    }