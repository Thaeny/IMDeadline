<?php

session_start();

include_once("../classes/db.class.php");
include_once("../classes/tasks.class.php");

// moet niet
$code = array(

    "succes" => false,
    "error" => ""

);
// vanaf hier wel

try {
    $delete = new Tasks();
    $delete->DeleteTask($_POST["id"]);

}
catch (Exception $e){
    $code["error"] = $e->getMessage();
}

echo json_encode($code);