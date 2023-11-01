<?php

    include('config/db_connect.php');
    if(isset($_POST['delete'])){
        $id_to_del = mysqli_real_escape_string($conn, $_POST['id_to_del']);

        $sql = "DELETE FROM pizzas WHERE id = $id_to_del";

        if(mysqli_query($conn, $sql)){
            // Success
            header('Location: index.php');
        } {
            // Failure
            echo 'query error:' . mysqli_error($conn);
        }
    }

    // Check GET req id param
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // Make sql
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // Get query result
        $result = mysqli_query($conn, $sql);

        // Fetch a data in array form
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);


    }

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center">
    <?php if($pizza): ?>

        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!-- DELETE FORM -->
        <form action="details.php" method="post">
            <input type="hidden" name="id_to_del" value="<?php echo $pizza['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else: ?>
        <h5>No such pizza exists!</h5>
    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>