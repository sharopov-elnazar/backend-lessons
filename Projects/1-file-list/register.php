<?php

if (isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['age']) && isset($_GET['address'])) {
    $first_name = htmlspecialchars($_GET['first_name']);
    $last_name = htmlspecialchars($_GET['last_name']);
    $age = (int) $_GET['age'];
    $address = htmlspecialchars($_GET['address']);

    $new_entry = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'age' => $age,
        'address' => $address
    ];

    $file_path = "data.php";

    if (file_exists($file_path)) {
        $old_data = include($file_path);
    } else {
        $old_data = [];
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