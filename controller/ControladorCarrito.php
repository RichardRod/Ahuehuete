<?php

session_start();

require_once 'controller/controller.php';

class ControladorCarrito extends Controller
{

    private $modeloProducto;

    public function __construct()
    {
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

                if (count($_SESSION["Producto"]) > 0) { // Ya hay más de un arrticulo agrregado al carrito
                    array_push($_SESSION["Producto"],
                        array(
                            'id' => $informacionProducto[0]["ProductId"],
                        ));
                } else { // es primer articulo
                    $_SESSION["Producto"] = array(
                        'id' => $informacionProducto[0]["ProductId"],
                    );
                }
                //$_SESSION["Producto"] = array('nombre' => $informacionProducto[0]["Name"]);

                //header("Location: index.php");
                echo "<script type='text/javascript'> document.location = 'index.php?control=cliente&action=carrito'; </script>";

                break;

            case 'eliminar':

                $idEliminar = $_GET['producto'];

                if (($key = array_search($idEliminar, $_SESSION["Producto"]["id"])) !== false) {
                    unset($_SESSION["Producto"][$key]);
                }


                var_dump($_SESSION["Producto"]);
                echo 'Alto: ' . $idEliminar;
                //unset($_SESSION["Producto"]['id'][$idEliminar]);

                //echo "<script type='text/javascript'> document.location = 'index.php?control=cliente&action=carrito'; </script>";

                break;

            case 'aplicar-descuento':

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                }
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