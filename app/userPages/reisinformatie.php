<?php
session_start();
require_once("../includes/database.php");

if (isset($_GET["zoekterm"])) {
    $zoekterm = $_GET["zoekterm"];
} else {
    $zoekterm = "";
}

if ($zoekterm == "") {
    $sql = "SELECT * FROM reizen";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} else {
    $sql = "SELECT * FROM reizen WHERE naam like :zoekterm OR locatie like :zoekterm2";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":zoekterm" => '%' . $zoekterm . '%',
        ":zoekterm2" => '%' . $zoekterm . '%'
    ]);
}
$resultaten = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Reisinformatie</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="../scripts/travel.js" defer></script>
</head>

<body>
    <?php
    include_once("../includes/header.php");
    ?>
    <main class="center main-contact">

        <div class="travel-grid">


            <?php foreach ($resultaten as $reis): ?>

                <div class="section-box">
                    <p class="midduim font-gray roboto">
                        <?php echo htmlspecialchars($reis['locatie']) ?>
                    </p>
                    <p class="midduim orbitron"><?php echo htmlspecialchars($reis['naam']) ?></p>
                    <p class="font-gray small"><?php echo htmlspecialchars($reis['beschrijving']) ?></p>
                    <div class="login-veld">
                        <form method="GET" action="../adminPages/kopen.php">
                            <input type="hidden" name="reis_id" value="<?php echo $reis['id'] ?>">
                            <p class="btn">€ <?php echo htmlspecialchars($reis['prijs']) ?></p>
                            <button type="submit" class="btn red">tickets kopen</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </main>

    <?php
    require_once("../includes/footer.php");
    ?>

</body>

</html>