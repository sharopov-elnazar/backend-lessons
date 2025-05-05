<?php
$products = include "data.php";
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>📦 Mahsulotlar ro‘yxati</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://iqbolshoh.uz/favicon.ico">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

    <div class="container">
        <h1 class="text-center mb-4">🛍️ Barcha mahsulotlar</h1>

        <!-- Bosh sahifaga qaytish linki -->
        <a href="./create.php" class="btn btn-secondary mb-4">Mahsulot yaratish</a>

        <div class="row">
            <?php foreach ($products as $index => $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text"><?= $product['description'] ?></p>
                            <p class="fw-bold"><?= $product['price'] ?> so‘m</p>
                            <a href="product-details.php?id=<?= $index ?>" class="btn btn-primary">➡️ Batafsil ko‘rish</a>
                            <a href="edit-product.php?id=<?= $index ?>" class="btn btn-warning mt-2">✏️ Tahrirlash</a>
                            <a href="delete-product.php?id=<?= $index ?>" class="btn btn-danger mt-2">🗑️ O‘chirish</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>