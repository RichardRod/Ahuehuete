<?php

class User {

    private $connection;

    public $userId;
    public $username;
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


        echo $user->username;

    }
}