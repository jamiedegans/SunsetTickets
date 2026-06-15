<?php
 session_start();
include_once("../includes/database.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../adminPages/login.php");
    exit();
}


$reis_id = $_GET['reis_id'];

$sql = "SELECT * FROM `reizen` WHERE id = :reis_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":reis_id", $reis_id);
$stmt->execute();
$result = $stmt->fetchAll();

?>
  
  
  <form method="post" action="../adminPages/login.php" class="login">

                <h2> Reis toevoegen</h2>
                <div class="login-veld">
                    <label for="text">Naam</label>
                    <input type="text" name="naam">
                </div>

                <div class="login-veld">
                    <label for="text">Locatie</label>
                    <input type="text" name="locatie">
                </div>


                <div class="login-veld">
                    <label for="text">Beschrijving</label>
                    <input type="text" name="beschrijving">
                </div>


                <div class="login-veld">
                    <label for="wachtwoord">Prijs</label>
                    <input type="text" name="prijs">
                </div>
                <input type="submit" name="make" value="Reis toevoegen" class="login-btn">
                <button class="btn red" onclick="showAdmin('admin')">Terug</button>
            </form>