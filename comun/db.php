<?php
    // Creamos una variable global
    global $enlace;
    // Enlace va a ser una conexión a la base de datos:
    $enlace = mysqli_connect("localhost", "root", "", "sitio_videos");
    // Creamos una condición por si no funciona la conexión:
    if(!$enlace){
        echo "Error: no se puede conectar a MySQL" . PHP_EOL;
        exit;
    }


?>