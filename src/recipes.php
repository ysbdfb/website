<?php
require_once "config.php";
require_once "auth.php";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$favorite_ids = [];
if (is_logged_in()) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT recipe_id FROM favorites WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $favorite_ids[] = $row['recipe_id'];
    }
    $stmt->close();
}

$result = $conn->query("SELECT * FROM recipes ORDER BY id DESC");

$oldRecipes = [
    [
        'title' => 'Avocado salmon toast',
        'image' => 'Screenshot 2026-01-26 023027.png',
        'file'  => 'toast.php',
        'diet' => 'keto',
        'prep' => 'under-30',
        'difficulty' => 'easy',
        'cuisine' => 'american',
        'flavor' => 'salty',
        'meal' => 'breakfast',
        'allergens' => 'seafood'
    ],
    [
        'title' => 'Cottage cheese casserole',
        'image' => 'Screenshot 2026-01-26 023430.png',
        'file'  => 'casserole.php',
        'diet' => 'vegetarian',
        'prep' => '30-60',
        'difficulty' => 'medium',
        'cuisine' => 'american',
        'flavor' => 'salty',
        'meal' => 'dinner',
        'allergens' => 'dairy'
    ],
    [
        'title' => 'Curry chicken with rice',
        'image' => 'Screenshot 2026-01-26 005619.png',
        'file'  => 'curry-chicken-recipe.php',
        'diet' => 'keto',
        'prep' => '60-plus',
        'difficulty' => 'medium',
        'cuisine' => 'asian',
        'flavor' => 'spicy',
        'meal' => 'dinner',
        'allergens' => 'none'
    ],
    [
        'title' => 'Chia pudding with mango',
        'image' => 'Screenshot 2026-01-26 022340.png',
        'file'  => 'chia.php',
        'diet' => 'vegan',
        'prep' => 'under-30',
        'difficulty' => 'easy',
        'cuisine' => 'american',
        'flavor' => 'sweet',
        'meal' => 'dessert',
        'allergens' => 'none'
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Last Meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="recipes.css?v=<?= time() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">

<?php include 'header.php'; ?>

<hr>
<main class="container recipes-page">

<section class="recipe-search">
    <h1>Pick your poison</h1>

    <div class="search-bar">
        <input type="text" placeholder="Search recipes...">
        <button class="search-btn">🔍</button>
    </div>

    <div class="filters">
        <div class="filter">
            <button class="filter-btn">Diet</button>
            <ul class="filter-menu">
                <li data-filter="diet" data-value="vegetarian">Vegetarian</li>
                <li data-filter="diet" data-value="vegan">Vegan</li>
                <li data-filter="diet" data-value="keto">Keto</li>
                <li data-filter="diet" data-value="gluten-free">Gluten-free</li>
            </ul>
        </div>
        <div class="filter">
            <button class="filter-btn">Prep time</button>
            <ul class="filter-menu">
                <li data-filter="prep" data-value="under-30">Under 30 min</li>
                <li data-filter="prep" data-value="30-60">30-60 min</li>
                <li data-filter="prep" data-value="60-plus">60+ min</li>
            </ul>
        </div>
        <div class="filter">
            <button class="filter-btn">Difficulty</button>
            <ul class="filter-menu">
                <li data-filter="difficulty" data-value="easy">Easy</li>
                <li data-filter="difficulty" data-value="medium">Medium</li>
                <li data-filter="difficulty" data-value="hard">Hard</li>
            </ul>
        </div>
        <div class="filter">
            <button class="filter-btn">Cuisine</button>
            <ul class="filter-menu">
                <li data-filter="cuisine" data-value="italian">Italian</li>
                <li data-filter="cuisine" data-value="american">American</li>
                <li data-filter="cuisine" data-value="asian">Asian</li>
                <li data-filter="cuisine" data-value="french">French</li>
            </ul>
        </div>
        <div class="filter">
            <button class="filter-btn">Flavor</button>
            <ul class="filter-menu">
                <li data-filter="flavor" data-value="sweet">Sweet</li>
                <li data-filter="flavor" data-value="salty">Salty</li>
                <li data-filter="flavor" data-value="spicy">Spicy</li>
                <li data-filter="flavor" data-value="sour">Sour</li>
            </ul>
        </div>
        <div class="filter">
            <button class="filter-btn">Meal type</button>
            <ul class="filter-menu">
                <li data-filter="meal" data-value="breakfast">Breakfast</li>
                <li data-filter="meal" data-value="lunch">Lunch</li>
                <li data-filter="meal" data-value="dinner">Dinner</li>
                <li data-filter="meal" data-value="dessert">Dessert</li>
            </ul>
        </div>
        <div class="filter">
            <button class="filter-btn">Allergens</button>
            <ul class="filter-menu">
                <li data-filter="allergens" data-value="nuts">Nuts</li>
                <li data-filter="allergens" data-value="dairy">Dairy</li>
                <li data-filter="allergens" data-value="eggs">Eggs</li>
                <li data-filter="allergens" data-value="seafood">Seafood</li>
            </ul>
        </div>
    </div>
</section>

<div class="recipes">

<?php foreach ($oldRecipes as $recipe): ?>
<div class="recipe-card"
     data-title="<?= strtolower($recipe['title']) ?>"
     data-diet="<?= $recipe['diet'] ?>"
     data-prep="<?= $recipe['prep'] ?>"
     data-difficulty="<?= $recipe['difficulty'] ?>"
     data-cuisine="<?= $recipe['cuisine'] ?>"
     data-flavor="<?= $recipe['flavor'] ?>"
     data-meal="<?= $recipe['meal'] ?>"
     data-allergens="<?= $recipe['allergens'] ?>">
    
    <img src="<?= htmlspecialchars($recipe['image']) ?>" alt="Dish image">
    
    <div class="recipe-card_content">
        <span>
            <a href="<?= htmlspecialchars($recipe['file']) ?>">
                <?= htmlspecialchars($recipe['title']) ?>
            </a>
        </span>
    </div>
</div>
<?php endforeach; ?>


<?php while ($row = $result->fetch_assoc()): ?>
<div class="recipe-card"
     data-title="<?= strtolower($row['title']) ?>"
     data-diet="<?= $row['diet'] ?? '' ?>"
     data-prep="<?= $row['prep'] ?? '' ?>"
     data-difficulty="<?= $row['difficulty'] ?? '' ?>"
     data-cuisine="<?= $row['cuisine'] ?? '' ?>"
     data-flavor="<?= $row['flavor'] ?? '' ?>"
     data-meal="<?= $row['meal'] ?? '' ?>"
     data-allergens="<?= $row['allergens'] ?? '' ?>">
    
    <img src="<?= htmlspecialchars($row['image'] ?: 'default_food.png') ?>" alt="Dish image">
    
<?php if (is_logged_in()): ?>
    <button class="favorite-btn <?php echo in_array($row['id'], $favorite_ids) ? 'added' : ''; ?>" 
            data-recipe-id="<?= $row['id'] ?>">
        <?php echo in_array($row['id'], $favorite_ids) ? '♥' : '♡'; ?>
    </button>
<?php endif; ?>

    <div class="recipe-card_content">
        <span>
            <a href="view_recipe.php?id=<?= $row['id'] ?>">
                <?= htmlspecialchars($row['title']) ?>
            </a>
        </span>
    </div>
</div>
<?php endwhile; ?>

</div>

</main>

<?php include 'footer.php'; ?>

</div>

<script>

document.querySelectorAll('.favorite-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const recipeId = this.dataset.recipeId;
        if (!recipeId) return;
        
        fetch('add_to_favorites.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'recipe_id=' + recipeId
        })
        .then(res => res.text())
        .then(text => {
            console.log('Answer:', text);
            if (text === 'added') {
                btn.classList.add('added');
                btn.textContent = '♥';
            } else if (text === 'already') {
                alert('Already favorited');
            } else if (text === 'not_logged_in') {
                alert('Log in to add');
            } else {
                console.error('Error:', text);
            }
        })
        .catch(err => console.error('Fetch error:', err));
    });
});
document.querySelector('.burger').onclick = () => {
    document.querySelector('header nav').classList.toggle('active');
};

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-bar input");
    const searchButton = document.querySelector(".search-btn");
    const filterItems = document.querySelectorAll(".filter-menu li");
    const recipes = document.querySelectorAll(".recipe-card");

    let activeFilters = {};

    function filterRecipes() {
        const searchText = searchInput.value.toLowerCase();

        recipes.forEach(recipe => {
            const title = recipe.dataset.title || "";
            let matchesSearch = title.includes(searchText);
            let matchesFilters = true;

            for (let key in activeFilters) {
                const recipeValue = recipe.dataset[key];
                if (!recipeValue || recipeValue !== activeFilters[key]) {
                    matchesFilters = false;
                    break;
                }
            }

            recipe.style.display = (matchesSearch && matchesFilters) ? "block" : "none";
        });
    }

    searchButton.addEventListener("click", filterRecipes);
    searchInput.addEventListener("input", filterRecipes);

    filterItems.forEach(item => {
        item.addEventListener("click", function () {
            const filterType = this.dataset.filter;
            const filterValue = this.dataset.value;

            if (activeFilters[filterType] === filterValue) {
                delete activeFilters[filterType];
                this.classList.remove("active");
            } else {
                activeFilters[filterType] = filterValue;
                document.querySelectorAll(`[data-filter="${filterType}"]`)
                    .forEach(el => el.classList.remove("active"));
                this.classList.add("active");
            }

            filterRecipes();
        });
    });
});
</script>

</body>
</html>