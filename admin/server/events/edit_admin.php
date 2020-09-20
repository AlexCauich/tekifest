<?php

    include('connection.php');
    $id = $_POST['id'];

    $date = $_POST['date'];
    $idevent = $_POST['idevent'];

    $query = "UPDATE events SET id_event = '$idevent', event_date = '$date' WHERE id_event = '$id'";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('jQuery Failed');
    }

    echo 'Usuario Actualizado';
?>