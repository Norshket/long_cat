<?php
require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM `country` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ./addCountry.php");
}

if (isset($_POST['country']) && $_POST['country'] != '') {
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $sql = "INSERT INTO country (country)
                VALUES('$country')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ./index.php");
    }
}

$all_country = select_country($conn);


mysqli_close($conn);

?>


<body>
    <?php include './tamplate/header.php' ?>
    <h2 class="title">Добавить Страну </h2>
    <form class="form" method="POST">
        
        <label for="country"> Введите название страны</label>
        <input class="input" type="text" name="country" id="country" value="">

        <input class="input input_submit" type="submit" value="Отправить">
    </form>

    <?php foreach ($all_country as $value) : ?>
        <ul>
            <li><?= $value['country'] ?> <a href="./addCountry.php?id=<?= $value['id'] ?>">Удалить</a></li>

        </ul>
    <?php endforeach; ?>
</body>

</html>