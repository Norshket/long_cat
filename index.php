<?php
require_once './function.php';

$medals = [];
$conn = conn();


$type_sort = 'desc';
$column = 'gold';

if (isset($_GET['type_sort'])) {

    $type_sort = $_GET['type_sort'];
}
if (isset($_GET['column'])) {

    $column = $_GET['column'];
}

$medals =  ORM::for_table('country_medals')
            ->select_expr('ROW_NUMBER() OVER(ORDER BY gold desc, silver desc, cuprum desc ) ','position')
            ->select_expr(' SUM(medal_type_id=1)','gold')
            ->select_expr(' SUM(medal_type_id=2)','silver')
            ->select_expr(' SUM(medal_type_id=3)','cuprum')
            ->select_expr(' COUNT(medal_type_id)','all_medals')
            ->select('country')
            ->join('country' ,'country_medals.country_id = country.id')
            ->group_by('country_id')
            ->order_by_expr(  $column . " " . $type_sort)
            ->find_array();  
?>

<body>
    <?php include './tamplate/header.php' ?>
    <div class="container">

        <h1 class="h1">Олимпийские игры медальный зачёт</h1>
       

        <table class="table" >
            <tr>
                <th><a href="index.php?&column=position&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Места</a></th>
                <th><a href="index.php?column=country&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Страна</a></th>
                <th><a href="index.php?column=gold&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Золотые медали</a></th>
                <th><a href="index.php?column=silver&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Серебрянные медали</a></th>
                <th><a href="index.php?column=cuprum&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Медные медали</a></th>
                <th><a href="index.php?column=all_medals&type_sort=<?= ($type_sort == 'asc') ? 'desc' : 'asc' ?>">Все медали</a></th>
            </tr>

            <?php if(isset($medals)):?>
            <?php foreach ($medals as $value) : ?>
                <tr >
                    <td><?= $value['position'] ?></td>
                    <td><?= $value['country'] ?></td>
                    <td><a href="./pageAwards.php?medal=1&country=<?= $value['country'] ?>"><?= $value['gold'] ?></a></td>
                    <td><a href="./pageAwards.php?medal=2&country=<?= $value['country'] ?>"><?= $value['silver'] ?></a></td>
                    <td><a href="./pageAwards.php?medal=3&country=<?= $value['country'] ?>"><?= $value['cuprum'] ?></a></td>
                    <td><a href="./pageAwards.php?country=<?= $value['country'] ?>"><?= $value['all_medals'] ?></a></td>
                </tr>
            <?php endforeach; ?>
            <?php endif;?>

        </table>
    </div>

</body>

</html>