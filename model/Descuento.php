<?php


class Descuento
{
    private $connection;

    public $idDescuento;
    public $codigo;
    public $idCategoria;
    public $fechaVigencia;
    public $montoDescuento;

    public function __construct()
    {
        try {
            require_once 'configuration/databaseConnection.php';
            $this->connection = DatabaseConnection::connect();
        } catch (Exception $ex) {

            die($ex->getMessage());
        }
    }

    public function insertar($descuento)
    {


        $query = "INSERT INTO Descuentos (codigo, idCategoria, FechaVigencia, MontoDescuento)" .
            "VALUES('$descuento->codigo', $descuento->idCategoria, '$descuento->fechaVigencia', $descuento->montoDescuento)";

        try {
            $statement = $this->connection->query($query);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }


    }

    public function listar()
    {
        try
        {
            $statement = $this->connection->query("SELECT * FROM Descuentos");
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

}