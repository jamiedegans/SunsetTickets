<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}

    if (isset($_POST['opslaan'])) {

    $naam = $_POST['naam'];
    $locatie = $_POST['locatie'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];

    $sql = "INSERT INTO reizen (`naam`, `locatie`, `beschrijving`, `prijs`) VALUES (:naam, :locatie, :beschrijving, :prijs)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":naam", $naam);
    $stmt->bindParam(":locatie", $locatie);
    $stmt->bindParam(":beschrijving", $beschrijving);
    $stmt->bindParam(":prijs", $prijs);
    $stmt->execute();


}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toevoegen</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>




<body>


    <main class="center main-index">
        <form method="post" action="../adminPages/create.php" class="login">

            <h2> Reis toevoegen</h2>
            <div class="login-veld">
                <label for="text">Naam</label>
                <input type="text" name="naam" ?>
            </div>

            <div class="login-veld">
                <label for="text">Locatie</label>
                <input type="text" name="locatie" ?>
            </div>


            <div class="login-veld">
                <label for="text">Beschrijving</label>
                <input type="text" name="beschrijving" ?>
            </div>


            <div class="login-veld">
                <label for="wachtwoord">Prijs</label>
                <input type="text" name="prijs" ?>
            </div>

            <input type="submit" name="opslaan" value="Reis opslaan" class="login-btn">
            <a href="../adminPages/admin.php" class="btn red">Terug</a>
        </form>
    </main>
</body>

</html>