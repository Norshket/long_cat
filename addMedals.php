<?php

require_once './function.php';
$error = [];
$conn = conn();
$medals = select_medal_type();
$sport_type = select_sport_type();
$country = select_country();
$athletes = select_athletes();



if (isset($_GET['del_id'])) {

    $del_id =(int) $_GET['del_id'];

    $delSportType = ORM::for_table('country_medals')->find_one($del_id);
    $delSportType->delete();

    
    header("Location: ./addMedals.php");
}

$athletes_name = $_POST['athletes'];

if (isset($athletes_name)) {
    
    $country_id =(int)$_POST['country'];
    $medals_id = (int) $_POST['medals'];
    $sport_types_id = (int)$_POST['sport_type'];
    $team = uniqid() ;  
    
    $addMedals = ORM:: for_table('country_medals')->create();    
    $addMedals->medal_type_id=$medals_id;
    $addMedals->country_id=$country_id;
    $addMedals->team=$team;
    $addMedals->sport_type_id=$sport_types_id;
    

    foreach($athletes_name as $id){
        if ($id != 0){
            $addMedals->athletes_id=$id;
            $addMedals->save();
        }
    }

}

$country_medals = country_medals(); 
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