<?php

session_start();

require_once 'controller/controller.php';

class ControladorGaleria extends Controller
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

        $header = file_get_contents('view/header/header.html');
        $content = file_get_contents('view/galeria/galeria.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content . $footer;
    }

}

