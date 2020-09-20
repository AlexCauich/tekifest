<?php
    include('connection.php');
    
    $id = $_POST['id'];
    $query = "SELECT * FROM events WHERE id_event = $id";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        die('jQuery Failed.');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'event_date' => $row['event_date'],
            'id_event' => $row['id_event']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;    

?>