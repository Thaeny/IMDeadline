<?php

session_start();

include_once("../classes/db.class.php");
include_once("../classes/courses.class.php");

// moet niet
$code = array(

    "succes" => false,
    "error" => ""

);
// vanaf hier wel

try {
    $delete = new Courses();
    $delete->DeleteCourse($_POST["id"]);

}
catch (Exception $e){
    $code["error"] = $e->getMessage();
}

echo json_encode($code);