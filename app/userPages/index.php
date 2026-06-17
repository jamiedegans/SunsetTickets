<?php
 session_start();
 require_once("../includes/database.php");

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
    <?php
   include_once("../includes/header.php");
    ?>

    <main class="center main-index">
        <p class="font-gray">Festival Travel Ervaring</p>
        <h1 class="orbitron font-white">Jou Festival
            Advontuur
            Starts Hier</h1>
        <p class="font-gray">All-inclusive festival reis pakket. Muziek, cultuur & onvergeetbare momenten worldenwijd.
        </p>

        <a class="btn white" href="../userPages/reisinformatie.php">Boeken</a>
        <a class="btn black" href="../userPages/about.php">over ons</a>

    </main>


    <?php
    require_once("../includes/footer.php");
    ?>



    <script>
        function myFunction() {

            location.replace("../userPages/policy.php");
        }
    </script>
</body>

</html>