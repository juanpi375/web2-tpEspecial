<?php
    class ProductsModel{
        private $model;
        public function __construct(){
            $this->model = new PDO('mysql:host=localhost;dbname=electrocom;charset=utf8', 'root', '');
        }

        // public function getProducts(){
        //     $ask = $this->model->prepare('SELECT producto.nombre, modelo.nombre_m, modelo.descripcion FROM producto JOIN modelo ON producto.id_producto = modelo.id_producto');
        //     $ok = $ask->execute();
        //     if(!$ok){
        //         var_dump($ask->errorInfo());
        //         die();
        //     }
        //     $aaa = $ask->fetchAll(PDO::FETCH_OBJ);
        //     return $aaa;
        // }

        // !!!This is duplicated!!!
        public function getProducts(){
            $ask = $this->model->prepare('SELECT * FROM producto');
            $ok = $ask->execute();
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }

        // ----------------------------------------------

        public function findProduct($p_name){
            $ask = $this->model->prepare('SELECT * FROM producto WHERE nombre = ?');
            $ok = $ask->execute(array($p_name));
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetch(PDO::FETCH_OBJ);
            return $response;
        }

        public function getProduct($product){
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // $ask = $this->model->prepare('SELECT producto.nombre, modelo.nombre_m, modelo.descripcion FROM producto JOIN modelo ON producto.id_producto = ?');
            $ask = $this->model->prepare('SELECT * FROM producto WHERE id_producto = ?');
            $ok = $ask->execute(array($product->id_producto));
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }
        // WRONG: we do not have an id but a name

        // --------------------------------------------

        public function editProduct($id, $name){
            $ask = $this->model->prepare('UPDATE producto SET nombre = ? WHERE id_producto = ?');
            $ok = $ask->execute(array($name, $id));
            // I suppose this below is totally unnecesary.
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }

        public function addProduct($name){
            $ask = $this->model->prepare('INSERT producto(nombre) VALUES (?)');
            $ok = $ask->execute(array($name));
            // I suppose this below is totally unnecesary.
            if(!$ok){
                var_dump($ask->errorInfo());
                die();
            }
            $response = $ask->fetchAll(PDO::FETCH_OBJ);
            return $response;
        }

        public function delProduct($id){
            $ask = $this->model->prepare('DELETE FROM producto WHERE id_producto = ?');
            $ok = $ask->execute(array($id));
            // if(!ok){
            //     var_dump($ask->errorInfo());
            //     die();
            // }
            // $response = $ask->fetchAll(PDO::FETCH_OBJ);
            // return $response;
        }
    }




    