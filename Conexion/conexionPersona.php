<?php

    require "connection.php";
    
    // RUTA DEL ARCHIVO XML
    $archivo = simplexml_load_file("../Xml/agenda.xml");

    // CREAMOS LA TABLA
    $sql = "CREATE TABLE persona(nombre varchar(50) , apellidos varchar(50), direccion varchar(15), telefono varchar(30))";
    
    if($mysqli->query($sql) === TRUE) {
        echo "La tabla se creo correctamente <br> <br>";
    } else {
        echo "Hubo un error al crear la tabla: " . $mysqli->error . "<br> <br>";
    }
    
    // CICLO PARA LEER EL XML E INSERTAR EN LA TABLA
    foreach($archivo->children() as $fila) {
        $atribute = $fila->attributes();

        if ($atribute['tipo'] == "persona") {
            $nombre = $fila->nombre;
            $apellidos = $fila->apellidos;
            $direccion = $fila->direccion;
            $telefono = $fila->telefono;

            // Declaramos una sentencia donde insertaremos las variables que acabamos de crear donde hemos recogido los valores del archivo xml.
            $sql_insert = "INSERT INTO persona(nombre,apellidos,direccion,telefono)VALUES
            ('" . $nombre . "','" . $apellidos . "','" . $direccion . "','" . $telefono . "')";
            //Si se han insertado correctamente nos rediccionará a nuestro fichero de "conexionEmpresa.php" que su función será la misma pero con la tabla de Empresa.
            if($mysqli->query($sql_insert) === TRUE) {
               header('Location:conexionEmpresa.php');
            } else {
                echo "Hubo un error al insertar en la tabla: ". $mysqli->error . "<br> <br>";
            }   
        }     
    }
    
    $mysqli->close();
