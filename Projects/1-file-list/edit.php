<?php
// Fayl mavjudligini tekshiramiz
if (!file_exists("data.php")) {
    echo "Fayl topilmadi!";
    exit;
}

// Ma'lumotlarni yuklaymiz
$data = include("data.php");

// Username GET orqali kelganmi?
if (!isset($_GET['username'])) {
    echo "Username ko‘rsatilmagan!";
    exit;
}

$username = $_GET['username'];
$personToEdit = null;

// Ma'lumotni topamiz
foreach ($data as $index => $person) {
    if ($person['username'] === $username) {
        $personToEdit = $person;
        $personIndex = $index;
        break;
    }
}

// Agar topilmasa:
if (!$personToEdit) {
    echo "Foydalanuvchi topilmadi!";
    exit;
}

// Formdan kelgan ma'lumotni saqlash
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data[$personIndex]['first_name'] = htmlspecialchars($_POST['first_name']);
    $data[$personIndex]['last_name'] = htmlspecialchars($_POST['last_name']);
    $data[$personIndex]['age'] = (int) $_POST['age'];

    // PHP faylga qayta yozamiz
    $phpCode = "<?php return " . var_export($data, true) . ";";
    file_put_contents("data.php", $phpCode);

    echo "<p style='color:green'>Ma'lumotlar muvaffaqiyatli yangilandi! ✅</p>";
    echo "<a href='human-list.php'>🔙 Orqaga</a>";
    exit;
}
?>

<h2>✏️ Foydalanuvchini tahrirlash: <?= $personToEdit['username'] ?></h2>
<form method="post">
    <label>Ism: <input type="text" name="first_name" value="<?= $personToEdit['first_name'] ?>"
            required></label><br><br>
    <label>Familiya: <input type="text" name="last_name" value="<?= $personToEdit['last_name'] ?>"
            required></label><br><br>
    <label>Yosh: <input type="number" name="age" value="<?= $personToEdit['age'] ?>" required></label><br><br>
    <button type="submit">💾 Saqlash</button>
</form>