<?php
session_start();
include_once("../includes/database.php");



if(isset($_POST["submit"])){


$email = $_POST["email"];
$password = $_POST["password"];

echo $password;
echo $email;

// bestaat deze gebruker check $email


// if true dan check het wachtwoord

// it both are true dan check dan zet de session op gebruiker 

// en daarna verwijzen naar admin check dat het admin role coorect anders naar account

 var_dump($_POST);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Inloggen</title>
     <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
    <header>
         <span>SunsentTickets</span>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="reizen.html">Reizen</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="center">
            <div class="orbitron">
                <div class="login-welcome-box"> 
                    <span>SunsentTickets</span>
                    <h1>Inloggen</h1>
                    <p>Welkom . Log in op jouw account.</p>    
                </div>
            </div>    
        </div>
        <div class="center"> 

            <form method="post" action="../adminPages/login.php" class="login">
                <div class="login-veld">
                    <label for="email">E-MAILADRES</label>
                    <input type="email" name="email" placeholder="naam@voorbeeld.com">
                </div>

                <div class="login-veld">
                    <label for="wachtwoord">WACHTWOORD</label>
                    <input type="password" name="password" placeholder="I dunno">
                </div>

                <input type="submit" value="submit" class="login-btn">INLOGGEN</input>

                <div class="login-footer">
                    <span>Wachtwoord Vergeten?</span>
                    <span>Nog geen account?</span>
                </div>
            </form>

        </div>    
    </main>
</body>

</html>