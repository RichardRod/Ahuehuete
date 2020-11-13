<?php

abstract class controller
{

    public static function isLogged()
    {

        if (isset($_SESSION['userName'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin()
    {

        if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 'administrador') {
            return true;
        } else {
            return false;
        }

    }

    public static function isClient()
    {

        if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
            return true;
        } else {
            return false;
        }

    }

}