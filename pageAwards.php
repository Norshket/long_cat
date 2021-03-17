<?php
require_once "./function.php";

if (!($_GET)) {
    header('Location: /');
}
$conn = conn();


if ($_GET['medal']) {

    $medal_type = (int)$_GET['medal'];
    $medal_type = "AND medal_type_id = " . (int)$_GET['medal'] ;
  
   
}


$country = mysqli_real_escape_string($conn, $_GET['country']);

$sql = "SELECT * FROM country_medals
        JOIN medal_type ON country_medals.medal_type_id = medal_type.id 
        JOIN country ON country_medals.country_id = country.id
        JOIN athletes ON country_medals.athletes_id = athletes.id
        JOIN sport_type ON country_medals.sport_type_id = sport_type.id
        WHERE  country = '$country' ". $medal_type."
        ORDER BY medal_type  
";

$result = mysqli_query($conn, $sql);

$medals_and_people = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include './tamplate/header.php' ?>
<body>

<table class="table">
    <tr>
        <th class="title_col">Страна </th>
        <th class="title_col">Вид спорта</th>
        <th class="title_col">Медаль</th>
        <th class="title_col">"ФИО" Спортсмена</th>
    </tr>
    <?php foreach($medals_and_people as $value)?>
    <tr>
        <td class="title_col"><?=$value['country']?></td>
        <td class="title_col"><?=$value['medal_type']?></td>
        <td class="title_col"><?=$value['sport_type']?></td>
        <td class="title_col"><?=$value['name']?> <?=$value['sure_name']?> <?=$value['patronymic']?></td>
    </tr>

</table>
    

</body>

</html>