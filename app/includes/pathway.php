<?php
session_start();

// the bouncer van de code 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// check dat rol goed is uit de session
$role = $_SESSION['role'];

// dan check hier voor veiligheid
if ($role == 'admin') {
    header("Location: ../adminPages/admin.php");
    exit();
} elseif ($role == 'user') {
    header("Location: ../userPages/account.php");
    exit();
} else {
    // Onbekende rol
    header("Location:../userPages/index.php");
    exit();
}
?>