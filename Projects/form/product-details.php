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
    <title>📄 Mahsulot tafsilotlari</title>
    <style>
        body {
            font-family: sans-serif;
            background: #fafafa;
            padding: 40px;
        }

        .product-card {
            background: white;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        img {
            max-width: 100%;
            border-radius: 10px;
        }

        h1 {
            color: #2c3e50;
        }

        p {
            font-size: 18px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            background: #2ecc71;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background: #27ae60;
        }
    </style>
</head>

<body>

    <div class="product-card">
        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        <h1><?= $product['name'] ?></h1>
        <p><?= $product['description'] ?></p>
        <p><strong><?= $product['price'] ?> so‘m</strong></p>
        <a href="products.php">⬅️ Ortga qaytish</a>
    </div>

</body>

</html>