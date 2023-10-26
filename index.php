<?php

    // Create connection to db
    include('config/db_connect.php');

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

    <?php include('templates/header.php') ?>

    <h4 class="center grey-text">Pizzas</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include('templates/footer.php') ?>
    
</html>