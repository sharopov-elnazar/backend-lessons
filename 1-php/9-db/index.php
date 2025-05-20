<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hemis";

// Ulanish
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Xatolik tekshirish
if (!$conn) {
    die("Ulanishda xatolik yuz berdi: " . mysqli_connect_error());
}




// 1. So‘rov
$universities = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `university`"), MYSQLI_ASSOC);
$faculties = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `faculty`"), MYSQLI_ASSOC);
$directions = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `direction`"), MYSQLI_ASSOC);
$groups = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `group`"), MYSQLI_ASSOC);
$students = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `students`"), MYSQLI_ASSOC);


// print_r($university);
// print_r($faculty);
// print_r($direction);
// print_r($groups);
// print_r($students);

foreach ($students as $student) {
    ?>
    <p>id: <?= $student['id'] ?></p>
    <p>university_id: <?= $student['university_id'] ?></p>
    <p>faculty_id: <?= $student['faculty_id'] ?></p>
    <p>direction_id: <?= $student['direction_id'] ?></p>
    <p>group_id: <?= $student['group_id'] ?></p>
    <p>name: <?= $student['name'] ?></p>
    <p>age: <?= $student['age'] ?></p>
    <hr>
    <br>
    <?php
}



// Yopish
mysqli_close($conn);
?>