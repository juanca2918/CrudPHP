<?php

include_once './conexion.php';



if (isset($_POST['btnbuscar'])) {
    $buscartext = $_POST['buscartext'];
    $selectbuscar = $con_db->prepare('SELECT * FROM clientes WHERE nombre LIKE :campo OR apellidos LIKE :campo');

    try {
        $selectbuscar->execute(array(
            ':campo' => '%' . $buscartext . '%'
        ));
        $resultado = $selectbuscar->fetchAll();
    } catch (Exception $ex) {
        echo 'Excepcion Capturada: ', $ex->getMessage(), "\n";
    }
}else{
    $select_pride = $con_db->prepare('SELECT * FROM clientes ORDER BY id DESC');
    $select_pride->execute();
    $resultado = $select_pride->fetchAll();
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>CRUD PHP</title>
</head>

<body>
    <div class="contenedor container">
        <h1>CRUD CON PHP Y MYSQL</h1>
        <div class="barra-buscador">
            <form action="" method="post">
                <input type="text" placeholder="Buscar nombre y apellido" name="buscartext"
                    value="<?php if (isset($buscartext)) echo $buscartext ?>" class="textbuscar">
                <input type="submit" name="btnbuscar" class="btnbuscar btn btn-primary" value="Buscar">
                <a href="insert.php" class="btn btn-success btnnuevo">Nuevo</a>
            </form>
        </div>
        <table class="table table-dark">
            <tr class="cabeza">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Correo</th>
                <th colspan="2">Accion</th>
            </tr>
            <?php foreach ($resultado as $fila) : ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellidos']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['ciudad']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><a class="btnupdate btn btn-primary" href="update.php?id=<?php echo $fila['id']; ?>" >Editar</a></td>
                <td><a class="btndelete btn btn-primary" href="delete.php?id=<?php echo $fila['id']; ?>" >Eliminar</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>