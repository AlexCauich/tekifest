<?php

include('connection.php');

if(isset($_POST['username'])) {
    $email = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $r_pass = $_POST['r_pass'];


    $query = "INSERT INTO users(email, password, r_pass) VALUES('$email', Md5('$password'), Md5('$password'))";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query Failed.');
    }

    echo 'Register Added Successfully';
}
?>