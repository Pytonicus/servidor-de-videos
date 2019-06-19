<?php
// Incluimos las cabeceras CORS y la conexión a la base de datos:
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); 
header("Content-Type: application/json"); 

include_once '../comun/db.php';

// Creamos una función para obtener la información de cada video y este recibirá un parámetro:
function obtener_info($id){
    // Obtenemos la variable global del archivo db.php:
    global $enlace;
    // Hacemos una consulta a la base de datos para tomar la descripción de un valor recibido por GET:
    $resultado = mysqli_query($enlace, "SELECT * FROM videos WHERE id='" . $id . "'");

    // Iteramos sobre toda la información para guardarla en un array:
    while($fila = mysqli_fetch_array($resultado)){
        $todosLosVideos[] = $fila;
    }
    // Devolvemos el array donde se ha guardado toda la iteracción:
    return $todosLosVideos;
}

// Vamos a restringir la consulta a la URL permitiendo solamente GET:
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    // Ahora guardamos el resultado de la función en una variable al que le pasamos un parametro GET:
    $resultados = obtener_info($_GET['id']);

}else{
    header('HTTP/1.1 405 Method Not Allowed');
}

// Imprimimos el resultado en formato JSON:
    echo(json_encode($resultados));

?>