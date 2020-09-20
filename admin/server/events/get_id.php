<?php
    include('connection.php'); // Realizamos la consulta a la base de datos

    $query = "SELECT MAX(id_event) AS id_date FROM events "; // Seleccionamos todos los datos de la db
    $result = mysqli_query($db, $query); // Ejecutamos la consulta

    // Si existe un error mostrara el mensaje de Consulta fallida
    if(!$result) {
        die('Query Failed'. mysqli_error($db));
    }

    //Convertimos la respuesta de mysql a un array
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_date' => $row['id_date'],
        );
    }  

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>