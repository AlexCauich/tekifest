<?php 

include('connection.php');
$id_pilot = $_GET['id_pilot'];

$query = "SELECT lap, lap_time FROM records WHERE id_pilot = '$id_pilot'";
$result = mysqli_query($db, $query);

?>