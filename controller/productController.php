<?php

session_start();

require_once 'controller/controller.php';

class ProductController extends controller
{

    private $model;

    public function __construct()
    {
        require_once 'model/product.php';
        $this->model = new Product();
    }

    public function run()
    {

        switch ($_GET['action']) {

            case 'insertar':
                $directorio_imagenes = "imagenes_subidas/";
                $ruta_imagen = $directorio_imagenes . basename($_FILES["subir-archivo"]["name"]);
                $exito = 1;

                $tipoImagen = strtolower(pathinfo($ruta_imagen, PATHINFO_EXTENSION));

                // Validar imagen
                if (isset($_POST["submit"])) {
                    $validar = getimagesize($_FILES["subir-archivo"]["tmp_name"]);
                    if ($validar !== false) {
                        echo "Imagen - " . $validar["mime"] . ".";
                        $exito = 1;
                    } else {
                        echo "El Archivo no es una imagen.";
                        $exito = 0;
                    }
                }

                // Validar si ya existe la imagen
                if (file_exists($ruta_imagen)) {
                    //echo "El Archivo ya existe.";
                    $exito = 0;
                }

                // Validar tamaño
                if ($_FILES["subir-archivo"]["size"] > 500000) {
                    echo "Imagen es demasiado grande.";
                    $exito = 0;
                }

                // Validar formato
                if($tipoImagen != "jpg" && $tipoImagen != "png" && $tipoImagen != "jpeg"
                    && $tipoImagen != "gif" ) {
                    echo "Formatos Permitidos: JPG, JPEG, PNG & GIF files.";
                    $exito = 0;
                }

                // Validar si hubo error al subir archivo
                if ($exito == 0) {
                    echo "Hubo un error al subir imagen A.";
                } else {
                    if (move_uploaded_file($_FILES["subir-archivo"]["tmp_name"], $ruta_imagen)) {
                        //echo "La imagen ". htmlspecialchars( basename( $_FILES["subir-archivo"]["name"])). " se ha subido con exito.";
                    } else {
                        echo "Hubo un error al subir imagen B." . $_FILES["subir-archivo"]["tmp_name"];
                    }
                }



                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nuevoProducto = new Product();

                    $nuevoProducto->name = $_POST['txt-nombre'];
                    $nuevoProducto->categoria = $_POST['txt-categoria'];
                    $nuevoProducto->description = $_POST['txt-descripcion'];
                    $nuevoProducto->price = $_POST['txt-costo'];
                    $nuevoProducto->stock = $_POST['txt-stock'];
                    $nuevoProducto->rutaImagen = $ruta_imagen;

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
                $directorio_imagenes = "imagenes_subidas/";
                $ruta_imagen = $directorio_imagenes . basename($_FILES["subir-archivo"]["name"]);
                $exito = 1;

                $tipoImagen = strtolower(pathinfo($ruta_imagen, PATHINFO_EXTENSION));

                // Validar imagen
                if (isset($_POST["submit"])) {
                    $validar = getimagesize($_FILES["subir-archivo"]["tmp_name"]);
                    if ($validar !== false) {
                        echo "Imagen - " . $validar["mime"] . ".";
                        $exito = 1;
                    } else {
                        echo "El Archivo no es una imagen.";
                        $exito = 0;
                    }
                }

                // Validar si ya existe la imagen
                if (file_exists($ruta_imagen)) {
                    echo "El Archivo ya existe.";
                    $exito = 0;
                }

                // Validar tamaño
                if ($_FILES["subir-archivo"]["size"] > 500000) {
                    echo "Imagen es demasiado grande.";
                    $exito = 0;
                }

                // Validar formato
                if($tipoImagen != "jpg" && $tipoImagen != "png" && $tipoImagen != "jpeg"
                    && $tipoImagen != "gif" ) {
                    echo "Formatos Permitidos: JPG, JPEG, PNG & GIF files.";
                    $exito = 0;
                }

                // Validar si hubo error al subir archivo
                if ($exito == 0) {
                    echo "Hubo un error al subir imagen A.";
                } else {
                    if (move_uploaded_file($_FILES["subir-archivo"]["tmp_name"], $ruta_imagen)) {
                        echo "La imagen ". htmlspecialchars( basename( $_FILES["subir-archivo"]["name"])). " se ha subido con exito.";
                    } else {
                        echo "Hubo un error al subir imagen B." . $_FILES["subir-archivo"]["tmp_name"];
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nuevoProducto = new Product();

                    $nuevoProducto->productId = $_POST['txt-id'];
                    $nuevoProducto->name = $_POST['txt-nombre'];
                    $nuevoProducto->categoria = $_POST['txt-categoria'];
                    $nuevoProducto->description = $_POST['txt-descripcion'];
                    $nuevoProducto->price = $_POST['txt-costo'];
                    $nuevoProducto->stock = $_POST['txt-stock'];
                    $nuevoProducto->rutaImagen = $ruta_imagen;


                    $this->model->editar($nuevoProducto);
                }

                //header("Location: index.php?control=administrador&action=menu-catalogo");
                echo "<script type='text/javascript'> document.location = 'index.php?control=administrador&action=menu-catalogo'; </script>";
                break;


            case 'list':

                $header = null;
                $content = null;
                $footer = null;

                if (!isset($_SESSION['loggedin'])) {
                    $header = file_get_contents('view/header/header.html');
                    $content = file_get_contents('view/productos/productos.html');
                    $footer = file_get_contents('view/footer/footer.html');
                } else {

                    $header = null;
                    $content = null;
                    $footer = null;

                    if ($_SESSION['tipoUsuario'] == 2) { // Usuario Privilegiado (Empleado)

                        $header = file_get_contents('view/header/header-empleado.html');
                        $content = file_get_contents('view/productos/productos.html');
                        $footer = file_get_contents('view/footer/footer.html');

                        $map = array(
                            '{nombre}' => $_SESSION['nombre'],
                        );

                        $header = strtr($header, $map);

                    } else if ($_SESSION['tipoUsuario'] == 1) { // Usuario Común (cliente)

                        $header = file_get_contents('view/header/header-cliente.html');
                        $content = file_get_contents('view/productos/productos.html');
                        $footer = file_get_contents('view/footer/footer.html');

                        $map = array(
                            '{nombre}' => $_SESSION['nombre'],
                            '{totalItems}' => count($_SESSION['Producto'])

                        );

                        $header = strtr($header, $map);
                        $content = strtr($content, $map);
                    }


                }


                $products = $this->model->listProducts();

                require_once 'model/Categoria.php';
                $modeloCategoria = new Categoria();

                $categorias = $modeloCategoria->listar();

                if (!empty($categorias)) {

                    $startRow = strrpos($content, '<button id="categoria-filtro"');
                    $endRow = strrpos($content, '</button>');

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
                    $endRow = strrpos($content, '</div>');

                    $item = substr($content, $startRow, $endRow - $startRow);

                    foreach ($products as $row) {

                        $newRow = $item;

                        $dictionary = array(
                            '{productId}' => $row['ProductId'],
                            '{idProducto}' => $row['ProductId'],
                            '{productName}' => $row['Name'],
                            '{productPrice}' => $row['Price'],
                            '{productDescription}' => $row['Description'],
                            '{imagenProducto}' => $row['RUTA_IMAGEN'],
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
                    '{descripcionProducto}' => $producto[0]['Description'],
                    '{imagenProducto}' => $producto[0]['RUTA_IMAGEN'],
                );

                $content = strtr($content, $diccionario);

                echo $header . $content . $footer;
                break;

        }

    }


}