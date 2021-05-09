<?php

session_start();

require_once 'controller/controller.php';

class ControladorCarrito extends Controller
{

    public function run()
    {
        switch ($_GET['action']) {
            case 'checkout':
                $this->mostrarCheckout();
                break;

            case 'agregar':

                $nombre = $_GET['producto'];
                $_SESSION["Producto"] = array('nombre' => $nombre);

                //header("Location: index.php");
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

                break;


        }
    }

    private function mostrarCheckout()
    {
        $header = file_get_contents('view/header/header-cliente.html');
        $content = file_get_contents('view/cart/checkout.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content . $footer;
    }

}