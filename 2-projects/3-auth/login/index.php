<?php
session_start();

$USER_DATA = [
    'name' => 'Iqbolshoh Ilhomjonov',
    'username' =>  'iqbolshoh',
    'password' => 'Iqbolshoh',
    'address' => 'Samarkand'
];

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: ../');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $username = strtolower($_POST['username']);
        $password = $_POST['password'];

        if ($USER_DATA['username'] == $username && $USER_DATA['password'] == $password) {

            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $USER_DATA['name'];
            $_SESSION['username'] = $USER_DATA['username'];

            header('Location: ../');
            exit;
        } else {
            echo "❌ Parol yoki username noto‘g‘ri!";
        }
    } else {
        echo "⚠️ Iltimos, barcha maydonlarni to‘ldiring!";
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
        <input type="text" name="username" placeholder="username ni kiriting" required>
        <input type="password" name="password" placeholder="passwordni kiriting" required>
        <button type="submit">Kirish</button>
    </form>
</body>

</html>