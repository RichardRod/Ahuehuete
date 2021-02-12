<?php

class Product
{

    private $connection;

    public $productId;
    public $name;
    public $description;
    public $price;
    public $stock;

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

    public function create()
    {

    }

}