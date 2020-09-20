<?php

include('connection.php');

$query = "SELECT E.event_date, id_track FROM `records` INNER JOIN events E ON records.event_date = E.event_date GROUP BY E.event_date";
$result = mysqli_query($db, $query);

if(!$result) {
    die("Query Failed");
}

?>