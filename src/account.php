<?php
session_start();
require_once "config.php";
require_once "auth.php";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed);

    if ($stmt->execute()) {
        $_SESSION["user_id"] = $conn->insert_id;
        $_SESSION["user"]    = $username;
        $_SESSION["role"]    = "user";

        header("Location: account.php");
        exit();
    } else {
        $error = "Registration error: " . $conn->error;
    }
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (login_user($username, $password, $conn)) {
        header("Location: account.php");
        exit();
    } else {
        $error = "Wrong login or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Last meal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="auth.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">

<?php include 'header.php'; ?>

<hr>

<?php
if (isset($_SESSION['user'])) {
?>
    <div class="username container">
        <h1>Glad you’re still with us,</h1>
        <h1><?php echo htmlspecialchars($_SESSION['user']); ?>.</h1>
        <hr>
    </div>

    <div class="created-recipes container">
        <h2>Your <s>poisons</s> recipes</h2>
        <div class="recipes">
            <!-- твой старый hardcoded рецепт или динамика -->
            <div class="recipe-card">
                <img src="Screenshot%202026-01-26%20005619.png" alt="Dish image">
                <div class="recipe-card_content">
                    <span><a href="curry-chicken-recipe.php">Curry chicken with rice</a></span>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="favorites container">
        <h2>Favorites</h2>
        <div class="recipes">
            <?php
            $favorites = [];
            if (isset($_SESSION['user_id'])) {
                $stmt = $conn->prepare("
                    SELECT r.id, r.title, r.image
                    FROM recipes r
                    JOIN favorites f ON r.id = f.recipe_id
                    WHERE f.user_id = ?
                    ORDER BY f.saved_at DESC
                ");
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $favorites[] = $row;
                }
                $stmt->close();
            }

            if (!empty($favorites)): ?>
                <?php foreach ($favorites as $fav): ?>
                <div class="recipe-card">
                    <img src="<?= htmlspecialchars($fav['image'] ?: 'default_food.png') ?>" alt="Dish image">
                    <div class="recipe-card_content">
                        <span><a href="view_recipe.php?id=<?= $fav['id'] ?>"><?= htmlspecialchars($fav['title']) ?></a></span>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>You don't have any favorites yet. Try adding them from the recipes page!</p>
            <?php endif; ?>
        </div>
    </div>

<?php
} else {
    include 'auth_forms.html';
}
?>

</div>
<?php include 'footer.php'; ?>

<script>
    document.querySelector('.burger').onclick = () => {
        document.querySelector('header nav').classList.toggle('active');
    };
</script>
</body>
</html>