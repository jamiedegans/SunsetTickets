<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get reis_id is van url anders gaat die kapot URL, reviews.php?reis_id=5
$reis_id = isset($_GET['reis_id']) ? $_GET['reis_id'] : null;

if (isset($_POST["submit"])) {
    $opmerking = $_POST["opmerking"];

    $sql = "INSERT INTO recensies (`user_id`, `reis_id`, `opmerking`) VALUES (:user_id, :reis_id, :opmerking)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":reis_id", $reis_id);
    $stmt->bindParam(":opmerking", $opmerking);
    $stmt->execute();
}


$sql = "SELECT recensies.id AS recensie_id, recensies.opmerking,
               users.naam,
         reizen.naam AS reis_naam, reizen.locatie, reizen.prijs
        FROM recensies
        JOIN users ON recensies.user_id = users.id
        JOIN reizen ON recensies.reis_id = reizen.id
        ORDER BY recensies.id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reviews = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Reviews</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    include_once("../includes/header.php");
    ?>

    <main class="row-down review-container">
        <div class="review-container">
            <p class="orbitron font-gray small">festivallen reviews</p>
            <h1 class="orbitron">reviews & beoordelingen</h1>

        </div>

        <div>
            <form action="../userPages/reviews.php?reis_id=<?= htmlspecialchars($reis_id) ?>" method="post"
                class="login">
                <div class="login-veld">
                    <label>uw bericht over </label>
                    <textarea name="opmerking" class="contact-textarea" placeholder="Schrijf hier uw bericht..."
                        required></textarea>
                </div>
                <input type="submit" name="submit" value="submit" class="login-btn">
            </form>
        </div>


        <?php foreach ($reviews as $review) { ?>
            <div class="review-box">
                <p class="font-white roboto"><?= htmlspecialchars($review['naam']) ?></p>
                <p class="small font-gray roboto"><?= htmlspecialchars($review['reis_naam']) ?></p>
                <p class="line-above"><?= htmlspecialchars($review['opmerking']) ?></p>
            </div>
        <?php } ?>

    </main>

    <?php
    require_once("../includes/footer.php");
    ?>


</body>

</html>