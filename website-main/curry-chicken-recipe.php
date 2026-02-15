<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Last meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="recipe-instructions.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">

<?php include 'header.php'; ?>

<hr>

<div class="recipe-instructions container">
    <div class="recipe--info">
        <h1>Curry chicken with rice recipe</h1>
        <p>Juicy chicken cooked in a creamy curry sauce, served with soft, fluffy rice. Simple, warm, and satisfying.</p>
    </div>
    <img src="Screenshot%202026-01-26%20005619.png" alt="Dish image" width="500px">
    <div class="ingredients">
        <h2>Ingredients</h2>
        <ul>
            <li>Chicken breast</li>
            <li>Rice</li>
            <li>Onion</li>
            <li>Garlic</li>
            <li>Curry powder</li>
            <li>Coconut milk</li>
            <li>Cooking oil</li>
            <li>Salt</li>
            <li>Pepper</li>
        </ul>
    </div>
    <div class="steps">
        <h2>Steps</h2>
        <ul>
            <li><b>1.</b> Cook the rice and set aside</li>
            <li><b>2.</b> Fry chopped onion and garlic in oil until soft</li>
            <li><b>3.</b> Add curry powder and stir for a few seconds</li>
            <li><b>4.</b> Add chicken pieces and cook until lightly golden</li>
            <li><b>5.</b> Pour in coconut milk, season with salt and pepper</li>
            <li><b>6.</b> Simmer for 15–20 minutes and serve with rice</li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>

</div>
    <script>
        document.querySelector('.burger').onclick = () => {
            document.querySelector('header nav').classList.toggle('active');
        };
    </script>
</body>
</html>