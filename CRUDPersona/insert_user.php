<?php
//incluimos la dirección de nuestra coenxion a la base de datos
include("../Conexion/connection.php");
//Recogemos los valores introducidos en nuestro formulario y los guardamos en las siguientes variables.
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
//Declaramos la variable que recogerá nuestra sentencia de insertar, en este caso, de la persona que tenga ese nombre, e introduciremos las variables que hemos declarado antes
//con los valores que el usuario ha introducido en el formulario.
$sql="INSERT INTO persona(nombre,apellidos,direccion,telefono)VALUES
('" . $nombre . "','" . $apellidos . "','" . $direccion . "','" . $telefono . "')";

//Realizamos la consulta en nuestra base de datos.
$query = mysqli_query($mysqli, $sql);
//Esta condición comprobará si ha sido exitosa nuestra consulta, si lo ha sido devolverá true, por lo que se redireccionará a nuestra página de home.php.
if($query){
    Header("Location: ../home.php");
}else{

}
?>