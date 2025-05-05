<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';
    $imagePath = '';

    // Rasmni yuklash
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $tmpName = $_FILES['image']['tmp_name'];
        $uploadDir = __DIR__ . '/product-image/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fullPath = $uploadDir . $imageName;

        if (move_uploaded_file($tmpName, $fullPath)) {
            $imagePath = 'product-image/' . $imageName;
        } else {
            die("❌ Rasmni saqlab bo'lmadi!");
        }
    } else {
        die("⚠️ Rasm tanlanmagan yoki xatolik bor.");
    }

    // Ma'lumotni tayyorlaymiz
    $new_entry = [
        'name' => $name,
        'price' => $price,
        'description' => $description,
        'image' => $imagePath,
    ];

    // Faylga yozamiz
    $file_path = __DIR__ . "/data.php";
    $old_data = [];

    if (file_exists($file_path)) {
        $old_data = include($file_path);
        if (!is_array($old_data)) {
            $old_data = [];
        }
    }

    $old_data[] = $new_entry;

    $new_content = "<?php\nreturn " . var_export($old_data, true) . ";\n";
    file_put_contents($file_path, $new_content);

    header("Location: ./");
    exit;
}
?>

<!-- Har doim forma ko‘rsatiladi -->
<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>🛒 Mahsulot qo‘shish</title>
    <style>
        /* style.css */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 20px;
            transition: 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #2ecc71;
            border: none;
            color: white;
            padding: 12px 20px;
            text-align: center;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>
    <h2>🛍️ Mahsulot qo‘shish formasi</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>📦 Mahsulot nomi:</label><br>
        <input type="text" name="name" required><br><br>

        <label>💰 Narxi:</label><br>
        <input type="number" name="price" required><br><br>

        <label>📝 Tavsifi:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>📸 Rasm:</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>

        <button type="submit">➕ Qo‘shish</button>
    </form>
</body>

</html>