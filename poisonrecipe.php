<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Share your poison — Last meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="poisonrecipe.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">

<header>
    <?php include 'header.php'; ?>
</header>

<section class="container">
    <div class="recipe-creator">
        <h1>Create a recipe</h1>
        <p>Time to share your diabolical ideas with the community!</p>

        <div class="image-upload">
            <div class="image-placeholder">
                <span>Drop image here</span>
            </div>
        </div>

        <form class="recipe-form">
            <div class="form-group">
                <label for="recipe-name">Recipe Name</label>
                <input type="text" id="recipe-name" placeholder="Enter recipe name">
            </div>

            <div class="form-group">
                <label for="recipe-description">Description</label>
                <textarea id="recipe-description" rows="4"
                    placeholder="Give a cool description for the recipe"></textarea>
            </div>

            <div class="form-group">
                <label for="recipe-ingredients">Ingredients</label>
                <textarea id="recipe-ingredients" rows="6"
                    placeholder="List ingredients, one per line"></textarea>
            </div>

            <div class="form-group">
                <label for="recipe-steps">Steps</label>
                <textarea id="recipe-steps" rows="8"
                    placeholder="Describe the steps, one per line"></textarea>
            </div>

            <div class="form-group">
                <label>Quick Tags</label>
                <div class="quick-tags">
                    <button type="button" class="tag-btn">15 min</button>
                    <button type="button" class="tag-btn">High-protein</button>
                    <button type="button" class="tag-btn">Keto</button>
                    <button type="button" class="tag-btn">Breakfast</button>
                    <button type="button" class="tag-btn">Chicken</button>
                    <button type="button" class="tag-btn tag-more">...</button>
                </div>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</section>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
