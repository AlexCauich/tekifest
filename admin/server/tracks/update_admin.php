<?php
    include('connection.php');
    
    $id = $_POST['id'];
    $query = "SELECT * FROM tracks WHERE id_track = $id";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        die('jQuery Failed.');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'name_track' => $row['name_track'],
            'mileage' => $row['mileage'],
            'idtrack' => $row['id_track']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;    

?>