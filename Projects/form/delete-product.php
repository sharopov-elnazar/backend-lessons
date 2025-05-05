<?php
$products = include "data.php";

$id = $_GET['id'] ?? null;

if (!isset($products[$id])) {
    echo "❌ Mahsulot topilmadi!";
    exit;
}

$product = $products[$id];

// Delete the image if it exists
$imagePath = $product['image'];
if (file_exists($imagePath)) {
    unlink($imagePath); // Delete the image
}

// Remove the product from the array
unset($products[$id]);

// Write the updated data back to the data.php file
file_put_contents('data.php', '<?php return ' . var_export($products, true) . ';');

echo "✅ Mahsulot o‘chirildi!";
header("Location: products.php");
exit;
?>