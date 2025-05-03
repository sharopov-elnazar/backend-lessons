<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=7, initial-scale=1.0">
    <title>Ro'yxat</title>
</head>

<body>

    <form action="register.php">
        <input type="text" name="first_name" placeholder="Ismni kiriting" required>
        <input type="text" name="last_name" placeholder="Familiya kiriting" required>
        <input type="number" name="age" placeholder="Yoshni kiriting" required>
        <select name="address" required>
            <option value="" selected disabled>--Tanlang--</option>
            <option value="Toshkent">Toshkent</option>
            <option value="Samarqand">Samarqand</option>
            <option value="Buxoro">Buxoro</option>
            <option value="Farg'ona">Farg'ona</option>
            <option value="Andijon">Andijon</option>
            <option value="Namangan">Namangan</option>
            <option value="Jizzax">Jizzax</option>
            <option value="Qashqadaryo">Qashqadaryo</option>
            <option value="Surxondaryo">Surxondaryo</option>
            <option value="Xorazm">Xorazm</option>
            <option value="Navoiy">Navoiy</option>
            <option value="Sirdaryo">Sirdaryo</option>
            <option value="Qoraqalpog'iston">Qoraqalpog'iston</option>
        </select>
        <button type="submit">Yuborish</button>
    </form>

    <a href="./human-list.php">Odamlar ro'yxati</a>

</body>

</html>