<?php
/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 12/07/17
 * Time: 16:46
 */

session_start();

$errormessage = "";
spl_autoload_register(function($class){
    include_once("classes/" .  $class . ".class.php");
});

// Checken of user ingelogd is als session...
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
} else {
    //blabla
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

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a id="logo1" class="navbar-brand" href="timeline.php">IMDeadline</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <div class="dropdown">
                    <button id="addBTN1" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="glyphicon-plus"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="addlist.php">Add a list</a></li>
                        <li><a href="addtask.php">Add a task</a></li>
                    </ul>
                </div>
            </li>

            <li><a href="#"><span class="glyphicon glyphicon-user navIcons"></span></a></li>

            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out navIcons"></span></a></li>
        </ul>
    </div>
</nav>

<div class="main">
    <div class="dashboard">
        <div class="list-group">
            <a href="timeline.php" class="list-group-item">Timeline</a>
            <a href="lists.php" class="list-group-item">Lists</a>
            <a href="courses.php" class="list-group-item">Courses</a>
        </div>
    </div>




    <div class="wall">
        <div class="titleContainer">
            <p>
                <?php
                foreach($_GET as $key => $value):?>
                    <?php
                    $conn = Db::getInstance();
                    $query = $conn->query("SELECT * FROM lists WHERE( listId = '".$value."')");
                    while($r = $query->fetch()) {
                        echo $r['listname'];
                    }
                    ?>
                <?php endforeach; ?>
            </p>



        </div>

        <div class="listContainer">




        </div>
    </div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jQuery.js"></script>
<script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>


