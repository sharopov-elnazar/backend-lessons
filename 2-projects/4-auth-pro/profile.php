<?php
// 🚦 Sessiyani boshlaymiz
session_start();

// 🔒 Tizimga kirmagan foydalanuvchini login sahifasiga qaytaramiz
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: ./login/');
    exit;
}

// 📂 Foydalanuvchi ma'lumotlarini yuklaymiz
$userData = include './user-data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | <?= htmlspecialchars($userData['name']) ?></title>
    <link rel="icon" href="https://iqbolshoh.uz" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo"><?= htmlspecialchars($userData['name']) ?></div>
                <div class="nav-links">
                    <a href="./" class="btn btn-outline">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="./logout/" class="btn btn-primary">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="profile-header">
            <img src="<?= htmlspecialchars($userData['image']) ?>" alt="Profile image" class="profile-img">
            <h1><?= htmlspecialchars($userData['name']) ?></h1>
            <p class="subtitle"><?= htmlspecialchars($userData['bio']) ?></p>
        </section>

        <section class="card">
            <h2>Personal Information</h2>

            <div class="info-grid">
                <div class="info-item">
                    <strong>Username</strong>
                    <span><?= htmlspecialchars($userData['username']) ?></span>
                </div>

                <div class="info-item">
                    <strong>Email Address</strong>
                    <span><?= htmlspecialchars($userData['email']) ?></span>
                </div>

                <div class="info-item">
                    <strong>Phone Number</strong>
                    <span><?= htmlspecialchars($userData['phone']) ?></span>
                </div>

                <div class="info-item">
                    <strong>Location</strong>
                    <span><?= htmlspecialchars($userData['address']) ?></span>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="./" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>© <?= date('Y') ?> <?= htmlspecialchars($userData['name']) ?>. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>