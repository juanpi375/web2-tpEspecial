<?php
    require_once('./models/usersModel.php');
    require_once('./views/usersView.php');
    define('ADMIN', 'iamroot');
    
    class UsersController{
        private $model;
        private $view;

        public function __construct(){
            $this->model = new UsersModel();
            // $this->checkLogin();
            // This kind of check would work if we
            // want the user to be logged up in any 
            // page but what happens when I want they
            // to access some functions any way?
            $this->view = new UsersView();
        }

        // Change its name for isUser
        // public function checkLogin(){
        //     session_start();
        //     if(!isset($_SESSION['user_name'])){
        //         header("Location: ".URL."login");
        //         // $this->view->showLogin();
        //         // Still needs to be done.
        //         die();

        //         // header("Location: ".URL);
        //         // It is not necessary to redirect to the
        //         // login if that is controlled by the
        //         // controllers constructors.
        //     }
        //     // return true;
        //     // This must be the verification of the 
        //     // kind of user.
        // }
        public function isUser(){
            // session_start();
            return(isset($_SESSION['user_name']));
        }

        public function isAdmin(){
            return($this->isUser()&&$_SESSION['user_name']==ADMIN);
        }

        public function commandShowLogin(){
            $this->logOut();
            $this->view->showLogin(0);
            // This 0 means there are no errors in the login
        }
        
        public function commandShowSignUp(){
            $this->logOut();
            $this->view->showSignUp(0);
        }

        // LOGIN
        public function logIn(){
            // echo 'up to here?';
            if(!empty($_POST['login_name'])
            &&!empty($_POST['login_pass'])){
                $name = $_POST['login_name'];
                // $hash = password_hash($pass, PASSWORD_DEFAULT);
                $pass = $_POST['login_pass'];
                $user = $this->model->findUser($name);
                if(!empty($user)
                &&password_verify($pass, $user->contraseña)){
                    session_start();
                    $_SESSION['user_name'] = $user->nombre;
                    header("Location: ".URL);
                }
                else{
                    $this->view->showLogin(1);
                }
            }
            else{
                $this->view->showLogin(2);
            }
            // Redirecting distract the user if it is not logged in
        }

        // SIGN UP
        public function signUp(){
            // echo 'what about now?';
            if(!empty($_POST['login_name'])
            &&!empty($_POST['login_email'])
            &&!empty($_POST['login_pass'])
            &&!empty($_POST['login_age'])){
                if(!$this->model->findUser($_POST['login_name'])){
                    $user = array($_POST['login_name'],
                    $_POST['login_email'],
                    $_POST['login_age'],
                    password_hash($_POST['login_pass'], PASSWORD_DEFAULT));
                    $this->model->addUser($user);
                    session_start();
                    $_SESSION['user_name'] = $_POST['login_name'];
                    // var_dump($user);
                    header("Location: ".URL);
                }
                else{
                    $this->view->showSignUp(1);
                }
            }
            else{
                $this->view->showSignUp(2);
            }
        }

        public function logOut(){
            session_start();
            session_destroy();
            // header("Location: ".URL);
        }
    }