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
    if(!$result){
        die(mysqli_error($conn));
    }
}
$country_medals = country_medals($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <title>Присвоение медалей</title>
</head>


<body>

    <?php include './tamplate/header.php' ?>
    <form method="POST">
        <label for="medals">Медали</label>
        <select name="medals" id="medals">
            <option value=""> Выберите медаль </option>
            <?php foreach ($medals as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['medal'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="sport_type">Вид спорта</label>
        <select name="sport_type" id="sport_type">
            <option value=""> Выберите вид спорта </option>
            <?php foreach ($sport_type as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['sport_type'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="country">Страны</label>
        <select name="country" id="country">
            <option value=""> Выберите вид страну </option>
            <?php foreach ($country as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['country'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="athletes">Спортсмены</label>
        <select name="athletes" id="athletes">
            <option value="">Выберите имя сопортсмена </option>
            <?php foreach ($athletes as $value) : ?>
                <option value="<?= $value['id'] ?>"> <?= $value['name'] ?> <?= $value['sure_name'] ?> <?= $value['patronymic'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Отправить">
    </form>
    <table border="1">
        <tr>
            <th> Страна </th>
            <th> Медаль </th>
            <th> Вид спорта </th>
            <th> ФИО спортсмена </th>
            <th>  </th>
        </tr>
        <?php foreach ($country_medals as $value) : ?>
            <tr>
                <td><?=$value['country']?></td>
                <td><?=$value['medal']?> </td>
                <td><?=$value['sport_type']?> </td>
                <td><?=$value['name']?> <?=$value['sure_name']?> <?=$value['patronymic']?> </td>
                 <td><a href="addMedals.php?id=<?=$value["id"]?>">Удалить</a> </td>

            </tr>
        <?php endforeach; ?>
    </table>









</body>

</html>