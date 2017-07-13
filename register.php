<?php
/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 12/07/17
 * Time: 15:29
 */



spl_autoload_register(function($class){
    include_once("classes/" .  $class . ".class.php");
});

// Als post niet leeg is -> nieuwe User registreren via register-functie...
if(!empty($_POST)){
    $register = new User();
    $register->Register();
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Latest compiled and minified CSS / Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!-- Eigen css -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
</head>

<body>
<div class="container">

    <div class="form">
        <div class="regnow">
            <h1>IMDeadline</h1>
        </div>

        <?php echo $errormessage ?>

        <form action="" method="post">
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email"></div>

            <div class="firstname">
                <label for="firstname">First name</label>
                <input type="text" name="firstname" id="firstname" placeholder="Your first name"></div>

            <div class="lastname">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname" placeholder="Your last name"></div>

            <div class="username">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Your username"></div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Your password"></div>

            <button>
                Register
            </button>

            <p>Already have an account? Log in <a style='color: blue' href="login.php">here.</a></p>

        </form>
    </div>
</div>
</body>

</html>
