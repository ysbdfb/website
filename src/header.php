<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$full_path   = $_SERVER['PHP_SELF'];
$is_in_admin = strpos($full_path, '/admin/') !== false || basename(dirname($full_path)) === 'admin';
$base        = $is_in_admin ? '../' : '';

$current_page = basename($full_path);
if ($is_in_admin) {
    $current_page = 'admin'; 
}
?>
<header class="container">
    <span class="lastmeal"><a href="<?php echo $base; ?>index.php">Last Meal</a></span>
    
    <nav>
        <ul>
            <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>"><a href="<?php echo $base; ?>index.php">Home</a></li>
            <li class="<?= ($current_page == 'recipes.php') ? 'active' : '' ?>"><a href="<?php echo $base; ?>recipes.php">Recipes</a></li>
            <li class="<?= ($current_page == 'poisonrecipe.php') ? 'active' : '' ?>"><a href="<?php echo $base; ?>poisonrecipe.php">Share your poison</a></li>

            <?php if (isset($_SESSION['user'])): ?>  
                <li class="<?= ($current_page == 'account.php') ? 'active' : '' ?>"><a href="<?php echo $base; ?>account.php">Account</a></li>
                
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="<?php echo $base; ?>admin/index.php" style="color:#ff4444; font-weight:bold;">ADMIN PANEL</a></li>
                <?php endif; ?>
                
                <li><a href="<?php echo $base; ?>logout.php">Farewell...</a></li>
            <?php else: ?>
                <li class="<?= ($current_page == 'account.php') ? 'active' : '' ?>"><a href="<?php echo $base; ?>account.php">Join the feast</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>