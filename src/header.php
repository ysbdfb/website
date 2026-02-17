<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>

<header class="container">
    <span class="lastmeal"><a href="index.php">Last Meal</a></span>
    <nav>
        <ul>
            <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>"><a href="index.php">Home</a></li>
            <li class="<?= ($current_page == 'recipes.php') ? 'active' : '' ?>"><a href="recipes.php">Recipes</a></li>
            <li class="<?= ($current_page == 'poisonrecipe.php') ? 'active' : '' ?>"><a href="poisonrecipe.php">Share your poison</a></li>

            <?php if (isset($_SESSION['user'])): ?>
                <li class="<?= ($current_page == 'account.php') ? 'active' : '' ?>"><a href="account.php">Account</a></li>
                <li><a href="logout.php">Farewell...</a></li> 
            <?php else: ?>
                <li class="<?= ($current_page == 'account.php') ? 'active' : '' ?>"><a href="account.php">Join the feast</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>

