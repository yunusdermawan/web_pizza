<?php

    include('config/db_connect.php');

    $email = $title = $ingredients = '';
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if(isset($_POST['submit'])){
        
        // Check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required </br>';
        } else {
           $email = $_POST['email'];
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $errors['email'] = 'Email must be a valid email';
           }
        }

        // Check title
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required </br>';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Titles must be letters and space only';
            }
        }
        
        // Check ingredients
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least one ingredient is required </br>';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be a comma separated list';
            }
        }

        if(array_filter($errors)){
            // echo 'Errors in the form';
        } else {

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // Create sql
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";

            // Save to db and check
            if(mysqli_query($conn, $sql)){
                // Success
                header('Location: index.php');
            } else {
                // Error
                echo 'Query error: ' > mysqli_error($conn);
            }

            // echo 'Form is valid';
            header('Location: index.php');
        }
        
    } // This is the end of post method

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></php></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>
    
</html>