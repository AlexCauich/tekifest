<?php

include('connection.php');

if(isset($_POST['date'])) {
    $date = $_POST['date'];
    $idevent = $_POST['idevent'];

    $query = "INSERT INTO events(id_event, event_date) VALUES('$idevent','$date')";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query Failed.');
    }

    echo 'Register Added Successfully';
}
?>