<?php

$_SESSION['user_id'] = $user['id'];
$_SESSION['role'] = $role;

if ($role == 'admin') {
    header("location: adminPages/admin.php");
    exit();
} elseif ($role == 'worker') {
    header("location: userPages/account.php");
    exit();
}
?>