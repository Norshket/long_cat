<?php
require_once './function.php';
$error = [];
$conn = conn();


if ($_GET['id'] != "") {
    $id = $_GET['id'];
    $sql = "DELETE FROM `athletes` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ./addAthleth.php");
}

if (($_POST)) {
    if ($_POST['name'] && $_POST['sure_name']) {
        $name = $_POST['name'];
        $sure_name = $_POST['sure_name'];
        $patronymic = $_POST['patronymic'];

        $sql = "INSERT INTO athletes (name,sure_name,patronymic)
                VALUES('$name','$sure_name','$patronymic')";
        $result = mysqli_query($conn, $sql);
    }
}

$athletes = [];
$sql = "SELECT * FROM athletes";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $athletes[] = $row;
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <h2>Добавить спортсмена </h2>
        <label> Введите имя
            <input type="text" name="name" value="">
        </label>
        <label> Введите фамилию
            <input type="text" name="sure_name" value="">
        </label>
        <label> Введите отчество
            <input type="text" name="patronymic" value="">
        </label>
        <input type="submit" value="Отправить">
    </form>

    <?php foreach ($athletes as $value) : ?>
        <ul>
            <li> <?= $value['name']; ?> <?= $value['sure_name']; ?> <?= $value['patronymic']; ?> <a href="./addAthleth.php?id=<?= $value['id'] ?>">Удалить</a></li>

        </ul>
    <?php endforeach; ?>



</body>

</html>