<?php 
  include('connection.php');

    $name_pilot = $_GET['name_pilot'];

    $query = "SELECT P.name_pilot, P.category, lap_time, lap, brand, model, T.name_track, event_date FROM records 
                INNER JOIN pilots P ON records.id_pilot = P.id_pilot
                INNER JOIN tracks T ON records.id_track = T.name_track
                WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records WHERE lap_time > '00.00:00.000' GROUP BY id_pilot) AND P.name_pilot = '$name_pilot' ";
    $result = mysqli_query($db, $query);

    if(!$result) {
        die("Query result Failed");
    }

?>