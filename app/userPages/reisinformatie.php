<?php
require_once("../includes/database.php");


$sql = "SELECT * FROM reizen";
$statement = $pdo->prepare($sql);
$statement->execute();
$resultaten = $statement->fetchAll();

if(isset($_POST["submit"])){
    
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Reisinformatie</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="../scripts/travel.js" defer></script>
</head>

<body>
    <?php
    require_once("../includes/header.php");
    ?>
    <main class="center main-contact">

        <div class="travel-grid">


            <?php foreach ($resultaten as $reis): ?>
       
                <div class="section-box">
                    <p class="midduim font-gray">
                        <?php echo htmlspecialchars($reis['locatie']) ?>
                    </p>
                    <p class="midduim orbitron"><?php echo htmlspecialchars($reis['naam']) ?></p>
                    <p class="font-gray small"><?php echo htmlspecialchars($reis['beschrijving']) ?></p>
                    <div class="login-veld">
                        <p class="btn"><?php echo htmlspecialchars($reis['prijs']) ?></p>
                         <input type="submit" name="submit" value="kaartje kopen" class="btn red">
                    </div>
                </div>




            <?php endforeach; ?>


        </div>
    </main>

    <footer class="small center">
        <div class="row-right">
            <div class="row-down">
                <h2 class="orbitron"> SunsetTickets </h2>
                <p>Your festival travel companion for <br> unforgettable music <br> experiences around the world.</p>
            </div>
            <div class="row-down font-gray">
                <h3 class="orbitron">Contact</h3>
                <p>Email: info@sunsettickets.com</p>
                <p>Phone: +31 123 456 789</p>
            </div>
            <div class="row-down font-gray">
                <h3 class="orbitron">Pages</h3>
                <p><a href="index.html">Home</a></p>
                <p><a href="reizen.html">Reizen</a></p>
                <p><a href="about.html">over ons</a></p>
            </div>
        </div>

        <p class="center font-gray small">&copy; 2024 SunsetTickets. All rights reserved.</p>
    </footer>

</body>

</html>