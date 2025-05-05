<?php
$products = include "data.php";
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>📦 Mahsulotlar ro‘yxati</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f0f0f5;
        }

        .product {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .product img {
            max-width: 150px;
            border-radius: 10px;
        }

        .product h2 {
            margin: 0;
        }

        .product a {
            display: inline-block;
            margin-top: 10px;
            background: #3498db;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        .product a:hover {
            background: #2980b9;
        }
    </style>
</head>

<body>

    <h1>🛍️ Barcha mahsulotlar</h1>

    <?php foreach ($products as $index => $product): ?>
        <div class="product">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <div>
                <h2><?= $product['name'] ?></h2>
                <p><?= $product['description'] ?></p>
                <p><strong><?= $product['price'] ?> so‘m</strong></p>
                <a href="product-details.php?id=<?= $index ?>">➡️ Batafsil ko‘rish</a>
            </div>
        </div>
    <?php endforeach; ?>

</body>

</html>