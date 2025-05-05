<?php
$products = include "data.php";

$id = $_GET['id'] ?? null;

if (!isset($products[$id])) {
    echo "❌ Mahsulot topilmadi!";
    exit;
}

$product = $products[$id];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the uploaded file information
    $imageFile = $_FILES['image'] ?? null;
    $imagePath = $product['image']; // Existing image path

    // If a new file is uploaded
    if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
        // Delete the old image if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Get the uploaded file's details
        $uploadDir = 'product-image/'; // Directory where images will be stored
        $newImageName = uniqid('product_') . '.' . pathinfo($imageFile['name'], PATHINFO_EXTENSION);
        $imagePath = $uploadDir . $newImageName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageFile['tmp_name'], $imagePath)) {
            echo "✅ Yangi rasm muvaffaqiyatli yuklandi!";
        } else {
            echo "❌ Yangi rasmni yuklashda xato yuz berdi.";
        }
    }

    // Update the product data
    $products[$id]['name'] = $_POST['name'];
    $products[$id]['description'] = $_POST['description'];
    $products[$id]['price'] = $_POST['price'];
    $products[$id]['image'] = $imagePath;

    // Write the updated data back to the data.php file
    file_put_contents('data.php', '<?php return ' . var_export($products, true) . ';');

    echo "✅ Mahsulot yangilandi!";
    header("Location: products.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>📦 Mahsulotni tahrirlash</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

    <div class="container">
        <h1 class="text-center mb-4">✏️ Mahsulotni tahrirlash</h1>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Mahsulot nomi</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Tavsif</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    required><?= htmlspecialchars($product['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Narxi</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">📸 Yangi rasm yuklash</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <div class="mt-2">
                    <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                        class="img-fluid" width="200">
                </div>
            </div>
            <button type="submit" class="btn btn-success">🔄 Yangilash</button>
        </form>

        <!-- Delete Button with Confirmation -->
        <form method="POST" action="delete_product.php?id=<?= $id ?>"
            onsubmit="return confirm('⚠️ Mahsulotni ochirmoqchimisiz? Ushbu amal qaytarib bolmaydi!');">
            <button type="submit" class="btn btn-danger mt-3">🗑️ Mahsulotni o'chirish</button>
        </form>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>