<?php
include('connection.php');

$query = "SELECT P.category, lap, P.name_pilot, event_date, lap_time FROM records 
            INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records 
            WHERE event_date = '2019-03-22' AND lap_time > '00.00:00.000' GROUP BY id_pilot)AND P.category = 'NEGRA' ";
$result = mysqli_query($db, $query);

if(!$result) {
    die("Query Failed");
}

$blue = "SELECT P.category, lap, P.name_pilot, event_date, lap_time FROM records 
            INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records 
            WHERE event_date = '2019-03-22' AND lap_time > '00.00:00.000' GROUP BY id_pilot)AND P.category = 'AZUL' ";
$r_result = mysqli_query($db, $blue);

if(!$r_result) {
    die("Query Failed");
}

$green = "SELECT P.category, lap, P.name_pilot, event_date, lap_time FROM records 
            INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records 
            WHERE event_date = '2019-03-22' AND lap_time > '00.00:00.000' GROUP BY id_pilot)AND P.category = 'VERDE' ";
$r_result1 = mysqli_query($db, $green);

if(!$r_result1) {
    die("Query Failed");
}

?>