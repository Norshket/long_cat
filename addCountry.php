<?php
require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM `country` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ./addCountry.php");
}

if (isset($_POST['country']) && $_POST['country'] !='') {
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $sql = "INSERT INTO country (country)
                VALUES('$country')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ./index.php");
    }
}

$all_country = select_country($conn);


mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <title>Страна</title>
</head>

<body>
    <?php include './tamplate/header.php' ?>
    <form method="POST">
        <h2>Добавить Страну </h2>
        <label> Введите название страны
            <input type="text" name="country" value="">
        </label>
        <input type="submit" value="Отправить">
    </form>

    <?php foreach ($all_country as $value) : ?>
        <ul>
            <li><?= $value['country'] ?> <a href="./addCountry.php?id=<?= $value['id'] ?>">Удалить</a></li>

        </ul>
    <?php endforeach; ?>
</body>

</html>