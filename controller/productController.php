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
                $p = $this->model->listProducts();

                var_dump($p);

                //header("Location: http://floval.mx/index.php");
                break;

        }

    }



}