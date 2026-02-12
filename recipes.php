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

    <section class="recipes-grid">
        <article class="recipe-card">
            <img src="yogurt.jpg" alt="Breakfast picture">
            <h3>Yogurt with fig & pistachios</h3>
        </article>

        <article class="recipe-card">
            <img src="sandwich.jpg" alt="Lunch picture">
            <h3>Turkey breast sandwich</h3>
        </article>

        <article class="recipe-card">
            <img src="shrimps_noodles.jpg" alt="Dinner picture">
            <h3>Spicy shrimp noodles</h3>
        </article>

        <article class="recipe-card">
            <img src="chia.jpg" alt="Dessert picture">
            <h3>Chia pudding</h3>
        </article>
    </section>

</main>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
