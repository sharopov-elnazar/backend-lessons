<?php
session_start();

// Faqat login bo‘lganlar kira oladi
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: ./login/');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosh sahifa</title>
</head>

<body>

    <h1>Salom <?= $_SESSION['name'] ?>.</h1>
    <h1>username: <?= $_SESSION['username'] ?>.</h1>
    <a href="./logout/">Chiqish</a>
</body>

</html>