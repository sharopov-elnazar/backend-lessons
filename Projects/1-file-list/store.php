<?php

if (isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['age']) && isset($_GET['username']) && isset($_GET['password'])) {
    $first_name = htmlspecialchars($_GET['first_name']);
    $last_name = htmlspecialchars($_GET['last_name']);
    $age = (int) $_GET['age'];
    $username = htmlspecialchars($_GET['username']);
    $password_old = $_GET['password'];
    $password = password_hash($password_old, PASSWORD_DEFAULT);

    $data = include("data.php");
    foreach ($data as $person) {
        if ($person['username'] == $username) {
            echo "<span style='color:red'>'$username'</span> Bu usernma mavjud!";
            ?>
            <form action="">
                <input type="text" name="first_name" placeholder="Ismni kiriting" required value="<?= $first_name ?>">
                <input type="text" name="last_name" placeholder="Familiya kiriting" required value="<?= $last_name ?>">
                <input type="number" name="age" placeholder="Yoshni kiriting" required value="<?= $age ?>">
                <input type="text" name="username" placeholder="Username kiriting" required>
                <input type="password" name="password" placeholder="Parolni kiriting" required value="<?= $password_old ?>">
                <button type="submit">Yuborish</button>
            </form>
            <?php
            exit;
        }
    }

    $new_entry = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'age' => $age,
        'username' => $username,
        'password' => $password,
    ];

    $file_path = "data.php";
    $old_data = [];

    if (file_exists($file_path)) {
        $old_data = include($file_path);
    }

    $old_data[] = $new_entry;

    $new_content = "<?php\nreturn " . var_export($old_data, true) . ";\n";

    file_put_contents($file_path, $new_content);

    header("Location: human-list.php");
    exit;
} else {
    echo "Ma'lumotlar to'liq emas!";
}
?>