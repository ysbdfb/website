<?php
require_once '../config.php';
require_once '../auth.php';
require_admin();

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_user'])) {
        $id = intval($_POST['id']);
        if ($id == $_SESSION['user_id'] || (isset($_SESSION['user']) && $id == $_SESSION['user'])) {
            $message = "Do not do that, please";
        } else {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $message = "User deleted successfully";
        }
    }

    if (isset($_POST['delete_recipe'])) {
        $id = intval($_POST['id']);
        $stmt = $conn->prepare("DELETE FROM recipes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $message = "Recipe deleted successfully";
    }
}

if (isset($_POST['delete_favorite'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM favorites WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $message = "Favorite entry deleted successfully";
    $stmt->close();
}

$users = $conn->query("SELECT id, username, email, role, created_at FROM users ORDER BY id DESC");
$recipes = $conn->query("SELECT id, title FROM recipes ORDER BY id DESC");


$favorites = $conn->query("
    SELECT f.id, f.saved_at, u.username AS user, r.title AS recipe, r.id AS recipe_id
    FROM favorites f
    JOIN users u ON f.user_id = u.id
    JOIN recipes r ON f.recipe_id = r.id
    ORDER BY f.saved_at DESC
");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel — Last Meal</title>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">

<?php include '../header.php'; ?>

<hr>

<div class="container admin-panel">
    <h1>Admin Panel</h1>
    <p>Welcome, <strong><?= htmlspecialchars($_SESSION['user'] ?? 'Admin') ?></strong>.</p>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <h2>Users (<?= $users->num_rows ?> total)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        <?php while ($u = $users->fetch_assoc()): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><strong><?= htmlspecialchars($u['role']) ?></strong></td>
            <td><?= $u['created_at'] ?></td>
            <td>
                <form method="POST" onsubmit="return confirm('Delete user <?= htmlspecialchars($u['username']) ?>?');">
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    <button type="submit" name="delete_user" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Recipes (<?= $recipes->num_rows ?> total)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        <?php while ($r = $recipes->fetch_assoc()): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['title']) ?></td>
            <td>
                <form method="POST" onsubmit="return confirm('Delete this recipe?');">
                    <input type="hidden" name="id" value="<?= $r['id'] ?>">
                    <button type="submit" name="delete_recipe" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>


<h2>Favorites (<?= $favorites->num_rows ?> total)</h2>
<table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Recipe</th>
        <th>Saved At</th>
        <th>Action</th>
    </tr>
    <?php while ($f = $favorites->fetch_assoc()): ?>
    <tr>
        <td><?= $f['id'] ?></td>
        <td><?= htmlspecialchars($f['user']) ?></td>
        <td>
            <a href="../view_recipe.php?id=<?= $f['recipe_id'] ?>" target="_blank">
                <?= htmlspecialchars($f['recipe']) ?>
            </a>
        </td>
        <td><?= $f['saved_at'] ?></td>
        <td>
            <form method="POST" onsubmit="return confirm('Удалить это избранное?');">
                <input type="hidden" name="id" value="<?= $f['id'] ?>">
                <button type="submit" name="delete_favorite" class="btn-delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

    <p style="margin-top:40px;">
        <a href="../index.php">← Back to main site</a>
    </p>
</div>

<?php include '../footer.php'; ?>

</div>
</body>
</html>