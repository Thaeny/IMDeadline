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

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$task = new Tasks();

if(!empty($_POST))
{
    if ($_POST['action'] === "newTask" && $_SESSION['user'] ) {

        $task->Taskname = $_POST['taskname'];
        $task->Username = $_SESSION['user'];
        $task->Deadline = $_POST['date'];

        try{
            $task->SaveTask();
            header('Location: timeline.php');
        }
        catch (Exception $e)
        {
            $feedback = $e->getMessage();
        }
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


    <form style="padding-top: 200px; text-align: center;" action="" method="post" enctype="multipart/form-data">


        <div class="addTaskForm">
            <label for="taskname">Give your new task a specific name.</label><br><br><br>
            <textarea style="text-align: center; font-size: 1.1em; border: 1px solid lightgrey;" rows="1" cols="30" name="taskname" id="taskname" placeholder="Name your task here..."></textarea>
        </div>
        <br><br>
        <input type="date" name="date">
        <br><br>

        <div class="createTaskBTN">
            <input type="hidden" name="action" value="newTask" />
            <input class="btn" id="createTaskBTN" type="submit" value="Create Task" name="submit">
        </div>

    </form>






</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>


