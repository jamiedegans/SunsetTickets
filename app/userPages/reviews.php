<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Reviews</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">

</head>

<body>
<?php 
include_once("../includes/header.php");
?>

    <main class="row-down review-container">
        <div class="review-container">
            <p class="orbitron font-gray small">festivallen reviews</p>
            <h1 class="orbitron">reviews & beoordelingen</h1>
       
        </div>

        <form action="post" class="collum">
            <input class="btn font-gray" type="text" placeholder="alle">
            <input class="btn font-gray" type="text" placeholder="alle scores">
        </form>






        <div class="review-box">
            <p class="font-white roboto">sofia martin</p>
            <p class="small font-gray roboto">sunset music festival</p>
            <p class="line-above">superleuk lorem ipsum dolor sit amet </p>
        </div>


    </main>
    
  <?php 
require_once("../includes/footer.php");
?>


</body>

</html>