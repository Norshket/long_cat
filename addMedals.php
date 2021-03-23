<?php

require_once './function.php';
$error = [];

$conn = conn();


$medals = select_medal_type();
$sport_type = select_sport_type();
$country = select_country();
$athletes = select_athletes();



if (isset($_GET['del_id'])) {

    $del_id = (int) $_GET['del_id'];

    $delSportType = ORM::for_table('country_medals')->find_one($del_id);
    $delSportType->delete();


    header("Location: ./addMedals.php");
}

$athletes_name = $_POST['athletes'];

if (isset($athletes_name)) {

    $country_id = (int)$_POST['country'];
    $medals_id = (int) $_POST['medals'];
    $sport_types_id = (int)$_POST['sport_type'];
    $team = uniqid();

    foreach ($athletes_name as $id) {
        if ($id != 0) {

            $addMedals = ORM::for_table('country_medals')->create();
            $addMedals->medal_type_id = $medals_id;
            $addMedals->country_id = $country_id;
            $addMedals->team = $team;
            $addMedals->sport_type_id = $sport_types_id;
            $addMedals->athletes_id = $id;
            $addMedals->save();
        }
    }
}

$country_medals = country_medals();
?>

<body>
    <?php include './tamplate/header.php' ?>
    <div class="container">
    <h2 class="h2">Присвоение медалей</h2>
        <div class="row justify-content-between ">
            <form class="form col-lg-3" method="POST">
                <?php if (isset($medals)) : ?>
                    <label class="form-label" for="medals">Медали</label>
                    <select class="form-control" name="medals" id="medals">
                        <option value=""> Выберите медаль </option>
                        <?php foreach ($medals as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['medal_type'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>

                <?php if (isset($sport_type)) : ?>
                    <label class="form-label" for="sport_type">Вид спорта</label>
                    <select class="form-control" name="sport_type" id="sport_type">
                        <option value=""> Выберите вид спорта </option>
                        <?php foreach ($sport_type as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['sport_type'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>

                <?php if (isset($country)) : ?>
                    <label class="form-label" for="country">Страны</label>
                    <select class="form-control" name="country" id="country">
                        <option value=""> Выберите вид страну </option>
                        <?php foreach ($country as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['country'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>


                <?php if (isset($athletes)) : ?>
                    <label class="form-label" for="athletes">Первый спортсмен</label>
                    <select class="form-control" name="athletes[1]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php foreach ($athletes as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="form-label" for="athletes">Второй спортсмен</label>
                    <select class="form-control" name="athletes[2]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php foreach ($athletes as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="form-label" for="athletes">Третий спортсмен</label>
                    <select class="form-control" name="athletes[3]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php foreach ($athletes as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="form-label" for="athletes">Четвёрытй спортсмен</label>
                    <select class="form-control" name="athletes[4]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php foreach ($athletes as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="form-label" for="athletes">Пятый спортсмен</label>
                    <select class="form-control" name="athletes[5]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php foreach ($athletes as $value) : ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
                <input class="form-control btn-submit mt-4" type="submit" value="Отправить">
            </form>

            <table class="table col-md-8">
                <tr>
                    <th>Страна</th>
                    <th>Медаль</th>
                    <th>Вид спорта</th>
                    <th>ФИО спортсмена</th>
                    <th>Удаление</th>
                </tr>

                <?php if (isset($country_medals)) : ?>
                    <?php foreach ($country_medals as $value) : ?>
                        <tr>
                            <td><?= $value['country'] ?></td>
                            <td><?= $value['medal_type'] ?> </td>
                            <td><?= $value['sport_type'] ?> </td>
                            <td><?= $value['name'] ?> <?= $value['sure_name'] ?><?= $value['patronymic'] ?></td>
                            <td><a  class="btn bg-danger" href="addMedals.php?del_id=<?= $value["id"] ?>">Удалить</a> </td>

                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php include './tamplate/footer.php' ?>
</body>

</html>