<?php

require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['del_id'])) {
    $sql = "DELETE FROM `country` WHERE id =".(int) $_GET['del_id'];;
    $sql = "DELETE FROM `country_medals` WHERE country_id =".(int) $_GET['del_id'];;
    $result = mysqli_query($conn, $sql);
    header("Location: ./addCountry.php");
}

if (isset($_POST['country']) && $_POST['country'] != '') {
    $country = mysqli_real_escape_string($conn, (string)$_POST['country']);
    $sql = "INSERT INTO country (country)
                VALUES('$country')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // header("Location: ./index.php");
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
        <input required class="input" type="text" name="country" id="country" value="">

        <input class="input input_submit" type="submit" value="Отправить">
    </form>

    <?php if (isset($all_country)):?>
        <?php foreach ($all_country as $value) : ?>
            <ul>
                <li><?= $value['country'] ?> <a href="./addCountry.php?del_id=<?= $value['id'] ?>">Удалить</a></li>

            </ul>
        <?php endforeach; ?>
    <?php endif;?>
</body>

</html>