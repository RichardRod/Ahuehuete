<?php

session_start();

require_once 'controller/controller.php';

class ControladorCliente extends Controller
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
            case 'perfil':
                $this->mostrarPerfil();
                break;

            case 'carrito':
                $this->mostrarCarrito();
                break;
        }
    }

    private function mostrarPerfil()
    {
        $header = null;
        $content = null;
        $footer = null;

        if (!isset($_SESSION['loggedin'])) {
            $header = file_get_contents('view/header/header.html');
            $content = file_get_contents('view/cliente/perfil.html');
            $footer = file_get_contents('view/footer/footer.html');
        } else {


            if ($_SESSION['tipoUsuario'] == 2) { // Usuario Privilegiado (Empleado)

                $header = file_get_contents('view/header/header-empleado.html');
                $content = file_get_contents('view/cliente/perfil.html');
                $footer = file_get_contents('view/footer/footer.html');

                $map = array(
                    '{nombre}' => $_SESSION['nombre'],
                );

                $header = strtr($header, $map);

            } else if ($_SESSION['tipoUsuario'] == 1) { // Usuario Común (cliente)

                $header = file_get_contents('view/header/header-cliente.html');
                $content = file_get_contents('view/cliente/perfil.html');
                $footer = file_get_contents('view/footer/footer.html');

                $map = array(
                    '{nombre}' => $_SESSION['nombre'],
                    '{totalItems}' => count($_SESSION['Producto'])

                );

                $header = strtr($header, $map);
                $content = strtr($content, $map);
            }


        }





        echo $header . $content . $footer;
    }

    private function mostrarCarrito()
    {
        $header = file_get_contents('view/header/header-cliente.html');
        $content = file_get_contents('view/cart/carrito.html');
        $footer = file_get_contents('view/footer/footer.html');

        if (!empty($_SESSION['Producto'])) { // Validar que existan productos

            $startRow = strrpos($content, '<tr id="elemento-producto">');
            $endRow = strrpos($content, '</tr>');

            $item = substr($content, $startRow, $endRow - $startRow);

            //var_dump($_SESSION['Producto']);

            $productoEncontrado = 0;

            $cantidad = 1;
            $contador = 0;
            $total = 0;

            $ultimoElemento = end($_SESSION['Producto']);


            foreach ($_SESSION['Producto'] as $row) {


                $producto = null;

                $newRow = $item;


                if ($contador == 0) { // si es el primer articulo viene el objeto plano
                    $producto = $this->modeloProducto->obtener($row);

                } else { // Si ya hay mas de 1 articulo es un arreglo que hay que sacar el primer elemento agregado
                    $producto = $this->modeloProducto->obtener($row['id']);

                }

                $dictionary = array(
                    '{nombreProducto}' => $producto[0]['Name'],
                    '{idProducto}' => $producto[0]['ProductId'],
                    '{precio}' => $producto[0]['Price'],
                    '{cantidad}' => $cantidad
                );

                $total = $total + $producto[0]['Price'];




                $newRow = strtr($newRow, $dictionary);
                $rows .= $newRow;
                $contador++;
                $cantidad = 1;
            }


            $content = str_replace($item, $rows, $content);

            $map = array(
                   '{nombre}' => $_SESSION['nombre'],
                   '{totalItems}' => count($_SESSION['Producto']),
                   '{total}' => $total,
                   '{articulos}' => count($_SESSION['Producto']),
               );

               $header = strtr($header, $map);
               $content = strtr($content, $map);

        } else {
            echo 'No tiene nada';
        }

        echo $header . $content . $footer;
    }

}