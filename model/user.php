<?php

session_start();

class User {

    private $connection;

    public $userId;
    public $username;
    public $name;
    public $email;
    public $phone;
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

        $sql = "INSERT INTO Ahuehuete.Users
        (Username, Name, Email, Phone, Password, created_at)
        VALUES('$user->username', '$user->name', '$user->email', '$user->phone', '$password', CURRENT_TIMESTAMP)
        ";

        try
        {
            $this->connection->query($sql);
        } catch (Exception $ex)
        {
            echo $ex;
        }
    }

    public function getUser(User $user)
    {
        $sql = "SELECT * FROM Ahuehuete.Users WHERE Username = '$user->username'";

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