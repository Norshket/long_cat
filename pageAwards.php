<?php
require_once "./function.php";

if (!($_GET)) {
    header('Location: /');
}
$conn = conn();
$medal_type = (int)$_GET['medal'];

if($_GET['medal'] !=''){
  $medal_type = " medal_type_id = ".(int)$_GET['medal']." AND ";
}
$country = mysqli_real_escape_string($conn, $_GET['country']);

$sql = "SELECT * FROM country_medals
    JOIN medal_type ON country_medals.medal_type_id = medal_type.id 
    JOIN country ON country_medals.country_id = country.id
    JOIN athletes ON country_medals.athletes_id = athletes.id
    JOIN sport_type ON country_medals.sport_type_id = sport_type.id
    WHERE $medal_type country = '$country'
    ORDER BY medal;
    ";
    

$result = mysqli_query($conn, $sql);

$medals_and_people = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo '<pre>';
var_dump($medals_and_people);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>


</body>

</html>