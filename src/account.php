<?php
session_start();
require_once "config.php";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    if ($stmt->execute()) {
        $_SESSION['user'] = $username;
        header("Location: account.php");
        exit();
    } else {
        $error = "Registration error: " . $conn->error;
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hash);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION['user'] = $username;
            header("Location: account.php");
            exit();
        } else {
            $error = "Wrong password";
        }
    } else {
        $error = "User not found";
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
            <div class="recipe-card">
                <img src="Screenshot%202026-01-26%20022340.png" alt="Dish image">
                <div class="recipe-card_content">
                    <span><a href="chia.php">Chia pudding with mango</a></span>
                </div>
            </div>
            <div class="recipe-card">
                <img src="Screenshot%202026-01-26%20023027.png" alt="Dish image">
                <div class="recipe-card_content">
                    <span><a href="toast.php">Avocado salmon toast</a></span>
                </div>
            </div>
            <div class="recipe-card">
                <img src="Screenshot%202026-01-26%20023430.png" alt="Dish image">
                <div class="recipe-card_content">
                    <span><a href="casserole.php">Сottage cheese casserole</a></span>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    include 'auth_forms.html';
}
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
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