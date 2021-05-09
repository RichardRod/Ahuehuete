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

            case 'registrarse':
                $this->signinForm();
                break;

            case 'register':
                $this->signin();
                //header("Location: index.php");
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
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
                //header("Location: https://ahuehuete-shop.mx/index.php");
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                break;
        }

    }

    private function signinForm()
    {
        $header = file_get_contents('view/header/header.html');
        $content = file_get_contents('view/sesion/registro/formulario-registro.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content . $footer;
    }

    private function signin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newUser = new User();

            $newUser->nombre = $_POST['txt-nombre'];
            $newUser->correo = $_POST['txt-correo'];
            $newUser->telefono = $_POST['txt-telefono'];
            $newUser->password = $_POST['txt-password'];

            $this->model->create($newUser);

        }
    }

    private function loginForm()
    {

        $header = file_get_contents('view/header/header.html');
        $content = file_get_contents('view/sesion/iniciar-sesion/formulario-iniciar-sesion.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content . $footer;
    }

    private function sessionStart()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();

            $user->correo = $_POST['txt-correo'];
            $user->password = $_POST['txt-password'];

            $data = $this->model->getUser($user);


            if (!isset($user)) {
                echo 'El Usuario No Existe';
            } else {

                if (password_verify($_POST['txt-password'], $data['4'])) {
                    session_start();

                    // Iniciar variables de sesión
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $data['0'];
                    $_SESSION["nombre"] = $data['1'];
                    $_SESSION["correo"] = $data['2'];
                    $_SESSION["telefono"] = $data['3'];
                    $_SESSION["rfc"] = $data['5'];
                    $_SESSION["tipoUsuario"] = $data['7'];

                    //header("Location: index.php");
                    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

                } else {
                    echo 'Password Not Match';
                }
            }

        }
    }
}