<?php
// 🚦 Sessiyani boshlaymiz
session_start();

// 🔒 Tizimga kirmagan foydalanuvchini login sahifasiga qaytaramiz
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: ./login/');
    exit; // ⛔ Kodni to'xtatamiz, himoyalangan ma'lumotlarni ko'rsatmaymiz
}

// Bu yerda himoyalangan sahifa kontenti bo'ladi...
// Faqat tizimga kirgan foydalanuvchilar ko'ra oladi
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About - Ma'lumot sahifasi</title>
</head>

<body>

    <h1>👤 Salom <?= $_SESSION['name'] ?>!</h1>
    <p>Bu sahifa siz haqingizda ba'zi ma'lumotlarni ko'rsatadi.</p>

    <ul>
        <li><strong>Ismingiz:</strong> <?= $_SESSION['name'] ?></li>
        <li><strong>Username:</strong> <?= $_SESSION['username'] ?></li>
        <li><strong>Session status:</strong> <?= $_SESSION['loggedin'] ? "Faol" : "Nofaol" ?></li>
    </ul>

    <a href="index.php">🏠 Bosh sahifa</a> |
    <a href="./logout/">🚪 Chiqish</a>

</body>

</html>