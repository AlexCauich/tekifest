<?php 

include('connection.php');
$name_track = $_GET['name_track'];

$query = "SELECT P.name_pilot, P.category, lap_time, lap, brand, model, T.name_track, event_date FROM records 
INNER JOIN pilots P ON records.id_pilot = P.id_pilot
INNER JOIN tracks T ON records.id_track = T.name_track
WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records WHERE lap_time > '00:00.000' GROUP BY event_date) AND T.name_track = '$name_track' LIMIT 10";
$result = mysqli_query($db, $query);

?>