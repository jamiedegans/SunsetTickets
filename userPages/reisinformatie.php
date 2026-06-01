<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Reisinformatie</title>
    <link rel="stylesheet" href="../app/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <span class="orbitron">SunsentTickets</span>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="reizen.html">Reizen</a></li>
            </ul>
        </nav>

        <?php
        // Je zet altijd een zoek term bovenaan je PHP, na include_once('database.php')
        $zoekterm = trim($_GET['search'] ?? '');
        $zoekWildcard = '%' . $zoekterm . '%';
        ?>

        <span class="btn black"> login</span>
    </header>

    <main class="main-contact ">
        <div class="container">
            <div class="label">Update & Tips</div>
            <h1>Reisinformatie</h1>
            <p>Nieuws, tips en updates over festivals en reizen</p>
        </div>

        <div class="container">
            <span>Festival Info</span>

            <div class="reis-card">
                <div class="reis-card">
                    <h3 class="orbitron">Titel</h3>
                    <p class="font-gray small">Dit is een reis.</p>
                </div>
            </div>
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