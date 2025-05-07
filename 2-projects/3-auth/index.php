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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://iqbolshoh.uz" type="image/x-icon">
    <title>Bosh sahifa</title>
</head>

<body>

    <h1>Salom, <?= $_SESSION['username'] ?>!</h1>

    <a href="./logout/">Chiqish</a>

</body>

</html>