<?php
$host = 'db';
$db = 'mydatabase';
$user = 'user';
$password = 'password';
$charset = 'utf8mb4';
//opties
$opties = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
  $pdo = new PDO($dsn, $user, $password, $opties);
  // echo "Database connection goed <br/>";
} catch (PDOException $e) {
  echo $e->getMessage();
  die("sorry, database probleem");
}
?>