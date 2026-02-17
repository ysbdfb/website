<?php
session_start();    // Запускаем сессию
session_unset();    // Удаляем все переменные сессии
session_destroy();  // Уничтожаем сессию
header("Location: account.php"); // Перенаправляем на страницу логина
exit();
?>

