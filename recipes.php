<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipes - Last meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="recipes.css">
</head>
<body>

<div class="wrapper">

<header>
    <?php include 'header.php'; ?>
</header>

<main class="container recipes-page">

    <section class="recipe-search">
        <h1>Pick your poison:</h1>

        <div class="search-bar">
            <input type="text" placeholder="Search recipes...">
            <button class="search-btn">🔍</button>
        </div>

        <div class="filters">

            <div class="filter">
                <button class="filter-btn">Diet</button>
                <ul class="filter-menu">
                    <li>Vegetarian</li>
                    <li>Vegan</li>
                    <li>Keto</li>
                    <li>Gluten-free</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Prep time</button>
                <ul class="filter-menu">
                    <li>Under 30 min</li>
                    <li>30–60 min</li>
                    <li>60+ min</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Difficulty</button>
                <ul class="filter-menu">
                    <li>Easy</li>
                    <li>Medium</li>
                    <li>Hard</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Cuisine</button>
                <ul class="filter-menu">
                    <li>Italian</li>
                    <li>American</li>
                    <li>Asian</li>
                    <li>French</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Flavor</button>
                <ul class="filter-menu">
                    <li>Sweet</li>
                    <li>Salty</li>
                    <li>Spicy</li>
                    <li>Sour</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Meal type</button>
                <ul class="filter-menu">
                    <li>Breakfast</li>
                    <li>Lunch</li>
                    <li>Dinner</li>
                    <li>Dessert</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Occasion</button>
                <ul class="filter-menu">
                    <li>Everyday</li>
                    <li>Party</li>
                    <li>Holiday</li>
                </ul>
            </div>

            <div class="filter">
                <button class="filter-btn">Allergens</button>
                <ul class="filter-menu">
                    <li>Nuts</li>
                    <li>Dairy</li>
                    <li>Eggs</li>
                    <li>Seafood</li>
                </ul>
            </div>

        </div>
    </section>

    <div class="recipes">
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20023027.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="toast.html">Avocado salmon toast</a></span>
            </div>
        </div>
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20023430.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="casserole.html">Сottage cheese casserole</a></span>
            </div>
        </div>
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20005619.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="curry-chicken-recipe.html">Curry chicken with rice</a></span>
            </div>
        </div>
        <div class="recipe-card">
        <img src="Screenshot%202026-01-26%20022340.png" alt="Dish image">
            <div class="recipe-card_content">
                <span><a href="chia.html">Chia pudding with mango</a></span>
            </div>
        </div>
    </div>

</main>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
