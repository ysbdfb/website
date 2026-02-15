<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Last meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="account.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="wrapper">

<?php include 'header.php'; ?>

<hr>
<div class="username container">
    <h1>Glad you’re still with us,</h1>
    <h1>User name.</h1>
    <hr>
</div>

<div class="created-recipes container">
    <h2>Your <s>poisons</s> recipes</h2>
    <div class="recipes">
    <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20005619.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="curry-chicken-recipe.php">Curry chicken with rice</a></span>
            </div>
    </div>
    </div>
    <hr>
</div>

<div class="favorites container">
    <h2>Favorites</h2>
    <div class="recipes">
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20022340.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="chia.php">Chia pudding with mango</a></span>
            </div>
    </div>

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