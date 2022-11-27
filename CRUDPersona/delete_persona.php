<?php
//incluimos la dirección de nuestra coenxion a la base de datos
include("../Conexion/connection.php");
//Recogemos con el GET el nombre que se nos ha enviado desde el href de nuestra etiqueta <a> de contenido eliminar.
$nombre=$_GET["nombre"];
//Declaramos la variable que recogerá nuestra sentencia de eliminar, en este caso, de la persona que tenga ese nombre.
$sql="DELETE FROM persona WHERE nombre='$nombre'";
//Realizamos la consulta en nuestra base de datos.
$query =  mysqli_query($mysqli, $sql);
//Esta condición comprobará si ha sido exitosa nuestra consulta, si lo ha sido devolverá true, por lo que se redireccionará a nuestra página de home.php.
if($query){
    Header("Location: ../home.php");
}else{

}

?>