<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}
$user_id = ($_SESSION['user_id']);
$reis_id = $_GET['reis_id'];

$sql = "SELECT * FROM `users` WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();
$result = $stmt->fetchAll();

if (!isset($_POST['joy'])) {
    $sql = "SELECT boekingen.*, reizen.naam, reizen.locatie, reizen.prijs 
        FROM `boekingen` 
        JOIN `reizen` ON boekingen.reis_id = reizen.id 
        WHERE boekingen.user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
}
// boekingen.* pakt alle kolommen uit boekingen
// de join maakr eigenlijk een tweede query in de eerste pakt de extra info uit de query
// JOIN  ON boekingen.reis_id = reizen.id zegt: koppel deze waar de reis id en reis in bookings gelijk is 
// we vergelijken nu de id id van reizen en halen op de info van boekingen




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
    <div class="page">
        <aside>
            <div class="sidebar-user">
                <!-- <div class="avatar"> <?php echo $result[0]['naam'] ?> </div> -->
                <h1><?php echo $result[0]['achternaam']; ?></h1>

            </div>

            <span class="line-above font-gray midduim">Menu</span>

            <ul class="roboto aside-nav">
                <li><a class="sidebar-link" href="#">Mijn Reizen</a></li>
                <li><a class="sidebar-link" href="#"> MIJN tickets</a></li>
                <li><a class="sidebar-link" href="#">Uitloggen</a></li>
            </ul>

        </aside>

        <main class="main-content">
            <div>
                <p class="orbitron">welkom terug, sofia</p>
            </div>

            <div class="section-box">
                <div class="section-header">
                    <h3>Mijn Reizen</h3>
                    <button class="btn gray">Alle Reizen</button>
                </div>
                <div class="section-body">
                    <table class="account-table">
                        <thead>
                            <tr>
                                <th>Festival - Naam</th>
                                <th>Locatie - Land</th>
                                <th>Winkelwagen - wachtrij</th>
                                <th>Status</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($bookings !== null) {
                                foreach ($bookings as $travels) { ?>

                                    <tr>
                                        <td>
                                            <?php echo htmlspecialchars($travels['naam']) ?>
                                        </td>
                                        <td><span class="td-sub"><?php echo htmlspecialchars($travels['locatie']) ?></span></td>
                                        <td><button class="td-sub btn" name="kopen">kopen</button></td>
                                        <?php if ($travels['status'] == "Bevestigd") {
                                            ?>
                                            <td><span class="btn green"><?php echo htmlspecialchars($travels['status']) ?></span>
                                            </td>

                                        <?php } else { ?>
                                            <td><span class="btn red"><?php echo htmlspecialchars($travels['status']) ?></span>
                                            </td>
                                         <?php } ?>


                                    </tr>
                                <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="section-box">
                <div class="section-header">
                    <h3>Mijn Tickets</h3>
                    <button class="btn gray">Alle Tickets</button>
                </div>
                <div class="section-body">
                    <div class="ticket-grid">


                        <ticket-card name="zomerfeesten" location="Amsterdam"></ticket-card>

                        <ticket-card name="zomerfeesten" location="Amsterdam"></ticket-card>

                    </div>
                </div>
            </div>



    </div>


    </main>
    </div>
    <script src="../scripts/tickets.js" defer></script>
</body>

</html>