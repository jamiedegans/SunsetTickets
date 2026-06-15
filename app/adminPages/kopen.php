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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>
<body>        
    <main class="center main-index">

    </main>
    <script>
        function myFunction() {

            location.replace("../userPages/policy.html");
        }
    </script>
</body>

</html>