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
        <h1>Сottage cheese casserole</h1>
        <p>A light and fluffy baked casserole made with cottage cheese. Soft inside, slightly golden on top — a classic comfort dish.</p>
    </div>
    <img src="Screenshot%202026-01-26%20023430.png" alt="Dish image" width="500px">
    <div class="ingredients">
        <h2>Ingredients</h2>
        <ul>
            <li>Cottage cheese</li>
            <li>Eggs</li>
            <li>Sugar</li>
            <li>Vanilla sugar</li>
            <li>Flour</li>
            <li>Butter</li>
        </ul>
    </div>
    <div class="steps">
        <h2>Steps</h2>
        <ul>
            <li><b>1.</b> Preheat the oven to 180°C</li>
            <li><b>2.</b> Mix cottage cheese with eggs, sugar, and vanilla</li>
            <li><b>3.</b> Add flour or semolina and stir until smooth</li>
            <li><b>4.</b> Grease a baking dish with butter and pour in the mixture</li>
            <li><b>5.</b> Bake for 35–40 minutes until golden</li>
            <li><b>6.</b> Let cool slightly and serve</li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>

    <script>
        document.querySelector('.burger').onclick = () => {
            document.querySelector('header nav').classList.toggle('active');
        };
    </script>
</div>
</body>
</html>