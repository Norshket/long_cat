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
    <link rel="stylesheet" href="/style/main.css">
    <title>Document</title>
</head>

<body>
<?php include './tamplate/header.php'?>
    <form class="athleth_form" method="POST">
        <h2 class="athleth_title">Добавить спортсмена </h2>
        <label class="athleth_label" form="name"> Введите имя: </label>
            <input class="athleth_input" type="text" name="name" id ="name" value="">
       
        <label class="athleth_label" from="sure_name"> Введите фамилию:</label>
            <input class="athleth_input" type="text" name="sure_name" id="sure_name" value="">
        
        <label class="athleth_label" from="patronymic"> Введите отчество:</label>
            <input  class="athleth_input" type="text" name="patronymic" id="patronymic" value="">
        
        <input class="athleth_input athleth_input_submit " type="submit" value="Отправить">
    </form>

    <?php foreach ($athletes as $value) : ?>
        <ul>
            <li> <?= $value['name']; ?> <?= $value['sure_name']; ?> <?= $value['patronymic']; ?> <a href="./addAthleth.php?id=<?= $value['id'] ?>">Удалить</a></li>

        </ul>
    <?php endforeach; ?>



</body>

</html>