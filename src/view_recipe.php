<?php
require_once "config.php";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$recipe_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$result = $stmt->get_result();
$recipe = $result->fetch_assoc();

if (!$recipe) {
    die("Recipe not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($recipe['title']); ?> — Last meal</title>
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
            <h1><?php echo htmlspecialchars($recipe['title']); ?></h1>
            
            <p><?php echo nl2br(htmlspecialchars($recipe['description'])); ?></p>
        </div>

        <?php if (!empty($recipe['image'])): ?>
            <img src="<?php echo htmlspecialchars($recipe['image']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" width="500px">
        <?php else: ?>
            <img src="default_food.png" alt="No image available" width="500px"> 
        <?php endif; ?>

        <div class="ingredients">
            <h2>Ingredients</h2>
            <ul>
                <?php 
                if (!empty($recipe['ingredients'])) {
                    $ingredients_list = explode(", ", $recipe['ingredients']);
                    foreach ($ingredients_list as $item) {
                        echo "<li>" . htmlspecialchars(trim($item)) . "</li>";
                    }
                } else {
                    echo "<li>No ingredients listed</li>";
                }
                ?>
            </ul>
        </div>

        <div class="steps">
            <h2>Steps</h2>
            <ul>
                <?php 
                if (!empty($recipe['instructions'])) {
                    $steps_list = explode(" | ", $recipe['instructions']);
                    $counter = 1; 
                    
                    foreach ($steps_list as $step) {
                        if (trim($step) != '') {
                            echo "<li><b>" . $counter . ".</b> " . htmlspecialchars(trim($step)) . "</li>";
                            $counter++;
                        }
                    }
                } else {
                    echo "<li>No instructions provided</li>";
                }
                ?>
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