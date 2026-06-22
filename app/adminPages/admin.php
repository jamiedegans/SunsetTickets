<?php
session_start();
include_once("../includes/database.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}




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

$sql = "SELECT users.naam, reizen.locatie FROM boekingen
 JOIN users 
 ON boekingen.user_id = users.id 
 JOIN reizen 
 ON boekingen.reis_id = reizen.id";
 
$stmt = $pdo->prepare($sql);
$stmt->execute();
$boekingen = $stmt->fetchAll();

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
                <li><a href="../userPages/index.php">Home</a></li>
                <li><a href="../userPages/reisinformatie.php">Reizen</a></li>
                <li><a href="../userPages/about.php">over ons</a></li>
            </ul>
            <form action="../adminPages/admin.php" method="GET">
                <input class="btn white" type="text" name="zoekterm" placeholder="search">
                <button class="btn gray" type="btn">Zoeken</button>
            </form>
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
                <form method="POST" action="../adminPages/create.php">
                <button class="btn gray" type="btn">Toevoegen</button>
                </form>
                </div>
                <div class="section-body">
                    <table class="account-table">
                        <thead>
                            <tr>
                                <th>Festival - naam</th>
                                <th>locatie </th>
                                <th>beschrijving</th>
                                <th>omzet - prijs</th>
                                <th>acties</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultaten as $reis) { ?>
                                <tr>
                                    <td>
                                        <span><?php echo htmlspecialchars($reis['naam']) ?></span>
                                    </td>
                                    <td><span class="td-sub"><?php echo htmlspecialchars($reis['locatie']) ?></span></td>
                                    <td><span class="td-sub"><?php echo htmlspecialchars($reis['beschrijving']) ?></span></td>
                                    <td><span class="td-sub"><?php echo htmlspecialchars($reis['prijs']) ?></span></td>
                                    <td>
                                        <form method="POST" action="../adminPages/template.php">
                                            <input type="hidden" name="reis_id" value="<?php echo $reis['id'] ?>">
                                            <button name="submit"  class="btn red">BEWERKEN</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="../adminPages/delete.php">
                                            <input type="hidden" name="reis_id" value="<?php echo $reis['id'] ?>">
                                            <button class="btn red">verwijder</button>
                                        </form>
                                    </td>
                                        
                                </tr>
                            <?php }; ?>




                        </tbody>
                    </table>
                </div>

            </div>

            <div class="section-box">
                <div class="section-header">
                    <h3>Boekingen</h3>
                </div>
                <div class="section-body">
                    <table class="account-table">
                        <thead>
                            <tr>
                                <th>gebruikers</th>
                                <th>Festival</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($boekingen as $boeking) { ?>
                            <tr>
                                <td>
                                    <?php echo htmlspecialchars($boeking['naam']) ?>
                                </td>
                                <td><span class="td-sub"><?php echo htmlspecialchars($boeking['locatie']) ?></span></td>
                                
                              
                            </tr>
                            <?php }; ?>
                       
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