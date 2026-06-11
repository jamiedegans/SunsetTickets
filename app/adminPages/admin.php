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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunsetTickets - admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <span class="orbitron">SunsentTickets</span>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="reizen.html">Reizen</a></li>
                <li><a href="about.html">over ons</a></li>
            </ul>
        </nav>
        <a class="btn black" href="../includes/logout.php"> logout</a>
    </header>
    <div class="page">
        <aside>
            <div class="sidebar-user">
                <h1>admin</h1>

            </div>

            <span class="line-above font-gray midduim">Menu</span>

            <ul class="roboto aside-nav">
                <li><a class="sidebar-link" href="#">Reizen</a></li>
                <li><a class="sidebar-link" href="#">gebruikers</a></li>
                <li><a class="sidebar-link" href="#">Uitloggen</a></li>
                <li><a class="sidebar-link" href="#">reviews</a></li>

            </ul>

        </aside>

        <main class="main-content">
            <div>
                <p class="orbitron">admin paneel</p>
            </div>

            <div class="section-box">
                <div class="section-header">
                    <h3>de reizen</h3>
                    <button class="btn gray">Alle Reizen</button>
                </div>
                <div class="section-body">
                    <table class="account-table">
                        <thead>
                            <tr>
                                <th>Festival</th>
                                <th>locatie</th>
                                <th>Datum</th>
                                <th>omzet</th>
                                <th>acties</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Sunset Music Festival
                                </td>
                                <td><span class="td-sub">Europa</span></td>
                                <td><span class="td-sub">13 Jul 2025</span></td>
                                <td><span class="td-sub">55000</span></td>

                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                            </tr>

                            <tr>
                                <td>
                                    Sunset Music Festival
                                </td>
                                <td><span class="td-sub">Europa</span></td>
                                <td><span class="td-sub">13 Jul 2025</span></td>
                                <td><span class="td-sub">55000</span></td>

                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                            </tr>
                            <tr>
                                <td>
                                    Sunset Music Festival
                                </td>
                                <td><span class="td-sub">Europa</span></td>
                                <td><span class="td-sub">13 Jul 2025</span></td>
                                <td><span class="td-sub">55000</span></td>

                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

            <div class="section-box">
                <div class="section-header">
                    <h3>de reviews</h3>
                    <button class="btn gray">Alle Reviews</button>
                </div>
                <div class="section-body">
                    <table class="account-table">
                        <thead>
                            <tr>
                                <th>gebruikers</th>
                                <th>Festival</th>

                                <th>acties</th>
                                <th></th>
                                <th>review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    sofia martin
                                </td>
                                <td><span class="td-sub">zomerfeesten</span></td>
                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                                <td><button class="btn gray">Details</button></td>
                            </tr>

                            <tr>
                                <td>
                                    sofia martin
                                </td>
                                <td><span class="td-sub">zomerfeesten</span></td>
                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                                <td><button class="btn gray">Details</button></td>

                            </tr>
                            <tr>
                                <td>
                                    sofia martin
                                </td>
                                <td><span class="td-sub">zomerfeesten</span></td>
                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                                <td><button class="btn gray">Details</button></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-box">
                <div class="section-header">
                    <h3>gebruikers</h3>
                    <button class="btn gray">Alle gebruikers</button>
                </div>
                <div class="section-body">
                    <table class="account-table">
                        <thead>
                            <tr>
                                <th>gebruikers</th>
                                <th>email</th>

                                <th>wachtwoord</th>
                                <th>acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    sofia martin
                                </td>
                                <td><span class="td-sub">2gamuil.com</span></td>
                                <td><span class="td-sub">wachtword</span></td>
                                <td><button class="btn gray">bewerk</button></td>
                                <td><button class="btn red">verwijder</button></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

        </main>
    </div>



    <script src="../scripts/tickets.js" defer></script>
</body>

</html>