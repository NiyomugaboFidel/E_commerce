<?php

require 'config/constants.php';

 // get back form data if there was a registration error
 $firstname = $_SESSION['signup-data']['firstname'] ?? null;
 $lastname = $_SESSION['signup-data']['lastname'] ?? null ;
 $username = $_SESSION['signup-data']['username'] ?? null;
 $email  = $_SESSION['signup-data']['email'] ?? null;
 $createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
 $confirmpassword = $_SESSION['signup-data']['confimpassword '] ?? null;
 // delete signup data session 
 unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE WELL</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/styles.css">
    <script src="https://kit.fontawesome.com/76b2077ad1.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;0,800;1,700&display=swap');
        </style>
        
</head>
<body>










<Script src="js/mian.js"></Script>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
       <?php
          if(isset($_SESSION['signup'])): ?>  
            <div class="alert__message error">
            <p> 
                <?= $_SESSION['signup'] ;  
                unset($_SESSION['signup']); 
                ?>
            </p>
           
            </div> 
          
            <?php endif ?>

        <form   method="POST" action="<?= ROOT_URL ?>signup-logic.php"  enctype="multipart/form-data">
            <input type="text" name="firstname" value="<?= $firstname ?>"  placeholder="First Name">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
            <input type="text" name="username"value="<?= $username ?>" placeholder=" Username">
            <input type="email" name="email"value="<?= $email?>" placeholder="Email">
            <input type="password" name="createpassword"value="<?= $createpassword ?>" placeholder="Create password">
            <input type="password" name="confirmpassword"value="<?= $confirmpassword?>" placeholder="confirm password">

            <div class="form__control">
                <label for="avatar"></label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>


</body>
</html>