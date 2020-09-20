<?php
    include('connection.php');

    $query = "SELECT E.id_event, E.event_date, T.name_track FROM records 
    INNER JOIN events E ON records.event_date = E.event_date
    INNER JOIN tracks T ON records.id_track = T.name_track
    GROUP BY E.event_date";
    $result = mysqli_query($db, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($db));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_event' => $row['id_event'],
            'event_date' => $row['event_date'],
            'name_track' => $row['name_track'],
        );
    }  

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>