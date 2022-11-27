<?php

    require "connection.php";
    
    // RUTA DEL ARCHIVO XML
    $archivo = simplexml_load_file("../Xml/agenda.xml");

    // CREAMOS LA TABLA
    $sql = "CREATE TABLE empresa(nombre varchar(50) , direccion varchar(50), telefono varchar(15), email varchar(30))";
    
    if($mysqli->query($sql) === TRUE) {
        echo "La tabla se creo correctamente <br> <br>";
    } else {
        echo "Hubo un error al crear la tabla: " . $mysqli->error . "<br> <br>";
    }
    
    // CICLO PARA LEER EL XML E INSERTAR EN LA TABLA
    foreach($archivo->children() as $fila) {
        //Declaramos la variable $atribute donde guardaremos los atributos que se encuentran en nuestra página XML.
        $atribute = $fila->attributes();
        //Esto nos servirá para identificar si el atributo que hemos encontrado pertenece a empresa.
        if ($atribute['tipo'] == "empresa") {
            //Irá guardando los valores del xml de empresa en las siguientes variables para luego ir insertándolas.
            $nombre = $fila->nombre;
            $direccion = $fila->direccion;
            $telefono = $fila->telefono;
            $email = $fila->email;

            //Declaramos una sentencia donde insertaremos las variables que acabamos de crear donde hemos recogido los valores del archivo xml.
            $sql_insert = "INSERT INTO empresa(nombre,direccion,telefono,email)VALUES
            ('" . $nombre . "','" . $direccion . "','" . $telefono . "','" . $email . "')";
            //Si se han insertado correctamente nos rediccionará a nuestro fichero de "home.php" que será nuestra página principal de nuestra agenda una vez hayamos iniciado sesión.
            if($mysqli->query($sql_insert) === TRUE) {
                header('Location:../home.php');
            } else {
                echo "Hubo un error al insertar en la tabla: ". $mysqli->error . "<br> <br>";
            }            
        }     
    }
    
    $mysqli->close();
