<?php
include("Conexion/connection.php");

$sql = "SELECT * FROM persona";
$query = mysqli_query($mysqli, $sql);

$sql2 = "SELECT * FROM empresa";
$query2 = mysqli_query($mysqli, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "css/home.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>
    <div class="users-form">
        <h1>Crear persona</h1>
        <!-- Este será nuestro formulario principal del usuario donde servirá para insertar nuevas personas-->
        <form action="CRUDPersona/insert_user.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellidos" placeholder="Apellidos">
            <input type="text" name="direccion" placeholder="Direccion">
            <input type="number" name="telefono" placeholder="Telefono">
            <input type="submit" value="Agregar">
        </form>
        
    </div>
    <!-- Este formulario será para la subida de una imagen-->
    <form action="archivo.php" method="POST" enctype="multipart/form-data">
        <input name="archivo" id="archivo" type="file">
        <input type="submit" name="subir" value="Subir imagen">
    </form>
    <br><br>
    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <!--En la siguiente tabla se mostrarán los datos de las personas que se han insertado en nuestra agenda-->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--Obtiene una fila de resultados como un array asociativo, numérico, o ambos-->
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['apellidos'] ?></th>
                        <th><?= $row['direccion'] ?></th>
                        <th><?= $row['telefono'] ?></th>
                        <!-- En las dos últimas columnas introduciremos unos links en forma de botón los cuales servirán para Edita o Eliminar una persona.-->
                        <th><a href="CRUDPersona/update_persona.php?nombre=<?= $row['nombre'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="CRUDPersona/delete_persona.php?nombre=<?= $row['nombre'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="users-form">
        <h1>Crear Empresa</h1>
        <!-- Este será nuestro segundo formulario principal del usuario donde servirá para insertar nuevas empresas-->
        <form action="CRUDEmpresa/insert_empresa.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="direccion" placeholder="Direccion">
            <input type="number" name="telefono" placeholder="Telefono">
            <input type="text" name="email" placeholder="email">
            <input type="submit" value="Agregar">
        </form>
    </div>
     <!-- Este formulario será para la subida de una imagen-->
    <form action="archivo.php" method="POST" enctype="multipart/form-data">
        <input name="archivo" id="archivo" type="file">
        <input type="submit" name="subir" value="Subir imagen">
    </form>
    <br><br>
    <div class="users-table">
        <h2>Usuarios registrados</h2>
         <!--En la siguiente tabla se mostrarán los datos de las empresas que se han insertado en nuestra agenda-->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query2)): ?>
                    <tr>
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['direccion'] ?></th>
                        <th><?= $row['telefono'] ?></th>
                        <th><?= $row['email'] ?></th>
                        <!-- En las dos últimas columnas introduciremos unos links en forma de botón los cuales servirán para Edita o Eliminar una persona.-->
                        <th><a href="CRUDEmpresa/update_empresa.php?nombre=<?= $row['nombre'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="CRUDEmpresa/delete_empresa.php?nombre=<?= $row['nombre'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>