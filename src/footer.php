<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$is_in_admin = strpos($_SERVER['PHP_SELF'], '/admin/') !== false || 
               basename(dirname($_SERVER['PHP_SELF'])) === 'admin';

$base = $is_in_admin ? '../' : '';
?>

<footer>
    <div class="blocks container">
        <div>
            <span class="lastmeal">LAST MEAL</span>
        </div>
        <div>
            <h3>About us</h3>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Home</a></li>
                <li><a href="<?php echo $base; ?>recipes.php">Recipes</a></li>
                <li><a href="<?php echo $base; ?>poisonrecipe.php">Share your poison</a></li>
                <li><a href="<?php echo $base; ?>account.php">Witch account</a></li>
            </ul>
        </div>
        <div>
            <h3>Contact us</h3>
            <ul>
                <li>denis.anderson@student.hamk.fi</li>
                <li>martin.pevgonen@student.hamk.fi</li>
                <li>jekaterina.zasijenko@student.hamk.fi</li>
            </ul>
        </div>
    </div>
</footer>
