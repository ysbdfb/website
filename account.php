<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Witch account — Last meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="account.css">
</head>
<body>

<div class="wrapper">

<header>
    <?php include 'header.php'; ?>
</header>

<div class="username container">
    <h1>Glad you’re still with us,</h1>
    <h1>User name.</h1>
</div>

<div class="created-recipes container">
    <h2>Your <s>poisons</s> recipes</h2>
    <div class="recipes">
        <div class="recipe-card">
            <img src="Screenshot%202026-01-26%20005619.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="#">Curry chicken with rice</a></span>
            </div>
        </div>
    </div>
</div>

<div class="favorites container">
    <h2>Dishes Worth Dying For</h2>
    <div class="recipes">

        <div class="recipe-card">
            <img src="Screenshot%202026-01-26%20022340.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="#">Chia pudding with mango</a></span>
            </div>
        </div>

        <div class="recipe-card">
            <img src="Screenshot%202026-01-26%20023027.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="#">Avocado salmon toast</a></span>
            </div>
        </div>

        <div class="recipe-card">
            <img src="Screenshot%202026-01-26%20023430.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="#">Cottage cheese casserole</a></span>
            </div>
        </div>

    </div>
</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
