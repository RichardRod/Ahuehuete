<?php


class Categoria
{

    private $connection;

    public $categoria;

    public function __construct()
    {
        try {
            require_once 'configuration/databaseConnection.php';
            $this->connection = DatabaseConnection::connect();
        } catch (Exception $ex) {

            die($ex->getMessage());
        }
    }

    public function listar()
    {
        try
        {
            $statement = $this->connection->query("SELECT * FROM Categoria");
            //$products[] = null;

            while ($row = $statement->fetch_array())
            {
                $result[] = $row;
            }

            return $result;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function obtener($categoria)
    {

        try {
            $statement = $this->connection->query("SELECT * FROM Categoria WHERE Categoria='$categoria'");

            while ($row = $statement->fetch_array())
            {
                $producto[] = $row;
            }

            return $producto;
        } catch (Exception $ex) {
            die($ex->getMessage());

        }
    }

    public function obtenerCategoriaString($categoria)
    {

        try {
            $statement = $this->connection->query("SELECT * FROM Categoria WHERE idCategoria='$categoria'");

            while ($row = $statement->fetch_array())
            {
                $producto[] = $row;
            }

            return $producto;
        } catch (Exception $ex) {
            die($ex->getMessage());

        }
    }



}