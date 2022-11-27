<?php 
    
    //incluimos la dirección de nuestra coenxion a la base de datos
    include("../Conexion/connection.php");
    //Recogemos con el GET el nombre que se nos ha enviado desde el href de nuestra etiqueta <a> de contenido eliminar.
    $nombre=$_GET['nombre'];
    //Declaramos una variable la cual contendrá una sentencia que buscará una persona con el nombre que hemos guardado antes.
    $sql="SELECT * FROM empresa WHERE nombre='$nombre'";
    //Realizamos la consulta en nuestra base de datos.
    $query=mysqli_query($mysqli, $sql);
    //Obtiene una fila de resultados como un array asociativo, numérico, o ambos
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/home.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_empresa.php" method="POST">
                <!-- Creamos un formulario para que el usuario inserte los nuevos valores que le quiera dar a la empresa -->
                <input type="hidden" name="nombre" placeholder="Nombre" value="<?= $row['nombre']?>">
                <input type="text" name="direccion" placeholder="Username" value="<?= $row['direccion']?>">
                <input type="text" name="telefono" placeholder="Password" value="<?= $row['telefono']?>">
                <input type="text" name="email" placeholder="Email" value="<?= $row['email']?>">
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>