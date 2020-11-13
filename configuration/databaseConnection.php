<?php

class DatabaseConnection
{

    public static function connect()
    {
        require_once('env.php');

        $connection = new mysqli(host, user, password, database);

        if ($connection->connect_error) {
            die($connection->connect_error);
        }

        return $connection;
    }
}