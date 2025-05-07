<?php
// 🚀 Sessiyani boshlaymiz - bu har bir sahifada birinchi bo'lib chaqirilishi kerak
session_start();

// 📂 Foydalanuvchi ma'lumotlarini fayldan olamiz (data.php faylida saqlangan)
$USER_DATA = include '../data.php';

// 🔍 Agar foydalanuvchi allaqachon tizimga kirgan bo'lsa, asosiy sahifaga yo'naltiramiz
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: ../');
    exit; // ⛔ Kodni to'xtatamiz, keyingi qismlar ishlamasin
}

// 📨 POST so'rovini tekshiramiz (forma to'ldirilganda)
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // 🔎 Forma maydonlari to'ldirilganligini tekshiramiz
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $username = strtolower($_POST['username']); // Usernameni kichik harflarga aylantiramiz
        $password = $_POST['password']; // Parolni olamiz

        // 🔑 Foydalanuvchi ma'lumotlarini tekshiramiz
        if ($USER_DATA['username'] == $username && $USER_DATA['password'] == $password) {

            // ✅ Kirish muvaffaqiyatli - sessiyaga ma'lumotlarni saqlaymiz
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $USER_DATA['username'];

            // 🏠 Asosiy sahifaga yo'naltiramiz
            header('Location: ../');
            exit;
        } else {
            echo "❌ Parol yoki username noto'g'ri!"; // ⚠️ Xato xabari
        }
    } else {
        echo "⚠️ Iltimos, barcha maydonlarni to'ldiring!"; // ⚠️ Ogohlantirish
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username ni kiriting" required>
        <input type="password" name="password" placeholder="Passwordni kiriting" required>
        <button type="submit">Kirish</button>
    </form>
</body>

</html>