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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js">
    <!-- Eigen css -->
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
<div class="container">

    <div style="margin-left: 450px; margin-top: 200px" class="form">
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
