<?php 



include('connection.php');

session_start();



if(isset($_POST['username'])) {

    $email = mysqli_real_escape_string($db, $_POST['username']);

    $password = mysqli_real_escape_string($db, $_POST['password']);


    $passwordmd = md5($password);



    $query = "SELECT * FROM `users` WHERE email = '$email' AND password = '$passwordmd'";

    $result = mysqli_query($db, $query);

    

    $rows = mysqli_num_rows($result);



    if ($rows == 1) {

        $_SESSION['email'] = $email;

        exit();



        echo 'welcome';

        

    }

    if($rows == 0){

        echo 'El usuario no exste';    

    }





}



?>