<?php
include 'students.php';

$id = $_GET['id'] ?? null;
$student = null;

foreach ($students as $s) {
    if ($s['id'] == $id) {
        $student = $s;
        break;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Details</title>
</head>

<body>
    <?php if ($student): ?>
        <h2>Details for: <?= $student['name'] ?></h2>
        <p>Course: <?= $student['course'] ?></p>
        <p>Group: <?= $student['group'] ?></p>
        <p>Major: <?= $student['major'] ?></p>
        <a href="index.php">⬅️ Back to list</a>
    <?php else: ?>
        <p>Student not found 😕</p>
    <?php endif; ?>
</body>

</html>