<?php

session_start();

require_once 'controller/controller.php';

class ControladorCliente extends Controller
{

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
        $header = file_get_contents('view/header/header-cliente.html');
        $content = file_get_contents('view/cliente/perfil.html');
        $footer = file_get_contents('view/footer/footer.html');



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

            var_dump($_SESSION['Producto']);

            $contador = 0;
            foreach ($_SESSION['Producto'] as $row) {

                var_dump($row);
                echo 'Puipui: ' . ($contador);

                $newRow = $item;


                if ($contador == 0) {
                    $dictionary = array(
                        '{nombreProducto}' => $row,
                    );
                } else {
                    $dictionary = array(
                        '{nombreProducto}' => $row['nombre'],

                    );
                }


                $newRow = strtr($newRow, $dictionary);
                $rows .= $newRow;
                $contador++;
            }


            $content = str_replace($item, $rows, $content);

            $map = array(
                   '{nombre}' => $_SESSION['nombre'],
                   '{totalItems}' => count($_SESSION['Producto'])
               );

               $header = strtr($header, $map);
               $content = strtr($content, $map);

        } else {
            echo 'No tiene nada';
        }

        echo $header . $content . $footer;
    }

}