<?php

session_start();

require_once 'controller/controller.php';

class ControladorCuponDescuento extends Controller
{

    private $modeloDescuento;
    private $modeloCategoria;

    public function __construct()
    {
        require_once 'model/Descuento.php';
        $this->modeloDescuento = new Descuento();

        require_once 'model/Categoria.php';
        $this->modeloCategoria = new Categoria();
    }

    public function run()
    {
        switch ($_GET['action']) {


            case 'agregar':

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $descuento = new Descuento();

                    $descuento->codigo = $_POST['txt-codigo'];

                    $descuento->categoria = $this->modeloCategoria->obtener($_POST['categoria']);
                    $descuento->idCategoria = $descuento->categoria[0]['idCategoria'];


                    $descuento->fechaVigencia = $_POST['vigencia'];
                    $descuento->montoDescuento = $_POST['txt-descuento'];


                    $this->modeloDescuento->insertar($descuento);
                }

                echo "<script type='text/javascript'> document.location = 'index.php?control=administrador&action=cupones-descuento'; </script>";

                break;

        }
    }

}