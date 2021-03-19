<?php
require_once './function.php';
$error = [];
$conn = conn();
$medals = select_medal_type($conn);
$sport_type = select_sport_type($conn);
$country = select_country($conn);
$athletes = select_athletes($conn);



if (isset($_GET['del_id'])) {
    $sql = "DELETE FROM country_medals WHERE id=" . (int)$_GET['del_id'];
    $result = mysqli_query($conn, $sql);
    // header("Location: ./addMedals.php");
}

$athletes_name = $_POST['athletes'];

if (isset($athletes_name)) {
    $country_id = (int)$_POST['country'];
    $medals_id =  (int)$_POST['medals'];
    $sport_types_id = (int)$_POST['sport_type'];
    $team = uniqid();


    foreach ($athletes_name as $id) {
        if ($id != 0) {
            $athletes_id = (int) $id;
            $sql = "INSERT INTO country_medals (medal_type_id, country_id, athletes_id, sport_type_id, team )
                    VALUES ( $medals_id, $country_id ,$athletes_id, $sport_types_id, '$team')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die(mysqli_error($conn));
            }
        }
    }
}
$country_medals = country_medals($conn);

mysqli_close($conn);
?>

<body>

    <?php include './tamplate/header.php' ?>
    <div class="wrapper">
        <form class="form" method="POST">

            <?php if (isset($medals)) : ?>
                <label class="label" for="medals">Медали</label>
                <select class="input" name="medals" id="medals">
                    <option value=""> Выберите медаль </option>
                    <?php foreach ($medals as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['medal_type'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

            <?php if (isset($sport_type)) : ?>
                <label class="label" for="sport_type">Вид спорта</label>
                <select class="input" name="sport_type" id="sport_type">
                    <option value=""> Выберите вид спорта </option>
                    <?php foreach ($sport_type as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['sport_type'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

            <?php if (isset($country)) : ?>
                <label class="label" for="country">Страны</label>
                <select class="input" name="country" id="country">
                    <option value=""> Выберите вид страну </option>
                    <?php foreach ($country as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['country'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>


            <?php if (isset($athletes)) : ?>
                <label class="label" for="athletes">Первый спортсмен</label>
                <select class="input" name="athletes[1]" id="athletes">
                    <option value="">Выберите имя сопортсмена </option>
                    <?php foreach ($athletes as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label class="label" for="athletes">Второй спортсмен</label>
                <select class="input" name="athletes[2]" id="athletes">
                    <option value="">Выберите имя сопортсмена </option>
                    <?php foreach ($athletes as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="label" for="athletes">Третий спортсмен</label>
                <select class="input" name="athletes[3]" id="athletes">
                    <option value="">Выберите имя сопортсмена </option>
                    <?php foreach ($athletes as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="label" for="athletes">Четвёрытй спортсмен</label>
                <select class="input" name="athletes[4]" id="athletes">
                    <option value="">Выберите имя сопортсмена </option>
                    <?php foreach ($athletes as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="label" for="athletes">Пятый спортсмен</label>
                <select class="input" name="athletes[5]" id="athletes">
                    <option value="">Выберите имя сопортсмена </option>
                    <?php foreach ($athletes as $value) : ?>
                        <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <input class="input input_submit" type="submit" value="Отправить">
        </form>
        <table class="table">
            <tr>
                <th class="title_col">Страна</th>
                <th class="title_col">Медаль</th>
                <th class="title_col">Вид спорта</th>
                <th class="title_col">ФИО спортсмена</th>
                <th class="title_col">Удаление</th>
            </tr>

            <?php if (isset($country_medals)) : ?>
                <?php foreach ($country_medals as $value) : ?>
                    <tr>
                        <td class="title_col"><?= $value['country'] ?></td>
                        <td class="title_col"><?= $value['medal_type'] ?> </td>
                        <td class="title_col"><?= $value['sport_type'] ?> </td>
                        <td class="title_col"><?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></td>
                        <td class="title_col"><a href="addMedals.php?del_id=<?= $value["id"] ?>">Удалить</a> </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

    </div>









</body>

</html>