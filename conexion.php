<?php
$servername = "localhost";
$username = "mainuser";
$password = "verde";
$db = "ahuehuete";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ahuehuete", $username, $password);
  // PDO error exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>