<?php 
require_once("../includes/database.php");

?>
<!-- <?php 
session_start();
include_once("../includes/database.php");





?> -->

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Reisinformatie</title>
     <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">

</head>

<body>
<?php 
require_once("../includes/header.php");
?>

    <main class="center main-contact">

        <div class="travel-grid">

            <?php /* foreach ($resultaten as $reis): ?>

            <div class="section-box">
                <p class="ticket-meta">Datum</p>
                 <h2 class="orbitron"><?php echo htmlspecialchars($reis['naam']) ?></h2>
                    <p class="td-sub midduim"><?php echo htmlspecialchars($reis['locatie']) ?></p>
                    <p class="font-gray small"><?php echo htmlspecialchars($reis['beschrijving']) ?></p>
                    <p class="btn"><?php echo htmlspecialchars($reis['prijs']) ?></p>
            </div>
            <?php endforeach; */?>
            <div class="section-box">
                <p class="ticket-meta">Datum</p>
                <h2 class="orbitron">naam<h2>
                        <p class="td-sub midduim">locatie</p>
                        <p class="font-gray small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid sed
                            assumenda eius veniam
                            iure,
                            illo veritatis provident repellendus, nulla autem et laborum rerum dolore sunt quas error
                            officia, nesciunt illum!</p>
                        <p class="btn">1234,34</p>
            </div>

            <travel-card name="123" location="1234" date="2345" info="12345" price="1234">
            </travel-card>


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
        <script src="../scripts/travel.js" defer></script>
</body>
</html>