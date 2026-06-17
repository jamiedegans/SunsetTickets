<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}

if (isset($_POST['reis_id'])) {
    $reis_id = $_POST['reis_id'];
} else {
    $reis_id = $_GET['reis_id'];
}

if (isset($_POST['opslaan'])) {
    $naam = $_POST['naam'];
    $locatie = $_POST['locatie'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];


    $sql = "UPDATE reizen SET `naam` = :naam ,  `locatie` = :locatie ,  `beschrijving` = :beschrijving ,  `prijs` = :prijs WHERE `id` = :reis_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":reis_id", $reis_id);
    $stmt->bindParam(":naam", $naam);
    $stmt->bindParam(":locatie", $locatie);
    $stmt->bindParam(":beschrijving", $beschrijving);
    $stmt->bindParam(":prijs", $prijs);
    $stmt->execute();
}

$sql = "SELECT * FROM `reizen` WHERE id = :reis_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":reis_id", $reis_id);
$stmt->execute();
$result = $stmt->fetchAll();
$reis = $result[0];
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bewerken</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>




<body>


    <main class="center main-index">
        <form method="post" action="../adminPages/template.php" class="login">

            <h2> Reis bewerken</h2>
            <div class="login-veld">
                <label for="text">Naam</label>
                <input type="text" name="naam" value="<?php echo htmlspecialchars($reis['naam']) ?>">
            </div>

            <div class="login-veld">
                <label for="text">Locatie</label>
                <input type="text" name="locatie" value="<?php echo htmlspecialchars($reis['locatie']) ?>">
            </div>


            <div class="login-veld">
                <label for="text">Beschrijving</label>
                <input type="text" name="beschrijving" value="<?php echo htmlspecialchars($reis['beschrijving']) ?>">
            </div>


            <div class="login-veld">
                <label for="wachtwoord">Prijs</label>
                <input type="text" name="prijs" value="<?php echo htmlspecialchars($reis['prijs']) ?>">
            </div>

            <input type="hidden" name="reis_id" value="<?php echo htmlspecialchars($reis_id) ?>">
            <input type="submit" name="opslaan" value="Reis opslaan" class="login-btn">
            <a href="../adminPages/admin.php" class="btn red">Terug</a>
        </form>
    </main>
</body>

</html>