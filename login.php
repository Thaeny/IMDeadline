<?php
/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 12/07/17
 * Time: 15:36
 */


spl_autoload_register(function($class){
    include_once("classes/" .  $class . ".class.php");
});


$errormessage = "";

$login = new User();
$login->Login();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js">
    <title>IMDeadline</title>
</head>
<body>



<div class="container">

    <div class="form">
        <div class="regnow">
            <h1>IMDTEREST</h1>
        </div>

        <?php echo $errormessage ?>

        <form action="" method="post">
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email"></div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Your password"></div>

            <button>
                Login
            </button>

        </form>

        <a href="register.php" class="nacc">Nog geen account? Registreer nu!</a>



    </div>


</div>

</body>
</html>