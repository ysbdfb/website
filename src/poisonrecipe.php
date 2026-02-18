<?php
require_once "config.php";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $ingredients = isset($_POST['ingredients'])
        ? implode(", ", array_filter($_POST['ingredients']))
        : "";

    $steps = isset($_POST['steps'])
        ? implode(" | ", array_filter($_POST['steps']))
        : "";
  
    $imagePath = '';
    if (isset($_FILES['recipe_image']) && $_FILES['recipe_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; 
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $tmpName = $_FILES['recipe_image']['tmp_name'];
        $fileName = basename($_FILES['recipe_image']['name']);
        $targetFile = $uploadDir . time() . '_' . $fileName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $stmt = $conn->prepare("INSERT INTO recipes (title, ingredients, instructions, description, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $ingredients, $steps, $description, $imagePath);

    $stmt->execute();
    $stmt->close();

    header("Location: poisonrecipe.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Share your poison — LastMeal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="poisonrecipe.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .add-btn {
            background-color: #eee;
            border: 1px dashed #333;
            color: #333;
            padding: 8px 15px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .add-btn:hover {
            background-color: #ddd;
            border-color: #000;
        }
        .ingredient-item, .step-item {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <hr>

    <section class="container">
        <div class="recipe-creator">
            <h1>Create a recipe</h1>
            <p>Time to share your diabolical ideas with the community!</p>

            <form method="POST" action="" class="recipe-form" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-column">

                        <div class="form-group">
                            <label>Recipe Name</label>
                            <input type="text" name="title" placeholder="Enter recipe name" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="4" placeholder="Describe your recipe" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="recipe_image" accept="image/*">
                        </div>

                    </div>
                </div>

                <div class="ingredients-steps">

                    <div class="form-group">
                        <label>Ingredients</label>
                        <div class="ingredients-list" id="ingredients-container">
                            <div class="ingredient-item">
                                <input type="text" name="ingredients[]" placeholder="Ingredient 1">
                            </div>
                        </div>
                        <button type="button" class="add-btn" onclick="addIngredient()">+ Add Ingredient</button>
                    </div>

                    <div class="form-group">
                        <label>Steps</label>
                        <div class="steps-list" id="steps-container">
                            <div class="step-item">
                                <textarea name="steps[]" rows="2" placeholder="Step 1 description"></textarea>
                            </div>
                        </div>
                         <button type="button" class="add-btn" onclick="addStep()">+ Add Step</button>
                    </div>

                    <button type="submit" name="submit" class="btn" style="margin-top: 20px;">Submit Recipe</button>

                </div>

            </form>

        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        document.querySelector('.burger').onclick = () => {
            document.querySelector('header nav').classList.toggle('active');
        };

        function addIngredient() {
            const container = document.getElementById('ingredients-container');
            
            const newDiv = document.createElement('div');
            newDiv.classList.add('ingredient-item');
            
            const count = container.children.length + 1;
            
            newDiv.innerHTML = `<input type="text" name="ingredients[]" placeholder="Ingredient ${count}">`;
            
            container.appendChild(newDiv);
        }

        function addStep() {
            const container = document.getElementById('steps-container');
            const newDiv = document.createElement('div');
            newDiv.classList.add('step-item');
            
            const count = container.children.length + 1;
            
            newDiv.innerHTML = `<textarea name="steps[]" rows="2" placeholder="Step ${count} description"></textarea>`;
            
            container.appendChild(newDiv);
        }
    </script>
</body>
</html>
