<?php
    include('connection.php');
    
    $id = $_POST['id'];
    $query = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        die('jQuery Failed.');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'email' => $row['email'],
            'password' => $row['password'],
            'r_pass' => $row['r_pass'],
            'id_user' => $row['id_user']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;    

?>