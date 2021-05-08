<?php

session_start();

require_once 'controller/controller.php';

class ProductController extends controller {

    private $model;

    public function __construct() {
        require_once 'model/product.php';
        $this->model = new Product();
    }

    public function run() {

        switch ($_GET['action']) {

            case 'list':

                $header = file_get_contents('view/header/header.html');
                $contentAux = file_get_contents('view/productos/productos-todos.html');
                $content = file_get_contents('view/productos/productos.html');
                $footer = file_get_contents('view/footer/footer.html');
                /*$header = file_get_contents('view/header.html');
                $content = file_get_contents('view/products/all-products.html');
                $footer = file_get_contents('view/footer.html');*/

                $products = $this->model->listProducts();

                //var_dump($products);

                if (!empty($products)) {


                    //echo count($products);

                    $startRow = strrpos($content, '<div>');
                    $endRow = strrpos($content, '</div>') ;

                    $item = substr($content, $startRow, $endRow - $startRow);

                    foreach ($products as $row) {

                        $newRow = $item;

                        $dictionary = array(
                            '{productId}' => $row['ProductId'],
                            '{productName}' => $row['Name'],
                            '{productPrice}' => $row['Price'],
                            '{productDescription}' => $row['Description']
                        );

                        $newRow = strtr($newRow, $dictionary);
                        $rows .= $newRow;

                    }

                    $content = str_replace($item, $rows, $content);

                }




                echo $header . $contentAux;

                //header("Location: http://floval.mx/index.php");
                break;

            case 'vianka':
                echo 'Vamos!';
                break;

        }

    }



}