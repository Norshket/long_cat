<?php

require_once "./function.php";

if (!($_GET)) {
    header('Location: /');
}
$conn = conn();

$country =(string)$_GET['country'];


$medalsNamesCountry = ORM:: for_table('country_medals')
                    ->select('medal_type.medal_type')
                    ->select('country.country')
                    ->select('sport_type.sport_type')
                    ->select_expr("GROUP_CONCAT(DISTINCT athletes.name , athletes.sure_name , athletes.patronymic SEPARATOR ', ')" , 'name')
                    ->join('medal_type','country_medals.medal_type_id = medal_type.id')
                    ->join('country' ,'country_medals.country_id = country.id')
                    ->join('athletes','country_medals.athletes_id = athletes.id')
                    ->join('sport_type','country_medals.sport_type_id = sport_type.id')
                    ->where('country.country',$country);

if ($_GET['medal']) {
	$medal=(int)$_GET['medal']; 
	
	$medalsNamesCountry->where('country_medals.medal_type_id', $medal);   
                           
}
                    
$medalsNamesCountry = $medalsNamesCountry->group_by('team')
                                        ->find_array();                                     

?>

<body>
    <?php include './tamplate/header.php' ?>
    <div class="container">
    <?php if (isset($medalsNamesCountry) && $medalsNamesCountry!=[] ) : ?>
    <h2 class="h2">Страна <?=$country?></h2>
        <table class="table" >
            <tr>
                <th>Вид спорта</th>
                <th>Медаль</th>
                <th>"ФИО" Спортсмена</th>
            </tr>

            <?php foreach ($medalsNamesCountry as $value) : ?>
                <tr>
                    <td><?= $value['sport_type'] ?></td>
                    <td><?= $value['medal_type'] ?></td>
                    <td><?= $value['name'] ?> </td>
                </tr>
            <?php endforeach; ?>

        </table>
    <?php else : ?>
        <p>Здесь нет медалей </p>
    <?php endif; ?>
    </div>
    <?php include './tamplate/footer.php' ?>
</body>

</html>