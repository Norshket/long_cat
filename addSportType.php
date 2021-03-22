<?php
require_once './function.php';
$error = [];
$conn = conn();

if (isset($_GET['del_id'])) {

    $del_id = $_GET['del_id'];

    $delSportType = ORM::for_table('sport_type')->find_one($del_id);
    $delSportType->delete();

     header("Location: ./addSportType.php");
}


if (isset($_POST['sport_type']) && $_POST['sport_type'] != '') {

    $sport_type = htmlentities($_POST['sport_type']);
    
    $addSportType = ORM::for_table('sport_type')->create();
    $addSportType->sport_type = $sport_type;
    $addSportType->save();
}
$all_sport_type = select_sport_type($conn);

?>

<body>
    <?php include './tamplate/header.php' ?>
    <h2 class="title">Добавить Вид спорта </h2>
    <form class="form" method="POST">

        <label for="sport_type" class="label"> Введите название</label>
        <input required class="input" type="text" name="sport_type" id="sport_type" value="">

        <input class="input input_submit" type="submit" value="Отправить">
    </form>

    <?php if (isset($all_sport_type)) : ?>
        <?php foreach ($all_sport_type as $value) : ?>
            <ul>
                <li><?= $value['sport_type'] ?> <a href="./addSportType.php?del_id=<?= $value['id'] ?>">Удалить</a></li>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>