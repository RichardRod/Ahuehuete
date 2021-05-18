<?php

class Product
{

    private $connection;

    public $productId;
    public $name;
    public $categoria;
    public $description;
    public $price;
    public $stock;
    public $rutaImagen;

    public function __construct()
    {
        try {
            require_once 'configuration/databaseConnection.php';
            $this->connection = DatabaseConnection::connect();
        } catch (Exception $ex) {

            die($ex->getMessage());
        }
    }

    public function listProducts()
    {
        try
        {
            $statement = $this->connection->query("SELECT * FROM Products");
            //$products[] = null;

            while ($row = $statement->fetch_array())
            {
                $products[] = $row;
            }


            return $products;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function create($nuevoProducto)
    {

        try {

            $statement = $this->connection->query("INSERT INTO Products (Name, Description, Price, Stock, Categoria, RUTA_IMAGEN) VALUES('$nuevoProducto->name', '$nuevoProducto->description', $nuevoProducto->price, $nuevoProducto->stock, '$nuevoProducto->categoria', '$nuevoProducto->rutaImagen')");

        } catch (Exception $ex) {
            die($ex->getMessage());
    }


    }

    public function eliminar($idEliminar)
    {
        try {
            $statement = $this->connection->query("DELETE FROM Products WHERE ProductId=$idEliminar");

        } catch (Exception $ex) {
            die($ex->getMessage());

        }
    }

    public function editar($producto)
    {

        try {
            $statement = $this->connection->query("UPDATE Products SET Name='$producto->name', Description='$producto->description', Price=$producto->price, Stock=$producto->stock, Categoria='$producto->categoria', RUTA_IMAGEN='$producto->rutaImagen' WHERE ProductId=$producto->productId");

        } catch (Exception $ex) {
            die($ex->getMessage());

        }
    }

    public function obtener($idProducto)
    {
        try {
            $statement = $this->connection->query("SELECT * FROM Products WHERE ProductId=$idProducto");

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