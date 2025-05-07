<?php
// 🚀 Sessiyani boshlaymiz - bu har bir sahifada birinchi bo'lib chaqirilishi kerak
session_start();

// 📂 Foydalanuvchi ma'lumotlarini fayldan olamiz (data.php faylida saqlangan)
$USER_DATA = [
    'name'        => 'Iqbolshoh Ilhomjonov',
    'username'    => 'iqbolshoh',
    'password'    => 'IQBOLSHOH'
];

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
            $_SESSION['name'] = $USER_DATA['name'];
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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <div class="form-header">
            <h1>Login to Your Account</h1>
        </div>
        <p class="error-message"><?php if (isset($error)) echo htmlspecialchars($error); ?></p>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                <i class="fas fa-eye"></i>
            </button>
        </div>
        <button type="submit">Sign In</button>
    </form>
    <script>
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>