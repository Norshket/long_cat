<?php
require_once './function.php';
$error = [];
$conn = conn();
$medals = select_medal_type($conn);
$sport_type = select_sport_type($conn);
$country = select_country($conn);
$athletes = select_athletes($conn);



if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM country_medals WHERE id=$id ";
    $result = mysqli_query($conn, $sql);
    header("Location: ./addMedals.php");
}

if (isset($_POST['athletes'])) {
    $country_id = (int)$_POST['country'];
    $medals_id =  (int)$_POST['medals'];
    $sport_types_id = (int)$_POST['sport_type'];
    $athletes_id = (int) $_POST['athletes'];

    $sql = "INSERT INTO country_medals (medal_type_id, country_id, athletes_id, sport_type_id)
        VALUES (  $medals_id, $country_id ,$athletes_id, $sport_types_id )";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die(mysqli_error($conn));
    }
}
$country_medals = country_medals($conn);


mysqli_close($conn);
?>

<body>

    <?php include './tamplate/header.php' ?>
    <form class="form" method="POST">
        <label class="label" for="medals">Медали</label>
        <select class="input" name="medals" id="medals">
            <option value=""> Выберите медаль </option>
            <?php foreach ($medals as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['medal_type'] ?></option>
            <?php endforeach; ?>
        </select>

        <label class="label" for="sport_type">Вид спорта</label>
        <select class="input" name="sport_type" id="sport_type">
            <option value=""> Выберите вид спорта </option>
            <?php foreach ($sport_type as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['sport_type'] ?></option>
            <?php endforeach; ?>
        </select>

        <label class="label" for="country">Страны</label>
        <select class="input" name="country" id="country">
            <option value=""> Выберите вид страну </option>
            <?php foreach ($country as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['country'] ?></option>
            <?php endforeach; ?>
        </select>

        <label class="label" for="athletes">Спортсмены</label>
        <select class="input" name="athletes" id="athletes">
            <option value="">Выберите имя сопортсмена </option>
            <?php foreach ($athletes as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
            <?php endforeach; ?>
        </select>

        <input class="input input_submit" type="submit" value="Отправить">
    </form>
    <table class="game_table">
        <tr>
            <th class="title_col"> Страна </th>
            <th class="title_col"> Медаль </th>
            <th class="title_col"> Вид спорта </th>
            <th class="title_col"> ФИО спортсмена </th>
            <th class="title_col">''</th>
        </tr>
        <?php foreach ($country_medals as $value) : ?>
            <tr>
                <td class="title_col"><?= $value['country'] ?></td>
                <td class="title_col"><?= $value['medal_type'] ?> </td>
                <td class="title_col"><?= $value['sport_type'] ?> </td>
                <td class="title_col"><?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?> </td>
                <td><a href="addMedals.php?id=<?= $value["id"] ?>">Удалить</a> </td>

            </tr>
        <?php endforeach; ?>
    </table>









</body>

</html>