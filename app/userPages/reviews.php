<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}
$user_id = ($_SESSION['user_id']);
$bericht = $_POST["bericht"];


// $sql = "SELECT * FROM reizen";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();

if (isset($_POST["submit"])) {

    $sql = "INSERT INTO recensies (`user_id`, `reis_id`, `bericht`) VALUES (:user_id, :reis_id  , :bericht)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":reis_id", $naam);
    $stmt->bindParam(":bericht", $bericht);
}

// $info = $stmt->fetchAll();
var_dump($_GET, $_POST)
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

        <div>
            <form action="post"  method="../userPages/reviews.php" class="login">
                <div class="login-veld">
                    <label>uw bericht over </label>
                    <textarea name="bericht" class="contact-textarea" placeholder="Schrijf hier uw bericht..."
                        required></textarea>
                </div>
                <input type="submit" name="submit" value="submit" class="login-btn">
            </form>
        </div>


        <!-- <div class="review-box">
            <p class="font-white roboto">sofia martin</p>
            <p class="small font-gray roboto">sunset music festival</p>
            <p class="line-above">superleuk lorem ipsum dolor sit amet </p>
        </div> -->


    </main>

    <?php
    require_once("../includes/footer.php");
    ?>


</body>

</html>