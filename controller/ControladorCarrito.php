<?php

session_start();

require_once 'controller/controller.php';

class ControladorCarrito extends Controller
{

    private $modeloProducto;

    public function __construct() {
        require_once 'model/product.php';
        $this->modeloProducto = new Product();
    }


    public function run()
    {
        switch ($_GET['action']) {
            case 'checkout':
                $this->mostrarCheckout();
                break;

            case 'agregar':

                $idProducto = $_GET['producto'];
                $cantidad = $_GET['cantidad'];

                $informacionProducto = $this->modeloProducto->obtener($idProducto);

                $_SESSION["Producto"] = array('nombre' => $informacionProducto[0]["Name"]);

                //header("Location: index.php");
                echo "<script type='text/javascript'> document.location = 'index.php?control=cliente&action=carrito'; </script>";

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