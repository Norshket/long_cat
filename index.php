<?php
require_once './function.php';


$medals = [];
$conn = conn();

$type_sort = 'asc';
$column = 'country';

if (isset($_GET['type_sort'])) {

    $type_sort = $_GET['type_sort'];
}
if (isset($_GET['column'])) {

    $column = $_GET['column'];
}

$sql = "SELECT SUM(medal_type_id=1) AS gold, SUM(medal_type_id=2) as silver, SUM(medal_type_id=3) as cuprum, COUNT(medal_type_id) as all_medals, country FROM country_medals
JOIN country ON country_medals.country_id = country.id 
GROUP BY country_id
ORDER BY " . $column . " " . $type_sort;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
    $medals = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <title>Игры</title>
</head>

<body>
    <?php include './tamplate/header.php' ?>
    <div class="container">

        <h1 class="game_title">Олимпийские Игры</h1>
        <h1 class="game_title">Медальный зачёт</h1>

        <table class="game_table">
            <tr clalss="game_row">
                <th class="game_title_col"><a href="index.php?column=country&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Страна</a></th>
                <th class="game_title_col"><a href="index.php?column=gold&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Золотые медали</a></th>
                <th class="game_title_col"><a href="index.php?column=silver&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Серебрянные медали</a></th>
                <th class="game_title_col"><a href="index.php?column=cuprum&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Медные медали</a></th>
                <th class="game_title_col"><a href="index.php?column=all_medals&type_sort=<?=($type_sort == 'asc') ? 'desc' : 'asc'?>">Все медали</a></th>
            </tr>
            <?php foreach ($medals as $value) : ?>
                <tr class="game_row">
                    <td class="game_title_col"><?= $value['country'] ?></td>
                    <td class="game_title_col"><a href="./pageAwards.php?medal=1&country=<?= $value['country'] ?>"><?= $value['gold'] ?></a></td>
                    <td class="game_title_col"><a href="./pageAwards.php?medal=2&country=<?= $value['country'] ?>"><?= $value['silver'] ?></a></td>
                    <td class="game_title_col"><a href="./pageAwards.php?medal=3&country=<?= $value['country'] ?>"><?= $value['cuprum'] ?></a></td>
                    <td class="game_title_col"><a href="./pageAwards.php?country=<?= $value['country'] ?>"><?= $value['all_medals'] ?></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>