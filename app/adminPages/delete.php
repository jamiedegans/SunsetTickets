<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}

$reis_id = $_POST['reis_id'];

$sql = "DELETE FROM reizen WHERE id = :reis_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":reis_id", $reis_id);
$stmt->execute();

header("location: ../adminPages/admin.php");
exit();