<?php

session_start();

require_once 'controller/controller.php';

class ControladorNosotros extends Controller
{

    public function run()
    {
        switch ($_GET['action']) {
            case 'mostrar':
                $this->mostrar();
                break;
        }
    }

    private function mostrar()
    {

        $header = null;
        $content = null;
        $footer = null;

        if (!isset($_SESSION['loggedin'])) {
            $header = file_get_contents('view/header/header.html');
            $content = file_get_contents('view/nosotros/nosotros.html');
            $footer = file_get_contents('view/footer/footer.html');
        } else {


            if ($_SESSION['tipoUsuario'] == 2) { // Usuario Privilegiado (Empleado)

                $header = file_get_contents('view/header/header-empleado.html');
                $content = file_get_contents('view/nosotros/nosotros.html');
                $footer = file_get_contents('view/footer/footer.html');

                $map = array(
                    '{nombre}' => $_SESSION['nombre'],
                );

                $header = strtr($header, $map);

            } else if ($_SESSION['tipoUsuario'] == 1) { // Usuario Común (cliente)

                $header = file_get_contents('view/header/header-cliente.html');
                $content = file_get_contents('view/nosotros/nosotros.html');
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

}