<?php

    // Create connection to db
    $conn = mysqli_connect('localhost', 'pizza_admin', 'admin', 'pizza_db');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Write the query
    $sql = 'SELECT * FROM pizzas';

    // Insert the query to db connection
    $result = mysqli_query($conn, $sql);

    // Fetch data as array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result from memory
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

    print_r($pizzas);

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php') ?>

    <?php include('templates/footer.php') ?>
    
</html>