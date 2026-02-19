<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function login_user($username, $password, $conn) {
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash, $role);
        $stmt->fetch();

        if (password_verify($password, $hash)) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $id;
            $_SESSION['user'] = $username;
            $_SESSION['role'] = strtolower($role);
            return true;
        }
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function require_admin() {
    if (!is_logged_in() || !is_admin()) {
        header("Location: ../account.php?error=access_denied");
        exit();
    }
}
?>