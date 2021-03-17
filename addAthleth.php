<?php
require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM `athletes` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ./addAthleth.php");
}


if ($_POST['name']!='' && $_POST['sure_name']!='') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sure_name = mysqli_real_escape_string($conn, $_POST['sure_name']);
    $patronymic = mysqli_real_escape_string($conn, $_POST['patronymic']);

    $sql = "INSERT INTO athletes (name,sure_name,patronymic)
                VALUES('$name','$sure_name','$patronymic')";
    $result = mysqli_query($conn, $sql);
}


$athletes = select_athletes($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Document</title>
</head>

<body>
    <?php include './tamplate/header.php' ?>
    <form class="athleth_form" method="POST">
        <h2 class="athleth_title">Добавить спортсмена </h2>
        <label class="athleth_label" form="name"> Введите имя: </label>
        <input class="athleth_input" type="text" name="name" id="name" value="">

        <label class="athleth_label" from="sure_name"> Введите фамилию:</label>
        <input class="athleth_input" type="text" name="sure_name" id="sure_name" value="">

        <label class="athleth_label" from="patronymic"> Введите отчество:</label>
        <input class="athleth_input" type="text" name="patronymic" id="patronymic" value="">

        <input class="athleth_input athleth_input_submit " type="submit" value="Отправить">
    </form>
    <ul class="athleth_list">
        <?php foreach ($athletes as $value) : ?>
            <li class="athleth_item"> <?= $value['name']; ?> <?= $value['sure_name']; ?> <?= $value['patronymic']; ?> <a href="./addAthleth.php?id=<?= $value['id'] ?>">Удалить</a></li>
        <?php endforeach; ?>
    </ul>


</body>

</html>