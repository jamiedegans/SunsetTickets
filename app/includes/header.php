<header>
    <span class="orbitron">SunsentTickets</span>
    <nav>
        <ul>
            <li><a href="../userPages/index.php">Home</a></li>
            <li><a href="../userPages/reisinformatie.php">Reizen</a></li>
            <li><a href="../userPages/about.php">Over ons</a></li>
        </ul>
    </nav>

    <form action="reisinformatie.php" method="GET">
        <input class="btn white" type="text" name="zoekterm" placeholder="search" required>
        <button class="btn gray" type="submit">Zoeken</button>
    </form>

<?php if (isset($_SESSION['user_id'])): ?>
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <a class="btn black" href="../adminPages/admin.php">Admin</a>
    <?php else: ?>
        <a class="btn black" href="../userPages/account.php">Account</a>
    <?php endif; ?>
    <a class="btn gray" href="../includes/logout.php">Logout</a>
<?php else: ?>
    <a class="btn black" href="../adminPages/login.php">Login</a>
<?php endif; ?>
</header>