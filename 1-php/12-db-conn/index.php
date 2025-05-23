<?php
/*----------------------------------------
| 1. MYSQL BAZASIGA ULANISH
|----------------------------------------*/
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "hemis");

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("❌ Baza bilan ulanishda xatolik: " . mysqli_connect_error());
}

/*----------------------------------------
| 2. UNIVERSITET MA'LUMOTLARINI OLIB KELISH
|----------------------------------------*/
$university = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `university`"), MYSQLI_ASSOC);


/*----------------------------------------
| 3. BARCHA MA'LUMOTLARNI CHIQARISH
|----------------------------------------*/
// 1. Oddiy print orqali
// print_r($university);

// for ech orqali (PHP ichida)
// foreach ($university as $u) {
//     echo "<h2>" . $u['id'] . "</h2><br>";
//     echo "<h3>" . $u['name'] . "</h3><br>";
// }

// 2. Ro'yxatda chiqarish (HTML ichida)
?>
<ul>
    <?php foreach ($university as $row): ?>
        <li>
            <h2>id: <?= $row['id'] ?></h2>
            <h3>Name: <?= $row['name'] ?></h3>
        </li>
    <?php endforeach; ?>
</ul>
<?

/*----------------------------------------
| 4. ULANISHNI YOPISH
|----------------------------------------*/
mysqli_close($conn);
?>