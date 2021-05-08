<?php

session_start();

class User {

    private $connection;

    public $nombre;
    public $correo;
    public $telefono;
    public $password;

    public function __construct()
    {
        try {
            require_once 'configuration/databaseConnection.php';
            $this->connection = DatabaseConnection::connect();
        } catch (Exception $ex) {

            die($ex->getMessage());
        }
    }

    public function create(User $user)
    {
        $password = password_hash($user->password, PASSWORD_DEFAULT);

        $sqlQuery = "INSERT INTO 
                    Ahuehuete.Usuario(NOMBRE, CORREO, TELEFONO, PASSWORD, FECHA_REGISTRO, TIPO_USUARIO) 
                    VALUES('$user->nombre', '$user->correo', '$user->telefono', '$password', CURRENT_TIMESTAMP, 1)";


        try
        {
            $this->connection->query($sqlQuery);
        } catch (Exception $ex)
        {
            echo $ex;
        }
    }

    public function getUser(User $user)
    {
        echo '------';
        var_dump($user->correo);
        echo '------';
        $sql = "SELECT * FROM Ahuehuete.Usuario WHERE CORREO = '$user->correo'";

        var_dump($sql);

        try
        {
            $statement = $this->connection->query($sql);
            $row = $statement->fetch_row();

            return $row;
        } catch (Exception $ex)
        {
            echo $ex;
        }
    }

    public function read()
    {

    }


}