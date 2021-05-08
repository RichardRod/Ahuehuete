<?php

session_start();

require_once 'controller/controller.php';

class ControladorContacto extends Controller
{

    public function run()
    {
        switch ($_GET['action']) {
            case 'formulario':
                $this->mostrarFormaContacto();
                break;
        }
    }

    private function mostrarFormaContacto()
    {

        $header = file_get_contents('view/header/header.html');
        $content = file_get_contents('view/contacto/formulario-contacto.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content . $footer;
    }

}