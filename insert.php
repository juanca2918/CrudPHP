<?php
include_once 'conexion.php';
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $correo = $_POST['correo'];

    if (!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($ciudad) && !empty($correo)) {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo "<script> alert('Correo no valido') </script>";
        } else {
            $consulta_insertar = $con_db->prepare('INSERT INTO clientes(nombre, apellidos, telefono, ciudad, correo) VALUES(:nombre, :apellidos, :telefono, :ciudad, :correo)');
            $consulta_insertar->execute(array(
                ':nombre' => $nombre,
                ':apellidos' => $apellidos,
                ':telefono' => $telefono,
                ':ciudad' => $ciudad,
                ':correo' => $correo
            ));
            header('location:index.php');
        }
    } else {
        echo "<script> alert('Los campos estan vacios'); </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Nuevo Cliente</title>
</head>

<body>
    <div class="contenedor container">
        <h2>Crud con PHP y MYSQL</h2>
        <form action="" method="post">
            <div class="formar-grupo input-group col-sm-3 col-md-3 col-lg-3">
                <input type="text" name="nombre" placeholder="Nombre" class="textinput form-control">
                <input type="text" name="apellidos" placeholder="Apellidos" class="textinput form-control">
            </div>
            <div class="formar-grupo input-group col-sm-3 col-md-3 col-lg-3">
                <input type="text" name="telefono" placeholder="Telefono" class="textinput form-control">
                <input type="text" name="ciudad" placeholder="Ciudad" class="textinput form-control">
            </div>
            <div class="formar-grupo input-group col-sm-3 col-md-3 col-lg-3">
                <input type="text" name="correo" placeholder="Correo" class="textinput form-control">
            </div>
            <div class="btngrupo input-group col-sm-3 col-md-3 col-lg-3">
                <a href="index.php" class="btn btn-warning btnpeligro">Cancelar</a>
                <input type="submit" value="Guardar" name="guardar" class="btn btn-success btnprimario form-control">
            </div>
        </form>
    </div>
</body>

</html>