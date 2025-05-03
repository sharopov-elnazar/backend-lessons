<?php
if (!file_exists("data.php")) {
    echo "<div class='alert alert-danger text-center mt-5'>❌ Fayl mavjud emas!</div>";
    exit;
}

$data = include("data.php");
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Foydalanuvchilar ro'yxati</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://iqbolshoh.uz/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4><i class="bi bi-people-fill"></i> Foydalanuvchilar ro'yxati</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>№</th>
                            <th>Ism</th>
                            <th>Familiya</th>
                            <th>Yosh</th>
                            <th>Username</th>
                            <th>Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $index => $person): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($person['first_name']) ?></td>
                                <td><?= htmlspecialchars($person['last_name']) ?></td>
                                <td><?= htmlspecialchars($person['age']) ?></td>
                                <td><?= htmlspecialchars($person['username']) ?></td>
                                <td>
                                    <a href="edit.php?username=<?= urlencode($person['username']) ?>"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Tahrirlash
                                    </a>
                                    <a href="delete.php?username=<?= urlencode($person['username']) ?>"
                                        onclick="return confirm('O‘chirishga ishonchingiz komilmi?')"
                                        class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3-fill"></i> O‘chirish
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                <a href="./" class="btn btn-outline-primary">
                    <i class="bi bi-house-door-fill"></i> Bosh sahifa
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>