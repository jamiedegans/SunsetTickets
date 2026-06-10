



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Account</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
<?php 
require_once("../includes/header.php");
?>
    
    <main class="main-contact">

        <div>
            <p class="label">Contact</p>
            <h2 class="orbitron">get in touch</h2>
        </div>
        <div>
            <form class="login" id="contact-form" onsubmit="handleContact(event)">
                <h3 class="orbitron">stuur bericht</h3>

                <div class="login-veld">
                    <label class="orbition">Your Name</label>
                    <input type="text" placeholder="naam" required />
                </div>

                <div class="login-veld">
                    <label>E-MAILADRES</label>
                    <input type="email" class="btn" placeholder="you@example.com" required />
                </div>

                <div class="login-veld">
                    <label>uw bericht</label>
                    <textarea class="contact-textarea" placeholder="Schrijf hier uw bericht..." rows="5"
                        required></textarea>
                </div>

                <button type="submit" class="btn red">Verstuur</button>
            </form>
        </div>
    </main>
<?php 
require_once("../includes/header.php");
?>
    <script src="../scripts/tickets.js" defer></script>
</body>



</html>