<?php

//error_reporting(0);
session_start();
$control = null;

var_dump($_GET);
switch ($_GET['control']) {

    case 'products':
        require_once 'controller/productController.php';
        $control = new ProductController();
        break;


    case 'session':

        require_once 'controller/sessionController.php';
        $control = new SessionController();

        break;

    default:

        $header = null;
        $content = null;
        $footer = null;


        if (!isset($_SESSION['user'])) {
            echo 'No seteada AA';

            $header = file_get_contents('view/header.html');
            $content = file_get_contents('view/index/content.html');
            $footer = file_get_contents('view/footer.html');
        } else {
            echo 'Si seteada';
        }

        echo $header . $content . $footer;

        break;
}

if ($control !== null) {
    $control->run();
    $control = null;
}
