<?php 
include('connection.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM events WHERE id_event = '$id'";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die("jQuery failed");
    }
    
    echo 'Eliminación Completada';
}
?>