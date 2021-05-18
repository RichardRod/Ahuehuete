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

            case 'menu-catalogo-editar':
                $this->menuEditarCatalogo();
                break;

            case 'menu-catalogo':
                $this->menuCatalogo();
                break;

            case 'menu-ventas':
                $this->menuVentas();
                break;

            case 'cupones-descuento':
                $this->menuCuponesDescuento();
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

        require_once 'model/product.php';
        $producto = new Product();

        $productos = $producto->listProducts();

        //var_dump($productos);

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/catalogo/catalogo.html');
        $footer = file_get_contents('view/footer/footer.html');

        if (!empty($productos)) { // Validar que existan productos

            $startRow = strrpos($content, '<tr id="elemento-producto">');
            $endRow = strrpos($content, '</tr>') ;

            $item = substr($content, $startRow, $endRow - $startRow);

            foreach ($productos as $row) {

                $newRow = $item;

                $dictionary = array(
                    '{id}' => $row['ProductId'],
                    '{nombre}' => $row['Name'],
                    '{categoria}' => $row['Categoria'],
                    '{descripcion}' => $row['Description'],
                    '{costo}' => $row['Price'],
                    '{stock}' => $row['Stock'],

                );

                $newRow = strtr($newRow, $dictionary);
                $rows .= $newRow;

            }

            $content = str_replace($item, $rows, $content);

        }



        echo $header . $content;
    }

    private function menuEditarCatalogo()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/catalogo/formulario-editar.html');
        $footer = file_get_contents('view/footer/footer.html');

        require_once 'model/product.php';
        $producto = new Product();

        $productoEditar = $producto->obtener($_GET['producto']);

            /*echo '---------';
            var_dump($productoEditar);
            echo '---------';*/

        $map = array(
            '{id}' => $_GET['producto'],
            '{nombre}' => $productoEditar[0]['Name'],
            '{categoria}' => $productoEditar[0]['Categoria'],
            '{descripcion}' => $productoEditar[0]['Description'],
            '{costo}' => $productoEditar[0]['Price'],
            '{stock}' => $productoEditar[0]['Stock'],
            '{imagenProducto}' => $productoEditar[0]['RUTA_IMAGEN'],
        );

        $content = strtr($content, $map);

        echo $header . $content;
    }

    private function menuVentas()
    {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/ventas/ventas.html');
        $footer = file_get_contents('view/footer/footer.html');

        echo $header . $content;
    }

    private function menuCuponesDescuento() {

        $header = file_get_contents('view/header/header-administrador.html');
        $content = file_get_contents('view/administrador/cupones-descuento/cupones.html');
        $footer = file_get_contents('view/footer/footer.html');

        require_once 'model/Descuento.php';
        $cuponDescuento = new Descuento();

        require_once 'model/Categoria.php';
        $categoria = new Categoria();

        $cuponesDescuento = $cuponDescuento->listar();
        $categorias = $categoria->listar();

        if(!empty($categorias)) {
            $startRow = strrpos($content, '<option id="elemento" value="{elem}">');
            $endRow = strrpos($content, '</option>') ;

            $item = substr($content, $startRow, $endRow - $startRow);

            foreach ($categorias as $row)
            {
                $newRow = $item;

                $dictionary = array(

                    '{elem}' => $row['Categoria'],

                );

                $newRow = strtr($newRow, $dictionary);
                $rows .= $newRow;
            }

            $content = str_replace($item, $rows, $content);
            $rows = null; // Inicializar el acumulador
        }

        if(!empty($cuponesDescuento)) {

            $startRow = strrpos($content, '<tr id="elemento-descuento">');
            $endRow = strrpos($content, '</tr>') ;

            $item = substr($content, $startRow, $endRow - $startRow);

            foreach ($cuponesDescuento as $row) {

                $newRow = $item;

                $auxCategoria = $categoria->obtenerCategoriaString($row['idCategoria']);


                $dictionary = array(

                    '{codigo}' => $row['codigo'],
                    '{categoria}' => $auxCategoria[0]['Categoria'],
                    '{fechaVigencia}' => $row['FechaVigencia'],
                    '{descuento}' => $row['MontoDescuento'],

                );

                $newRow = strtr($newRow, $dictionary);
                $rows .= $newRow;

            }

            $content = str_replace($item, $rows, $content);
        }

        echo $header . $content;
    }

}