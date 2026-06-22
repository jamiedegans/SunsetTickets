<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}
$user_id = ($_SESSION['user_id']);
$naam = $_POST["naam"];
$emailadress = $_POST["email"];
$bericht = $_POST["bericht"];


if (isset($_POST["submit"])) {

    $sql = "INSERT INTO berichten (`user_id`, `naam`, `email`, `bericht`) VALUES (:user_id, :naam, :email, :bericht)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":naam", $naam);
    $stmt->bindParam(":email", $emailadress);
    $stmt->bindParam(":bericht", $bericht);


    try {

        $stmt->execute();
        echo "SUCCES!";
    } catch (PDOException $e) {
        echo "fout!!!!!: " . $e;
    }

}
?>
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
   include_once("../includes/header.php");
    ?>

    <main class="main-contact">

        <div>
            <p class="label">Contact</p>
            <h2 class="orbitron">get in touch</h2>
        </div>
        <div>
            <form class="login" method="post" action="../userPages/contact.php">
                <h3 class="orbitron">stuur bericht</h3>

                <div class="login-veld">
                    <label class="orbition">Your Name</label>
                    <input name="naam" type="text" placeholder="naam" required />
                </div>

                <div class="login-veld">
                    <label>E-MAILADRES</label>
                    <input name="email" type="email" class="btn" placeholder="jan@example.com" required />
                </div>

                <div class="login-veld">
                    <label>uw bericht</label>
                    <textarea name="bericht" class="contact-textarea" placeholder="Schrijf hier uw bericht..."
                        required></textarea>
                </div>

                <input type="submit" class="btn red" name="submit" />
            </form>
        </div>
    </main>
    <?php
     include_once("../includes/header.php");
    ?>
    <script src="../scripts/tickets.js" defer></script>
</body>



</html>