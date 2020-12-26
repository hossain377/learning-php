
<?php

$email = $title = $ingredients = '';

$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

//if(isset($_GET['submit'])){
//    echo $_GET['email'];
//    echo $_GET['title'];
//    echo $_GET['ingredients'];
//}

if(isset($_POST['submit'])){
//    echo htmlspecialchars($_POST['email']);
//    echo htmlspecialchars($_POST['title']);
//    echo htmlspecialchars($_POST['ingredients']);
    
    //check email
   if(empty($_POST['email'])){
      $errors['email'] = 'the email is required </br>';
   } else{
         $email = $_POST['email'];
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $errors['email'] = 'email must be valid email address';
          }
       } 
    
    //check title
    if(empty($_POST['title'])){
      $errors['title'] = 'the title is required </br>';
   } else{
           $title = $_POST['title'];
          if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
              $errors['title'] ='title must be letters and spaces';
          }
       } 
    
    //check ingredient
    if(empty($_POST['ingredients'])){
      $errors['ingredients'] = 'the ingredients is required </br>';
   } else{
          $ingredients = $_POST['ingredients'];
          if(!Preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
             $errors['ingredients'] = 'the ingredients must be a comma separated list';
          }
       } 
    
    if(array_filter($errors)){
//        echo 'the errors in the form';
    }else{
//        echo 'the form is valid';
        header('location: index.php');
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
<section class="container blue-text">
    <h4 class="center">Add a Pizza</h4>
     <form class="white" action="add.php" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label>Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title ?>" >
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label>Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form> 
</section>

<?php include('templates/footer.php'); ?>

</html>