<?php
if (!file_exists("data.php")) {
    echo "File mavjud emas!";
    exit;
}

$data = include("data.php");
// echo "<pre>";
// print_r($data);
// echo "</pre>";

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr>";
echo "<th>№</th>";
echo "<th>Ism</th>";
echo "<th>Familiya</th>";
echo "<th>Yosh</th>";
echo "<th>Username</th>";
echo "</tr>";
echo "<tr>";
foreach ($data as $index => $person) {
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>" . $person['first_name'] . "</td>";
    echo "<td>" . $person['last_name'] . "</td>";
    echo "<td>" . $person['age'] . "</td>";
    echo "<td>" . $person['username'] . "</td>";
    echo "</tr>";
}
?>

<a href="./">Bosh sahifa</a>