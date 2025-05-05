<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';
    $imagePath = '';

    // Handle image upload
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
            die("❌ Error saving image!");
        }
    } else {
        die("⚠️ No image selected or error occurred.");
    }

    // Prepare data
    $new_entry = [
        'name' => $name,
        'price' => $price,
        'description' => $description,
        'image' => $imagePath,
    ];

    // Save data to file
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

<!-- HTML Form with Bootstrap 5 -->
<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🛒 Mahsulot qo‘shish</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://iqbolshoh.uz/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h2 class="text-center mb-4">🛍️ Mahsulot qo‘shish formasi</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">📦 Mahsulot nomi:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">💰 Narxi:</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">📝 Tavsifi:</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">📸 Rasm:</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">➕ Qo‘shish</button>
                </form>

                <div class="mt-3 text-center">
                    <a href="./" class="btn btn-outline-primary"> Bosh sahifa</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>