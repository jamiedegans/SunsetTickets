<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}
$user_id = ($_SESSION['user_id']);

$sql = "SELECT * FROM `users` WHERE id = :user_id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(":user_id", $user_id);


$stmt->execute();

$result = $stmt->fetchAll();
var_dump($result)

    ?>
<!-- keep it in right joins
  -->
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
                                <th>Festival</th>
                                <th>Pakket</th>
                                <th>Datum</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Sunset Music Festival
                                </td>
                                <td><span class="td-sub">Europa</span></td>
                                <td><span class="td-sub">13 Jul 2025</span></td>
                                <td><span class="btn green">Bevestigd</span></td>
                                <td><button class="btn gray">Details</button></td>
                            </tr>

                            <tr>
                                <td>
                                    Electric Dreams
                                </td>
                                <td><span class="td-sub">Amsterdam</span></td>
                                <td><span class="td-sub">20 Aug 2025</span></td>
                                <td><span class="btn red">In Behandeling</span></td>
                                <td><button class="btn gray">Details</button></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

            <div class="section-box">
                <div class="section-header">
                    <h3>Mijn Reviews</h3>
                    <button class="btn gray">Alle Tickets</button>
                </div>
                <div class="section-body">
                    <div class="ticket-grid">


                        <ticket-card name="zomerfeesten" location="Amsterdam" date="2023-08-20"></ticket-card>

                        <ticket-card name="zomerfeesten" location="Amsterdam" date="2023-08-20"></ticket-card>

                        <ticket-card name="zomerfeesten" location="Amsterdam" date="2023-08-20"></ticket-card>

                        <ticket-card name="zomerfeesten" location="Amsterdam" date="2023-08-20"></ticket-card>

                        <ticket-card name="zomerfeesten" location="Amsterdam" date="2023-08-20"></ticket-card>

                    </div>
                </div>
            </div>



    </div>


    </main>
    </div>
    <script src="../scripts/tickets.js" defer></script>
</body>

</html>