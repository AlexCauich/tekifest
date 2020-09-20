<?php 

include('connection.php');
$name_track = $_GET['name_track'];

/*$query = "SELECT P.name_pilot, P.category ,P.model, P.brand, lap, lap_time, event_date, T.name_track FROM records 
INNER JOIN tracks T ON records.id_track = T.name_track
INNER JOIN pilots P ON records.id_pilot = P.id_pilot
WHERE lap_time = ANY (SELECT MIN(lap_time) FROM records WHERE lap_time > '00.01:00.00' AND T.name_track = '$name_track' GROUP BY (id_pilot)) ORDER BY lap_time ASC limit 5
    ";*/

$query = "SELECT name_track FROM tracks WHERE name_track = '$name_track'";
$query_result = mysqli_query($db, $query);
while($row = mysqli_fetch_array($query_result)){
    $nametrack = $row['name_track'];
}
$query_records = "SELECT P.name_pilot, P.category ,P.model, P.brand, lap, lap_time, event_date FROM records R
INNER JOIN pilots P ON R.id_pilot = P.id_pilot
WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records WHERE lap_time > '00.01:00.000' AND id_track = '$nametrack' GROUP BY event_date ) 
";

$result = mysqli_query($db, $query_records);
?>