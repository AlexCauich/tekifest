<?php

    include('connection.php');
    $id = $_POST['id'];

    $name_track = $_POST['name_track'];
    $mileage = $_POST['mileage'];
    $idtrack = $_POST['idtrack'];

    $query = "UPDATE tracks SET name_track = '$name_track', mileage = '$mileage', id_track = '$idtrack' WHERE id_track = '$id'";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('jQuery Failed');
    }

    echo 'Usuario Actualizado';
?>