<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "productphp";

    $connection = mysqli_connect($host,$user,$password,$db);

    if(!$connection){
        die("Cannot connect to Database");
    }

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM product WHERE id=$id";
        $connection->query($sql);
    }

    header('location: ./index.php');
    exit;

?>