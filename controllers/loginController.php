<?php
    require_once('./models/usersModel.php');
    require_once('./views/loginView.php');
    require_once('./controllers/usersController.php');
    define('ADMIN', 'iamroot');
    
    class LoginController{
        private $model;
        private $view;
        private $controller;

        public function __construct(){
            $this->model = new UsersModel();

            $this->controller = new UsersController();
            // $this->checkLogin();
            // This kind of check would work if we
            // want the user to be logged up in any 
            // page but what happens when I want they
            // to access some functions any way?
            $this->view = new LoginView();
        }

        public function isUser(){
            // session_start();
            return(isset($_SESSION['user_name']));
        }

        public function isAdmin(){
            return($this->isUser()&&$_SESSION['user_name']==ADMIN);
        }

        public function commandShowLogin(){

            $this->logOut();
            // echo "yeah";
            // die;
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

                // $user = $this->model->findUser($name);
                $user = $this->controller->findUser($name);

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


                // if(!$this->model->findUser($_POST['login_name'])){
                if(!$this->controller->findUser($_POST['login_name'])){

                    $user = array($_POST['login_name'],
                    $_POST['login_email'],
                    $_POST['login_age'],
                    password_hash($_POST['login_pass'], PASSWORD_DEFAULT));

                    // $this->model->addUser($user);
                    $this->controller->addUser($user);

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
            // echo session_destroy(); die;
            session_destroy();
            $_SESSION['user_name'] = null;
            // echo $_SESSION['user_name']; die;
            // header("Location: ".URL);
        }
    }