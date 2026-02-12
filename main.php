<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Last meal</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="wrapper">

<header>
    <?php include 'header.php'; ?>
</header>

<div class="hero container">
    <div class="hero--info">
        <h1>Feast… or Fate?</h1>
        <p>You never know what awaits you: a culinary masterpiece of a lifetime or that very last meal. Good luck.</p>
        <button class="btn">Recipes</button>
    </div>
    <img src="Screenshot%202026-01-24%20224635.png" 
         alt="Empty plate with question mark" 
         width="500" 
         height="301">
</div>

<div class="container popular">
    <h2>The Day’s Fate</h2>
    <div class="recipes">
        <div class="block">
            <img src="yogurt.jpg" alt="Breakfast picture">
            <span>Yogurt with fig & pistachios</span>
        </div>
        <div class="block">
            <img src="sandwich.jpg" alt="Lunch picture">
            <span>Turkey breast sandwich</span>
        </div>
        <div class="block">
            <img src="shrimps_noodles.jpg" alt="Dinner picture">
            <span>Spicy shrimp noodles</span>
        </div>
        <div class="block">
            <img src="chia.jpg" alt="Dessert picture">
            <span>Chia pudding</span>
        </div>
    </div>
</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
