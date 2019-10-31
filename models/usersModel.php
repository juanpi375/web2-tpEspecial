<?php
    class UsersModel{
        private $model;

        public function __construct(){
            $this->model = new PDO('mysql:host=localhost;dbname=electrocom;charset=utf8','root','');
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
        
    }