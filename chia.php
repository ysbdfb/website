


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
        <h1>Chia pudding with mango</h1>
        <p>A light and refreshing chia pudding made with creamy chia seeds and sweet ripe mango. Healthy and naturally sweet.</p>
    </div>
    <img src="Screenshot%202026-01-26%20022340.png" alt="Dish image" width="500px">
    <div class="ingredients">
        <h2>Ingredients</h2>
        <ul>
            <li>Chia seeds</li>
            <li>Milk</li>
            <li>Mango</li>
            <li>Honey or maple syrup</li>
        </ul>
    </div>
    <div class="steps">
        <h2>Steps</h2>
        <ul>
            <li><b>1.</b> Mix chia seeds with milk and sweetener</li>
            <li><b>2.</b> Refrigerate for at least 3–4 hours or overnight</li>
            <li><b>3.</b> Blend or chop the mango</li>
            <li><b>4.</b> Serve the chia pudding topped with fresh mango</li>
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