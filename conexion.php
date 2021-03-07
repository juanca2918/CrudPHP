<?php
$database = "";
$user = "";
$password = "";

try {
    $con_db = new PDO("mysql:host=localhost;dbname=" . $database, $user, $password);
} catch (PDOException $excepcion) {
    echo "Error" . $excepcion->getMessage();
}
