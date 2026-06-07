<?php
session_start();
include_once("../includes/database.php");
//vult in de fromm email en wachtwoord  uit de post
$email = $_POST["email"];
$password = $_POST["password"];


if (!isset($_POST["submit"])) {
    // bestaat deze gebruker check $email
    $sql = "SELECT * FROM `users` WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    //koppel de email aan de var voor veiligheid
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // als email bestaat check wachtwoord
    if (count($result) > 0) {
        if ($result[0]["wachtwoord"] === $password) {
            // Sla gebruiker op in sessie 
            $_SESSION['user_id'] = $result[0]['id'];
            $_SESSION['role'] = $result[0]['role'];
            header("Location: ../includes/pathway.php");

        } else {
            echo "email of wachtwoord verkeerd";
        }
    }
    // it both are true dan check dan zet de session op gebruiker 
    // en daarna verwijzen naar admin check dat het admin role coorect anders naar account
    echo "je bent in onze database maak een account";
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
                    <label for="email">E-MAILADRES</label>
                    <input type="email" name="email" placeholder="naam@voorbeeld.com">
                </div>

                <div class="login-veld">
                    <label for="wachtwoord">WACHTWOORD</label>
                    <input type="password" name="password" placeholder="I dunno">
                </div>

                <input type="submit" name="submit" value="INLOGGEN" class="login-btn">

                <div class="login-footer">
                    <input type="submit" name="fergot" value="Wachtwoord Vergeten?" class="btn black">
                    <input type="submit" name="make" value="Nog geen account?" class="btn red">
                </div>
            </form>

            <form id="form-container"></form>
            <script src="../scripts/login.js"></script>
        </div>
    </main>
</body>

</html>