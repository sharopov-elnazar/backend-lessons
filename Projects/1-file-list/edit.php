<?php
if (!file_exists("data.php")) {
    echo "Fayl topilmadi!";
    exit;
}

$data = include("data.php");

// Username GET orqali keldi
if (!isset($_GET['username'])) {
    echo "Username ko‘rsatilmagan!";
    exit;
}

$username = $_GET['username'];
$personToEdit = null;

// Topamiz
foreach ($data as $index => $person) {
    if ($person['username'] === $username) {
        $personToEdit = $person;
        $personIndex = $index;
        break;
    }
}

if (!$personToEdit) {
    echo "Foydalanuvchi topilmadi!";
    exit;
}

// Agar boshqa GET parametrlar ham bor bo‘lsa — tahrirlashni bajaramiz
if (isset($_GET['first_name'], $_GET['last_name'], $_GET['age'])) {
    $data[$personIndex]['first_name'] = htmlspecialchars($_GET['first_name']);
    $data[$personIndex]['last_name'] = htmlspecialchars($_GET['last_name']);
    $data[$personIndex]['age'] = (int) $_GET['age'];

    $phpCode = "<?php return " . var_export($data, true) . ";";
    file_put_contents("data.php", $phpCode);

    echo "<p style='color:green'>GET orqali ma'lumotlar yangilandi! ✅</p>";
    echo "<a href='human-list.php'>🔙 Orqaga</a>";
    exit;
}
?>

<h2>✏️ GET orqali tahrirlash: <?= $personToEdit['username'] ?></h2>
<form method="get">
    <input type="hidden" name="username" value="<?= $personToEdit['username'] ?>">
    <label>Ism: <input type="text" name="first_name" value="<?= $personToEdit['first_name'] ?>"
            required></label><br><br>
    <label>Familiya: <input type="text" name="last_name" value="<?= $personToEdit['last_name'] ?>"
            required></label><br><br>
    <label>Yosh: <input type="number" name="age" value="<?= $personToEdit['age'] ?>" required></label><br><br>
    <button type="submit">💾 GET orqali saqlash</button>
</form>