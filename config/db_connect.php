<?php


    $conn = mysqli_connect('localhost', 'pizza_admin', 'admin', 'pizza_db');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>