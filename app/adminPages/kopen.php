<?php
session_start();
require_once("../includes/database.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../adminPages/login.php");
    exit();
}

$reis_id = $_GET['reis_id'];
$user_id = $_SESSION['user_id'];

var_dump($user_id, $reis_id)

?>