<?php
require_once './function.php';
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
    <?php include './tamplate/header.php'?>
    <div class="container">

        <h1 class="game_title">Олимпийские Игры</h1>
        <h1 class="game_title">Медальный зачёт</h1>

        <table class="game_table">
            <tr clalss="game_row">
                <th class="game_title_col">Страна</th>
                <th class="game_title_col">Золотые медали</th>
                <th class="game_title_col">Серебрянные медали</th>
                <th class="game_title_col">Медные медали</th>
                <th class="game_title_col">Все медали</th>
            </tr>
            <!-- <?php foreach ($all as $value) : ?>
                <tr class="game_row">
                    <td class="game_col"><?= $value['country'] ?></td>
                    <td class="game_col"><?= $value['gold'] ?></td>
                    <td class="game_col"><?= $value['silver'] ?></td>
                    <td class="game_col"><?= $value['cuprum'] ?></td>
                    <td class="game_col"><?= $value['cuprum'] + $value['silver'] + $value['gold'] ?></td>
                </tr>
            <?php endforeach; ?> -->
        </table>
    </div>

</body>

</html>