<?php

session_start();

require_once 'controller/controller.php';

class SessionController extends controller {

    private $model;

    public function __construct() {
        require_once 'model/user.php';
        $this->model = new User();
    }

    public function run() {

        echo 'olanda k ase';

        switch ($_GET['action']) {

            case 'sign':
                $this->sign();

                //header("Location: http://floval.mx/index.php");
                break;

            case 'login':
                $this->login();

                //header("Location: http://floval.mx/index.php");
                break;
        }

    }

    private function sign() {

        echo 'Sandy';

    }

    private function login() {

        echo 'Vianka';

    }
}