<?php
require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['del_id'])) {
    $sql = "DELETE FROM `athletes` WHERE id =".(int) $_GET['del_id'];
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
<body>
    <?php include './tamplate/header.php' ?>
    <form class="form" method="POST">
        <h2 class="athleth_title">Добавить спортсмена </h2>
        <label class="label" form="name"> Введите имя: </label>
        <input required class="input" type="text" name="name" id="name" value="">

        <label class="label" from="sure_name"> Введите фамилию:</label>
        <input required class="input" type="text" name="sure_name" id="sure_name" value="">

        <label class="label" from="patronymic"> Введите отчество:</label>
        <input class="input" type="text" name="patronymic" id="patronymic" value="">

        <input class="input input_submit " type="submit" value="Отправить">
    </form>
    <ul class="athleth_list">
        <?php if (isset($athletes)):?>
        <?php foreach ($athletes as $value) : ?>
            <li class="athleth_item"> <?= $value['name']; ?> <?= $value['sure_name']; ?> <?= $value['patronymic']; ?> <a href="./addAthleth.php?del_id=<?= $value['id'] ?>">Удалить</a></li>
        <?php endforeach; ?>
        <?php endif;?>
    </ul>


</body>

</html>