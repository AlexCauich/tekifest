<?php 
include('connection.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id_user = '$id'";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die("jQuery failed");
    }
    
    echo 'Eliminación Completada';
}
?>