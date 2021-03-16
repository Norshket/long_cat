<?php
require_once './function.php';
$error = [];
$conn = conn();
$medals = select_medal_type($conn);
$sport_type = select_sport_type($conn);
$country = select_country($conn);
$athletes = select_athletes($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <title>Присвоение медалей</title>
</head>

<body>
    <?php include './tamplate/header.php' ?>
    <label for="medals">Медали</label>
    <select name="medals" id="medals">
        <?php foreach ($medals as $value) : ?>
            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="sport_type">Вид спорта</label>
    <select name="sport_type" id="sport_type">
        <?php foreach ($sport_type as $value) : ?>
            <option value="<?= $value['id'] ?>"> <?= $value['sport_type'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="country">Страны</label>
    <select name="country" id="country">
        <?php foreach ($country as $value) : ?>
            <option value="<?= $value['id'] ?>"> <?= $value['country'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="athletes">Спортсмены</label>
    <select name="athletes" id="athletes">
        <?php foreach ($athletes as $value) : ?>
            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?></option>
        <?php endforeach; ?>
    </select>


</body>

</html>