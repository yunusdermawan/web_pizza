<?php

    // Create connection to db
    include('config\db_connect.php');

    // Write the query
    $sql = 'SELECT * FROM drinks ORDER BY created_at';

    // Insert the query to db connection
    $result = mysqli_query($conn, $sql);

    // Fetch data as array
    $drinks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result from memory
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

    //explode(',', $drinks[0]['ingredients']);

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates\header.php') ?>

    <div class="container mt-16 mx-auto w-full justify-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-10">
        <?php foreach($drinks as $drink): ?>
            <div class="card w-96 bg-base-100 shadow-xl mb-10 mx-auto xl:mx-0">
                <figure class="mt-2"><img src="public\img\drink.png" alt="Shoes" style="width: 200px" /></figure>
                <div class="card-body">
                    <h2 class="card-title">
                    <?php echo htmlspecialchars($drink['title']); ?>
                    <!-- Discount -->
                    <?php if(($drink['discount']) == 0): ?>
                        <div class="hidden">Discount</div>
                    <?php else: ?>
                        <div class="badge badge-secondary">Discount <?php echo htmlspecialchars($drink['discount']); ?></div>
                    <?php endif; ?>
                    </h2>
                    <p><?php echo htmlspecialchars($drink['description']); ?></p>
                    <h5 class="border-t-2 mt-10 text-lg font-bold">Recipes:</h5>
                    <p class="mb-4"><?php echo htmlspecialchars($drink['flavor']); ?></p>
                    <div class="card-actions justify-end">
                        <div class="card-actions">
                            <button class="btn btn-warning">Add to Chart</button>
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include('templates\footer.php') ?>
    
</html>