<?php

session_start();

require_once 'controller/controller.php';

class ProductController extends controller {

    private $model;

    public function __construct() {
        require_once 'model/product.php';
        $this->model = new Product();
    }

    public function run() {

        switch ($_GET['action']) {

            case 'insertar':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nuevoProducto = new Product();

                    $nuevoProducto->name = $_POST['txt-nombre'];
                    $nuevoProducto->categoria = $_POST['txt-categoria'];
                    $nuevoProducto->description = $_POST['txt-descripcion'];
                    $nuevoProducto->price = $_POST['txt-costo'];
                    $nuevoProducto->stock = $_POST['txt-stock'];


                    $this->model->create($nuevoProducto);
                }

                //header("Location: index.php?control=administrador&action=menu-catalogo");

                echo "<script type='text/javascript'> document.location = 'index.php?control=administrador&action=menu-catalogo'; </script>";

                break;

            case 'eliminar':
                $idEliminar = $_GET['producto'];

                $this->model->eliminar($idEliminar);
                //header("Location: index.php?control=administrador&action=menu-catalogo");
                echo "<script type='text/javascript'> document.location = 'index.php?control=administrador&action=menu-catalogo'; </script>";



                break;

            case 'editar':

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nuevoProducto = new Product();

                    $nuevoProducto->productId = $_POST['txt-id'];
                    $nuevoProducto->name = $_POST['txt-nombre'];
                    $nuevoProducto->categoria = $_POST['txt-categoria'];
                    $nuevoProducto->description = $_POST['txt-descripcion'];
                    $nuevoProducto->price = $_POST['txt-costo'];
                    $nuevoProducto->stock = $_POST['txt-stock'];


                    $this->model->editar($nuevoProducto);
                }

                //header("Location: index.php?control=administrador&action=menu-catalogo");
                echo "<script type='text/javascript'> document.location = 'index.php?control=administrador&action=menu-catalogo'; </script>";
                break;


            case 'list':

                $header = file_get_contents('view/header/header.html');
                $contentAux = file_get_contents('view/productos/productos-todos.html');
                $content = file_get_contents('view/productos/productos.html');
                $footer = file_get_contents('view/footer/footer.html');
                /*$header = file_get_contents('view/header.html');
                $content = file_get_contents('view/products/all-products.html');
                $footer = file_get_contents('view/footer.html');*/

                $products = $this->model->listProducts();

                //var_dump($products);

                if (!empty($products)) {


                    //echo count($products);

                    $startRow = strrpos($content, '<div id="product-grid">');
                    $endRow = strrpos($content, '</div>') ;

                    $item = substr($content, $startRow, $endRow - $startRow);

                    foreach ($products as $row) {

                        $newRow = $item;

                        $dictionary = array(
                            '{productId}' => $row['ProductId'],
                            '{productName}' => $row['Name'],
                            '{productPrice}' => $row['Price'],
                            '{productDescription}' => $row['Description']
                        );

                        $newRow = strtr($newRow, $dictionary);
                        $rows .= $newRow;

                    }

                    $content = str_replace($item, $rows, $content);

                }




                echo $header . $content;

                //header("Location: http://floval.mx/index.php");
                break;

            case 'vianka':
                echo 'Vamos!';
                break;

        }

    }



}