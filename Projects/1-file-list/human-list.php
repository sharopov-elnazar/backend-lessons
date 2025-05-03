<?php
if (!file_exists("data.php")) {
    echo "File mavjud emas!";
    exit;
}

$data = include("data.php");

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr>";
echo "<th>№</th>";
echo "<th>Ism</th>";
echo "<th>Familiya</th>";
echo "<th>Yosh</th>";
echo "<th>Username</th>";
echo "<th>Action</th>";
echo "</tr>";

foreach ($data as $index => $person) {
    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>" . $person['first_name'] . "</td>";
    echo "<td>" . $person['last_name'] . "</td>";
    echo "<td>" . $person['age'] . "</td>";
    echo "<td>" . $person['username'] . "</td>";
    echo "<td>
        <a href='delete.php?username=" . $person['username'] . "' onclick='return confirm(\"O‘chirishga ishonchingiz komilmi?\")'>🗑 O‘chirish</a>
        |
        <a href='edit.php?username=" . $person['username'] . "'>✏️ Tahrirlash</a>
    </td>";
    echo "</tr>";
}

echo "</table>";
?>

<br>
<a href="./">🏠 Bosh sahifa</a>