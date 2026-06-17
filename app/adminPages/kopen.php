<?php
session_start();
require_once("../includes/database.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../adminPages/login.php");
    exit();
}

$reis_id = $_GET['reis_id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM `reizen` WHERE id = :reis_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":reis_id", $reis_id);
$stmt->execute();
$resultaten = $stmt->fetchAll();

var_dump($user_id, $reis_id, $resultaten)
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
    <main class="center main-index">

    <h1>kan je vinden op account je ticket</h1>

        <?php foreach ($resultaten as $reis): ?>

            <div class="section-box">
                <p class="midduim font-gray roboto">
                    <?php echo htmlspecialchars($reis['locatie']) ?>
                </p>
                <p class="midduim orbitron"><?php echo htmlspecialchars($reis['naam']) ?></p>
                <p class="font-gray small"><?php echo htmlspecialchars($reis['beschrijving']) ?></p>
                <div class="login-veld">
                    <form method="GET" action="../userPages/account.php">
                        <input type="hidden" name="reis_id" value="<?php echo $reis['id'] ?>">
                        <p class="btn">€ <?php echo htmlspecialchars($reis['prijs']) ?></p>
                        <button type="submit" class="btn red">tickets kopen</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
    <script>
        function myFunction() {

            location.replace("../userPages/policy.html");
        }
    </script>
</body>

</html>