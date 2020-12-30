<?php

session_start();

require_once 'controller/controller.php';

class SessionController extends controller {

    private $model;

    public function __construct() {
        require_once 'model/user.php';
        $this->model = new User();
    }

    public function run() {

        echo 'Execute SessionController';

        switch ($_GET['action']) {

            case 'sign':

                $this->signinForm();

                //header("Location: http://floval.mx/index.php");

                break;

            case 'register':

                $this->signin();

                break;

            case 'login':
                $this->login();

                //header("Location: http://floval.mx/index.php");
                break;

            case 'logout':
                session_start();
                session_unset();
                session_destroy();

                break;
        }

    }

    private function signinForm() {

        $header = file_get_contents('view/header.html');
        $content = file_get_contents('view/users/signin/signin.html');
        $footer = file_get_contents('view/footer.html');


        echo $header . $content . $footer;

    }

    private function signin()
    {

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $newUser = new User();

            $newUser->username = $_POST['txtUsername'];
            $newUser->password = $_POST['txtPassword'];

            $this->model->create($newUser);

        }



    }

    private function login() {

        echo 'Login';

    }
}