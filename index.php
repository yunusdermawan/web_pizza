<?php

    // Create connection to db
    include('config\db_connect.php');

    // Write the query
    $sql = 'SELECT * FROM pizzas ORDER BY created_at';

    // Insert the query to db connection
    $result = mysqli_query($conn, $sql);

    // Fetch data as array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result from memory
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

    //explode(',', $pizzas[0]['ingredients']);

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates\header.php') ?>

    <main>
        <div>
            <div class="hero">
                <img src="public\img\hero1.jpg" alt="Hero 1">
            </div>
        </div>
    </main>

    <?php include('templates\footer.php') ?>
    
</html>