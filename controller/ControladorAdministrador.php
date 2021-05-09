<?php

session_start();

require_once 'controller/controller.php';


class ControladorAdministrador extends Controller
{

    public function run()
    {
        switch ($_GET['action']) {
            case 'menu-usuario':
                $this->menuUsuario();
                break;

            case 'menu-proveedores':
                $this->menuProveedor();
                break;

            case 'menu-clientes':
                $this->menuClientes();
                break;

            case 'menu-pedidos':
                $this->menuPedidos();
                break;

            case 'menu-inventario':
                $this->menuInventario();
                break;

            case 'menu-catalogo':
                $this->menuCatalogo();
                break;

            case 'menu-ventas':
                $this->menuVentas();
                break;



        }
    }

    private function menuUsuario()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/usuarios/usuarios.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuProveedor()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/proveedores/proveedores.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuClientes()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/clientes/clientes.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuPedidos()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/pedidos/pedidos.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuInventario()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/inventario/inventario.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuCatalogo()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/catalogo/catalogo.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuVentas()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/ventas/ventas.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

}