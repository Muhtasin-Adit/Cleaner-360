<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Admin-Registration</title>

        <link rel="stylesheet" href="../css/admin_registration.css">

    </head>

    <body>

        <?php 

            include '../config.php';
            include './admin_data_store.php';

        ?>

        <h2 class="heading">ADMIN REGISTRATION </h2>

        <form id="create-account-form" action=" " method="POST" autocomplete="on">
            
            

            <h2>SIGN UP</h2>

            <!-- Username -->
            <div class="input-group">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="Your Name" autocomplete="on"> <br>

                <?php

                if (isset($_POST['signup'])) {

                    $uname = $_POST['username'];
                    $pattern = "/^[a-zA-Z0-9]+$/";


                    if(!preg_match($pattern, $uname)){

                        echo "User Name can not contain any empty space <br> or special character";
                                            
                    }else{
                        echo "Username is good!";
                        
                    }
                                
                }


                ?>

            <br>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Your-Email@example.com" required><br>
 
                <?php

                if (isset($_POST['signup'])) {

                    $email = $_POST['email'];
                    $pattern = "/^[a-zA-Z0-9]+$/";


                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "Invalid Email";

                    }else{
                        echo "Email is valid";
                            
                    }
                                
                }


                ?>

            <br>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Your secret pass!" required> <br>
   
                <?php

                if (isset($_POST['signup'])) {

                    $pass = $_POST['password'];

                    if (strlen($pass) < 6) {
                        echo "Should have atleast SIX character!";

                    }else{
                        echo "Password is okay!";
                            
                    }
                                
                }


                ?>

            <br>
            </div>

            <!-- Confirm Password -->
           <div class="input-group">
                <label for="password">Confirm Password</label><br>
                <input type="password" name="cpassword" id="cpassword" placeholder="Repeat your pass!" required> <br>
  
                <?php

                if (isset($_POST['signup'])) {

                    $pass1 = $_POST['password'];
                    $cpass1 = $_POST['cpassword'];

                    if ($pass1 == $cpass1) {
                        echo "Password matches!";
                            
                    }else{
                        echo "Password doesn't matches!";
                            
                    }
                                
                }


                ?>

            <br>
           </div> 

            <div id="sign-up">
                <input type="submit" name="signup" value="Procced"><br><br>
                <a href="./admin_login.php">Back to Sign-In</a>
            </div>

            <br>
            
            <a href="../index.php" id="home">Back to Homepage</a>
        </form>
        
    </body>
</html>