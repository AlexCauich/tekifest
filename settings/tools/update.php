<?php

include('connection.php');

$id_pilot = $_POST['id_pilot'];
$id_tag = $_POST['id_tag'];
$name_pilot = $_POST['name_pilot'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$model= $_POST['model'];

$query = "UPDATE pilots SET id_tag = '$id_tag', name_pilot = '$name_pilot', category = '$category', brand = '$brand', model = '$model' WHERE id_pilot = '$id_pilot'";
$result = mysqli_query($db, $query);

if(!$result) {
    die("Query update failed");
}

header('location: ../../home.php ');

?>

