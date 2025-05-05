<?php
$products = include "data.php";

$id = $_GET['id'] ?? null;

if (!isset($products[$id])) {
    echo "❌ Mahsulot topilmadi!";
    exit;
}

$product = $products[$id];
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 Mahsulot tafsilotlari</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://iqbolshoh.uz/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="card-img-top rounded-3">
            <div class="card-body text-center">
                <h1 class="card-title"><?= $product['name'] ?></h1>
                <p class="card-text"><?= $product['description'] ?></p>
                <p class="h5 text-primary"><?= $product['price'] ?> so‘m</p>
                <a href="products.php" class="btn btn-success mt-3">⬅️ Ortga qaytish</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>