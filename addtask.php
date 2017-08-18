<?php
/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 12/07/17
 * Time: 16:46
 */

session_start();

spl_autoload_register(function($class){
    include_once("classes/" .  $class . ".class.php");
});

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
}




$task = new Tasks();

if(!empty($_POST))
{
    if ($_POST['action'] === "newTask" && $_SESSION['user'] ) {

        $task->Taskname = $_POST['taskname'];
        $task->Username = $_SESSION['user'];
        $task->Deadline = $_POST['date'];
        $task->Listname = $_POST['listname'];
        $task->Coursename = $_POST['coursename'];
        $task->Info = $_POST['taskInfo'];
        $task->Workhours = $_POST['workhours'];
        $task->Filename = $_FILES["fileToUpload"]["name"];


        try{
            $task->SaveTask();
            header('Location: timeline.php');
        }
        catch (Exception $e)
        {
            $error = $e->getMessage();
        }
    }
}








$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $errormsg = "niet goed";
    }



$user = new User();
if($user->CheckAdmin()){
    $admin = "ja";
} else{
    $admin = "nee";
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
                <p class="username"><?php echo $_SESSION['user'] ?></p>

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

<div class="taskForm">
    <form action="" method="post" enctype="multipart/form-data">


        <div class="addTaskForm">
            <label class="TaskName" for="taskname">Give your new task a specific name.</label>
            <br><br><br>
            <textarea class="input" style="text-align: center; font-size: 1.1em; border: 1px solid lightgrey;" rows="1" cols="30" name="taskname" id="taskname" placeholder="Name your task here..."></textarea>
        </div>

        <br><br>


        <input id="date" class="date input" type="date" name="date">


        <input id="hours" class="hours input" placeholder="Hours" name="workhours" list="workhours">

        <datalist id="workhours">
            <option value="5">
            <option value="10">
            <option value="15">
            <option value="20">
            <option value="25">
            <option value="30">
            <option value="35">
            <option value="40">
            <option value="45">
            <option value="+50">
        </datalist>
        <br><br>

        <br>

        <p class="fileTitle">Select file to upload:</p><br><br>
        <input style="padding-left: 65px; margin-top: -10px; color: dimgray; font-size: 0.9em;" type="file" name="fileToUpload" id="fileToUpload">


        <br><br>



        <input placeholder="Select a list" class="input chooseList" name="listname" list="lists">
        <datalist id="lists">
            <?php
            $conn = Db::getInstance();
            $query = $conn->query("SELECT * FROM lists ");
            while($l = $query->fetch()) {
                echo '<option value="'. htmlspecialchars($l['listname']) .'">';

            }
            ?>
        </datalist>

        <input placeholder="Select a course" class="input chooseCourse" name="coursename" list="courses">
        <datalist id="courses">
            <?php
            $conn = Db::getInstance();
            $query = $conn->query("SELECT * FROM courses ");
            while($c = $query->fetch()) {
                echo '<option value="'. htmlspecialchars($c['coursename']).'">';

            }
            ?>
        </datalist>

        <br><br>
            <p class="info">Extra information about the task:</p>
            <textarea style="border-radius: 3px; border: 1px solid darkgrey;" name="taskInfo" rows="5" cols="40" id="taskInfo"></textarea>

        <br><br>
        <?php echo "<div class='errorInlog'>" . htmlspecialchars($error) . "</div>" ?>
        <br>

        <div>
            <input type="hidden" name="action" value="newTask" />
            <input class="btn createTaskBTN" style="margin: 20px auto;" id="createTaskBTN" type="submit" value="Create Task" name="submit">
        </div>
    </form>

</div>




</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>


