<?php
if (!isset($_GET['username'])) {
    echo "Username ko‘rsatilmagan!";
    exit;
}

$username = $_GET['username'];
$file = "data.php";

if (!file_exists($file)) {
    echo "Fayl topilmadi!";
    exit;
}

$data = include($file);

// Foydalanuvchini topib o‘chiramiz
$new_data = array_filter($data, function ($user) use ($username) {
    return $user['username'] !== $username;
});

// Faylga qaytadan yozamiz
$content = "<?php\nreturn " . var_export(array_values($new_data), true) . ";\n";
file_put_contents($file, $content);

// Qaytaramiz
header("Location: human-list.php");
exit;
?>