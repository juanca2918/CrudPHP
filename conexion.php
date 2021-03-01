<?php
$database = "crud";
$user = "root";
$password = "";

try {
    $con_db = new PDO("mysql:host=localhost;dbname=" . $database, $user, $password);
} catch (PDOException $excepcion) {
    echo "Error" . $excepcion->getMessage();
}
