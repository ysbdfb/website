<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Last meal</title>
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">

<?php include 'header.php'; ?>

<hr>

<div class="hero container">
    <div class="hero--info">
        <h1>Feast… or Fate?</h1>
        <p>You never know what awaits you: a culinary masterpiece of a lifetime or that very last meal. Good luck.</p>
        <button class="btn"><a href="recipes.php">Recipes</a></button>
    </div>

</div>

<div class="container popular">
    <h2>The Day’s Fate</h2>
    <div class="recipes">
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20023027.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="toast.php">Avocado salmon toast</a></span>
            </div>
        </div>
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20023430.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="casserole.php">Сottage cheese casserole</a></span>
            </div>
        </div>
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20005619.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="curry-chicken-recipe.php">Curry chicken with rice</a></span>
            </div>
        </div>
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20022340.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="chia.php">Chia pudding with mango</a></span>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>

<script>
    document.querySelector('.burger').onclick = () => {
        document.querySelector('header nav').classList.toggle('active');
    };
</script>
</body>
</html>