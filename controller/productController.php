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
                $content = file_get_contents('view/productos/productos.html');
                $footer = file_get_contents('view/footer/footer.html');


                $products = $this->model->listProducts();

                require_once 'model/Categoria.php';
                $modeloCategoria = new Categoria();

                $categorias = $modeloCategoria->listar();

                if(!empty($categorias)) {

                    $startRow = strrpos($content, '<button id="categoria-filtro"');
                    $endRow = strrpos($content, '</button>') ;

                    $item = substr($content, $startRow, $endRow - $startRow);

                    foreach ($categorias as $row) {

                        $newRow = $item;

                        $dictionary = array(
                            '{filtro}' => $row['Categoria'],

                        );

                        $newRow = strtr($newRow, $dictionary);
                        $rows .= $newRow;

                    }

                    $content = str_replace($item, $rows, $content);
                    $rows = null;
                }



                if (!empty($products)) {

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

            case 'single':

                $header = file_get_contents('view/header/header.html');
                $content = file_get_contents('view/productos/single-producto.html');
                $footer = file_get_contents('view/footer/footer.html');

                $producto = $this->model->obtener($_GET['producto']);

                $diccionario = array(
                    '{idProducto}' => $producto[0]['ProductId'],
                    '{nombreProducto}' => $producto[0]['Name'],
                    '{precioProducto}' => $producto[0]['Price'],
                    '{descripcionProducto}' => $producto[0]['Description']
                );

                $content = strtr($content, $diccionario);

                echo $header . $content . $footer;
                break;

        }

    }



}