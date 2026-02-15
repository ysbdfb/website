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
        <h1>Avocado salmon toast</h1>
        <p>A fresh and healthy toast with creamy avocado and delicate smoked salmon.</p>
    </div>
    <img src="Screenshot%202026-01-26%20023027.png" alt="Dish image" width="500px">
    <div class="ingredients">
        <h2>Ingredients</h2>
        <ul>
            <li>Bread</li>
            <li>Smoked salmon</li>
            <li>Avocado</li>
            <li>Salt</li>
            <li>Peper</li>
            <li>Lemon juice</li>
        </ul>
    </div>
    <div class="steps">
        <h2>Steps</h2>
        <ul>
            <li><b>1.</b> Toast the bread until golden</li>
            <li><b>2.</b> Mash the avocado with salt and a little lemon juice</li>
            <li><b>3.</b> Spread the avocado on the toast</li>
            <li><b>4.</b> Top with smoked salmon</li>
            <li><b>5.</b> Season with black pepper and serve</li>
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