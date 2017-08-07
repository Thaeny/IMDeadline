<?php
/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 13/07/17
 * Time: 13:46
 */

session_start();
session_destroy();
header('Location: login.php');

?>