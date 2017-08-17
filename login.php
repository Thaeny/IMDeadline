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

$login = new User();

if(!empty($_POST)){

    try{
        if($login->Login()){
            header("Location: timeline.php");
        } else{
        }

    } catch (Exception $e) {
        $error = $e->getMessage();
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS / Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!-- Eigen css -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>IMDeadline</title>
</head>
<body>



<div class="container">

    <div class="form" id="inlogForm">
        <div class="regnow">
            <h1>IMDeadline</h1>
        </div>


        <form action="" method="post">
            <div class="email">
                <label style="" class="labelname" for="email">Email</label>
                <input class="input" type="email" name="email" id="email" placeholder="Your email"></div>

            <div class="password">
                <label class="labelname" for="password">Password</label>
                <input class="input" type="password" name="password" id="password" placeholder="Your password"></div>

            <?php echo "<div class='errorInlog'>" . $error . "</div>" ?>


            <button class="registerBTN">
                Login
            </button>

        </form>

        <p class="alreadyP">Don't have an account yet? Register <a href="register.php" class="nacc">here</a>!</p>



    </div>


</div>

</body>
</html>