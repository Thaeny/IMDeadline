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


$task = new Tasks();
$taskID = $_GET['id'];
$user = $_SESSION['user'];
$taskData = $task->GetSingleTask($taskID);
$taskDays = $task->DaysRemaining($taskID);


$comment = new Comment();

//controleer of er een update wordt verzonden
if(!empty($_POST))
{
    if($_POST['action'] === "nieuweActivity") {
        $comment->Comment = $_POST['activitymessage'];
        $id = $_GET['id'];
        $user = $_SESSION['user'];

        try
        {
            $comment->SaveComment($id, $user);
        }
        catch (Exception $e)
        {
            $feedback = $e->getMessage();
        }
    }

    if($_POST['action']=== "removeComment") {
        $comment->CommentId = $_POST['id'];

        try {
            $comment->RemoveComment();
        } catch (Exception $e) {
            $feedback = $e->getMessage();
        }
    }

}


//altijd alle laatste activiteiten ophalen
$allComments = $comment->GetComments($taskID);

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
        <div class="taskDetail">
            <p>
                <?php foreach($taskData as $key=>$data) {

                    echo '<p class="taskDetailTitle">' . $data['taskname'] . '</p>';

                    echo '<p class="taskDeadline"> remaining days :  <number> ' . $taskDays  . '   </number></p>';

                        echo '<div class="line"></div>';

                    echo '<p class="taskinf">
                              <inf>List : ' . $data['listname'] . '</inf>
                              <inf>Course : ' . $data['coursename'] . '</inf>
                              <inf><a href="uploads/' . $data['filename'] . ' "> ' . $data['filename'] . ' </a></inf>
                              <inf2>Creator : ' . $data['username'] . '</inf2>
                              <br><br><br>
                              <info>Info: <br><br> ' . $data['info'] . '</info>
                          </p>';


                }


                ?>
            </p>



            <form method="post" action="">
                <div class="statusupdates">
                    <?php echo $user ?>
                    <input type="text" placeholder="What's on your mind?" id="activitymessage" name="activitymessage" />
                    <input type="hidden" name="action" value="nieuweActivity" />
                    <input id="btnSubmit" type="submit" value="Share" />

                    <ul id="listupdates">


                        <?php
                        if(count($allComments) > 0)
                        {
                            foreach($allComments as $key=>$singleComment)
                            {
                                echo "<li id='". $singleComment['commentId'] ."'><h2>". $singleComment['username'] ." </h2> ". $singleComment['comment'] ."<br></li>";
                            }
                        }
                        else
                        {
                            echo "<li>Waiting for first status update</li>";
                        }
                        ?>


                    </ul>

                </div>
            </form>

        </div>

    </div>










    </div>
</div>






<script src="js/jQuery.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>


