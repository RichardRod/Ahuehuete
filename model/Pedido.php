<?php


class Pedido
{
    private $connection;

    public $fecha;
    public $idCliente;
    public $cantidad;
    public $idDescuento;
    public $total;
    public $estado = 'Revisando Pedido';

    public function __construct()
    {
        try {
            require_once 'configuration/databaseConnection.php';
            $this->connection = DatabaseConnection::connect();
        } catch (Exception $ex) {

            die($ex->getMessage());
        }
    }

    public function insertar($pedido)
    {
        echo 'Insertar';

        $query = "INSERT INTO Pedido (Fecha, idCliente, Cantidad, idDescuento, Total, Estado) VALUES('$pedido->fecha', '$pedido->idCliente', '$pedido->cantidad', '$pedido->idDescuento', '$pedido->total', '$pedido->  idCliente->estado')";
        var_dump($query);
        try {

            //$statement = $this->connection->query("INSERT INTO Products (Name, Description, Price, Stock, Categoria, RUTA_IMAGEN) VALUES('$nuevoProducto->name', '$nuevoProducto->description', $nuevoProducto->price, $nuevoProducto->stock, '$nuevoProducto->categoria', '$nuevoProducto->rutaImagen')");

        } catch (Exception $ex) {
            die($ex->getMessage());
        }


    }

}