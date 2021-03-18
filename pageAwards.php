<?php
require_once "./function.php";

if (!($_GET)) {
    header('Location: /');
}
$conn = conn();


if ($_GET['medal']) {

    $medal_type = "AND medal_type_id =" . (int)$_GET['medal'];
}


$country = mysqli_real_escape_string($conn, $_GET['country']);

$sql = "SELECT medal_type,country,sport_type, GROUP_CONCAT(DISTINCT athletes.name , athletes.sure_name, athletes.patronymic SEPARATOR ', '  ) as `name` 
        FROM country_medals
        JOIN medal_type ON country_medals.medal_type_id = medal_type.id 
        JOIN country ON country_medals.country_id = country.id
        JOIN athletes  ON country_medals.athletes_id = athletes.id
        JOIN sport_type ON country_medals.sport_type_id = sport_type.id
        WHERE  country = '$country'  $medal_type 
        GROUP BY team
        ";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
    $medals_and_people = $row;
}
?>



<?php include './tamplate/header.php' ?>

<body>
    <?php if (isset($medals_and_people)) : ?>
        <table class="table">
            <tr>
                <th class="title_col">Страна </th>
                <th class="title_col">Вид спорта</th>
                <th class="title_col">Медаль</th>
                <th class="title_col">"ФИО" Спортсмена</th>
            </tr>

            <?php foreach ($medals_and_people as $value) : ?>
                <tr>
                    <td class="title_col"><?= $value['country'] ?></td>
                    <td class="title_col"><?= $value['sport_type'] ?></td>
                    <td class="title_col"><?= $value['medal_type'] ?></td>
                    <td class="title_col"><?= $value['name'] ?> </td>
                </tr>
            <?php endforeach; ?>

        </table>
    <?php else : ?>
        <p class="label">Здесь нет медалей </p>
    <?php endif; ?>

</body>

</html>