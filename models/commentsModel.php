<?php
    class CommentsModel{
        private $db;

        public function __construct(){
            $this->db = new PDO ('mysql:host=localhost; dbname=electrocom; charset=utf8', 'root', '');
        }
        
        public function getComments($idModel){
            $ask = $this->db->prepare('SELECT * FROM comentario WHERE id_modelo = ?');
            $ok = $ask->execute(array($idModel));
            if(!$ok){
                $ask->errorInfo();
                die();
            }
            return $ask->fetchAll(PDO::FETCH_OBJ);
        }

        public function addComment($comment_data, $user_data){
            // I have the name of the user but not its id..
            // Shall we take its id or just pass its name??..
            // Search user by name and get its id is a good idea
            $query = $this->db->prepare('INSERT INTO comentario(id_usuario, id_modelo, contenido, nombre_usuario) VALUES (?,?,?,?)');
            $ok = $query->execute(array($user_data->id_usuario, $comment_data->id,
            $comment_data->content, $user_data->nombre));
            if(!$ok){
                $query->errorInfo();
                die();
            }
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function deleteComment($id){
            $ask = $this->db->prepare('DELETE FROM comentario WHERE id_comentario = ?');
            $ok = $ask->execute(array($id));
            if(!$ok){
                $ask->errorInfo();
                die();
            }
            return $ask->fetch(PDO::FETCH_OBJ);
        }
        
    }