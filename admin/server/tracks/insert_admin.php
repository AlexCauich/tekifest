<?php

include('connection.php');

if(isset($_POST['name_track'])) {
    $name_track = $_POST['name_track'];
    $mileage = $_POST['mileage'];
    $idtrack = $_POST['idtrack'];


    $query = "INSERT INTO tracks(id_track, name_track, mileage) VALUES('$idtrack','$name_track', '$mileage')";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query Failed.');
    }

    echo 'Register Added Successfully';
}
?>