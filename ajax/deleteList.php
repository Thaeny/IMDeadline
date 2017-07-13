<?php

session_start();

include_once("../classes/db.class.php");
include_once("../classes/lists.class.php");

// moet niet
$code = array(

    "succes" => false,
    "error" => ""

);
// vanaf hier wel

try {
    $delete = new Lists();
    $delete->DeleteList($_POST["id"]);

}
catch (Exception $e){
    $code["error"] = $e->getMessage();
}

echo json_encode($code);