<?php
require_once './function.php';
$error = [];
$conn = conn();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `sport_type` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ./addSportType.php");
}


if (isset($_POST['sport_type']) && $_POST['sport_type'] != '') {
    $sport_type = mysqli_real_escape_string($conn, $_POST['sport_type']);
    $sql = "INSERT INTO sport_type (sport_type)
                VALUES('$sport_type')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ./index.php");
    }
}

$all_sport_type = select_sport_type($conn);



mysqli_close($conn);

?>

<body>
<?php include './tamplate/header.php'?>
<h2 class="title" >Добавить Вид спорта </h2>
    <form class="form" method="POST">
        
        <label for="sport_type" class="label"> Введите название</label>
        <input class="input" type="text" name="sport_type" id="sport_type" value="">
 
        <input class="input input_submit" type="submit" value="Отправить">
    </form>

    <?php foreach ($all_sport_type as $value) : ?>
        <ul>
            <li><?= $value['sport_type'] ?> <a href="./addSportType.php?id=<?= $value['id'] ?>">Удалить</a></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>