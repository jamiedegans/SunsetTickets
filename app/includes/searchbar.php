<?php 
$zoekterm = isset($_GET['zoekterm']) ? trim($_GET['zoekterm']): '';
$resultaten = [];

if ($zoekterm !== '') {
    $sql = "SELECT * FROM reizen
    WHERE naam LIKE :zoekterm
    OR locatie LIKE :zoekterm";

    $statement = $pdo->prepare($sql);
    $statement->execute([':zoekterm' => '%' . $zoekterm . '%']);
    $resultaten = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>