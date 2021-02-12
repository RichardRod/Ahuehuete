<?php

session_start();

require_once 'controller/controller.php';

class SessionController extends controller
{

    private $model;

    public function __construct()
    {
        require_once 'model/user.php';
        $this->model = new User();
    }

    public function run()
    {

        echo 'Execute SessionController';

        switch ($_GET['action']) {

            case 'sign':
                $this->signinForm();
                break;

            case 'register':
                $this->signin();
                header("Location: index.php");
                break;

            case 'login':
                $this->loginForm();
                break;

            case 'session-start':
                $this->sessionStart();
                break;

            case 'logout':
                session_start();
                session_destroy();
                header("Location: index.php");
                break;
        }

    }

    private function signinForm()
    {
        $header = file_get_contents('view/header.html');
        $content = file_get_contents('view/users/signin/signin.html');
        $footer = file_get_contents('view/footer.html');

        echo $header . $content . $footer;
    }

    private function signin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newUser = new User();

            $newUser->username = $_POST['txtUsername'];
            $newUser->name = $_POST['txtName'];
            $newUser->email = $_POST['txtEmail'];
            $newUser->phone = $_POST['txtPhone'];
            $newUser->password = $_POST['txtPassword'];

            $this->model->create($newUser);

        }
    }

    private function loginForm()
    {

        $header = file_get_contents('view/header.html');
        $content = file_get_contents('view/users/login/login.html');
        $footer = file_get_contents('view/footer.html');

        echo $header . $content . $footer;
    }

    private function sessionStart()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();

            $user->username = $_POST['txtUsername'];
            $user->password = $_POST['txtPassword'];

            $data = $this->model->getUser($user);

            if (is_null($user)) {
                echo 'El Usuario No Existe';
            } else {

                if (password_verify($_POST['txtPassword'], $data['5'])) {
                    session_start();

                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $data['0'];
                    $_SESSION["username"] = $data['1'];
                    $_SESSION["name"] = $data['2'];

                    header("Location: index.php");
                } else {
                    echo 'Password Not Match';
                }
            }

        }
    }
}