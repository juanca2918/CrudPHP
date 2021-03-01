<?php

include_once 'conexion.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $delete = $con_db->prepare('DELETE FROM clientes WHERE id=:id');
    $delete->execute(array(':id' => $id));
    header('location: index.php');
} else {
    header('location: index.php');
}