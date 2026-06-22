<?php
session_start();
include_once("../includes/database.php");
//vult in de fromm email en wachtwoord  uit de post


if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

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

if (isset($_POST["make"])) {

    $naam = $_POST["naam"];
    $achternaam = $_POST["achternaam"];
    $emailadress = $_POST["email"];
    $newwachtwoord = $_POST["wachtwoord"];
    // zet email into de users shit
    $sql = "INSERT INTO `users`(`naam`, `achternaam`, `email`, `wachtwoord`) VALUES (:naam, :achternaam, :email, :wachtwoord)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":naam", $naam);
    $stmt->bindParam(":achternaam", $achternaam);
    $stmt->bindParam(":email", $emailadress);
    $stmt->bindParam(":wachtwoord", $newwachtwoord);

    $stmt->execute();
}

if (isset($_POST["vergeet"])) {
    $email = $_POST["email"];
    $code = $_POST["code"];

    $sql = "SELECT * FROM `users` WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $check = $stmt->fetchAll();
    if (count($check) > 0) {
        $sql = "INSERT INTO `wachtwoordvergeten` (`email`, `code`) VALUES (:email, :code)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $code = $stmt->fetchAll();
    }
}

// if (isset($_POST["reset"])) {
//     $email = $_POST["email"];
//     $code = $_POST["code"];
//     $nieuwwachtwoord = $_POST["nieuwwachtwoord"];

//     $sql = "SELECT * FROM `wachtwoordvergeten` WHERE email = :email AND code = :code AND verloopdatum > NOW()";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindParam(":email", $email);
//     $stmt->bindParam(":code", $code);
//     $stmt->execute();
//     $reset = $stmt->fetchAll();
//     if (count($reset) > 0) {
//         $sql = "UPDATE `users` SET wachtwoord = :wachtwoord WHERE email = :email";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(":wachtwoord", $nieuwwachtwoord);
//         $stmt->bindParam(":email", $email);
//         $stmt->execute();
//         echo "Rows affected: " . $stmt->rowCount();
//     } else {
//          echo "Geen match gevonden - check email/code/verloopdatum";
//     }

// }

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
    <?php
    require_once("../includes/header.php");
    ?>

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

            <div id="form-container">


            </div>
        </div>
    </main>

    <script src="../scripts/codegenerator.js"></script>
    <script>
        const codeInput = document.getElementById("code");
        codeInput.value = makeCode();
    </script>

    <script src="../scripts/login.js"></script>
    <script>showLogin('login');</script>

</body>

</html>