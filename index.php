<?php

error_reporting(0);
session_start();
$control = null;

//var_dump($_GET);
switch ($_GET['control']) {

    case 'administrador':
        require_once 'controller/ControladorAdministrador.php';
        $control = new ControladorAdministrador();
        break;

    case 'empleado':
        require_once 'controller/ControladorEmpleado.php';
        $control = new ControladorEmpleado();
        break;

    case 'cliente':
        require_once 'controller/ControladorCliente.php';
        $control = new ControladorCliente();
        break;

    case 'carrito':
        require_once 'controller/ControladorCarrito.php';
        $control = new ControladorCarrito();
        break;

    case 'products':
        require_once 'controller/productController.php';
        $control = new ProductController();
        break;

    case 'session':
        require_once 'controller/sessionController.php';
        $control = new SessionController();
        break;

    case 'contacto':
        require_once 'controller/ControladorContacto.php';
        $control = new ControladorContacto();
        break;

    case 'nosotros':
        require_once 'controller/ControladorNosotros.php';
        $control = new ControladorNosotros();
        break;

    case 'galeria':
        require_once 'controller/ControladorGaleria.php';
        $control = new ControladorGaleria();
        break;

    case 'generarPdf':
        require_once 'controller/ControladorPdf.php';
        $control = new ControladorPdf();
        break;

    default:

        $header = null;
        $content = null;
        $footer = null;

        if (!isset($_SESSION['loggedin'])) {
            $header = file_get_contents('view/header/header.html');
            $content = file_get_contents('view/home/homepage.html');
            $footer = file_get_contents('view/footer/footer.html');
        } else {

            $header = null;
            $content = null;
            $footer = null;
            if ($_SESSION['tipoUsuario'] == 3) { // Usuario Administrador

                $header = file_get_contents('view/header/header-administrador.html');
                $content = file_get_contents('view/home/homepage-administrador.html');
                $footer = file_get_contents('view/footer/footer.html');

            } else if ($_SESSION['tipoUsuario'] == 2) { // Usuario Privilegiado (Empleado)

                $header = file_get_contents('view/header/header-empleado.html');
                $content = file_get_contents('view/home/homepage-empleado.html');
                $footer = file_get_contents('view/footer/footer.html');

                $map = array(
                    '{nombre}' => $_SESSION['nombre'],
                );

                $header = strtr($header, $map);

            } else if ($_SESSION['tipoUsuario'] == 1) { // Usuario Común (cliente)

                $header = file_get_contents('view/header/header-cliente.html');
                $content = file_get_contents('view/home/homepage-cliente.html');
                $footer = file_get_contents('view/footer/footer.html');

                $map = array(
                    '{nombre}' => $_SESSION['nombre'],
                     '{totalItems}' => count($_SESSION['Producto'])

                );

                $header = strtr($header, $map);
                $content = strtr($content, $map);
            }


            echo $_SESSION['nombre'];
            echo $_SESSION['tipoUsuario'];
        }

        echo $header . $content . $footer;

        break;
}

if ($control !== null) {
    $control->run();
    $control = null;
}
