<?php

    include('connection.php');
    $id = $_POST['id'];

    $email = $_POST['username'];
    $password = $_POST['password'];
    $r_pass = $_POST['r_pass'];

    $query = "UPDATE users SET email = '$email', password = Md5('$password'), r_pass = Md5('$password') WHERE id_user = '$id'";

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('jQuery Failed');
    }

    echo 'Usuario Actualizado';
?>