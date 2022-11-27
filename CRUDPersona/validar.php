<?php
//incluimos la dirección de nuestra coenxion a la base de datos
include('../Conexion/connection.php');
//Iniciamos una sesión.
session_start();
//Recogemos con el $_POST los nombre y la contraseña que el usuario ha introudido y lo guardamos en dos variables disrtintas.
$usuario=$_POST['usuario'];
$pass=$_POST['password'];
//Guardamos el nombre de nuestro usuario con un $_SESSION
$_SESSION['usuario']=$usuario;

//Declaramos una variable la cual contendrá una sentencia que buscará un usuario con el nombre que hemos guardado antes.
$consulta="SELECT*FROM credenciales where usuario= '$usuario'";
  //Realizamos la consulta en nuestra base de datos.
  $resultado=mysqli_query($mysqli,$consulta);
  //Obtener una fila de resultado como un array asociativo
  $fila=mysqli_fetch_assoc($resultado);
 
  //Crearemos una variable donde guardaremos el password del array asociativo que acabamos de declarar.
  $contra = $fila['password'];
  //Verifica que la contraseña que ha introducido el usuario coincide con la que esta en la base de datos, la cual está encriptada, por lo que este método hará ver si son iguales
  //aunque una este encriptada.
  if(password_verify($pass,$contra)){
    
      header("location:../Conexion/conexionPersona.php");
  
  }else{
      ?>
      <?php
      header("Location: ../index.html");
  
    ?>
    <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
    <?php
  }

mysqli_free_result($resultado);
mysqli_close($mysqli);
