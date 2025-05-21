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
$result = mysqli_query($conn, "SELECT * FROM `university`");
$universities = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $students = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `students`"), MYSQLI_ASSOC);


/*----------------------------------------
| 3. BARCHA MA'LUMOTLARNI CHIQARISH
|----------------------------------------*/
print_r($universities);


/*----------------------------------------
| 4. ULANISHNI YOPISH
|----------------------------------------*/
mysqli_close($conn);
?>