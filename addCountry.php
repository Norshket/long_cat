<?php

require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['del_id'])) {

    $del_id =(int) $_GET['del_id'];

    $delSportType = ORM::for_table('country')->find_one($del_id);
    $delSportType->delete();    

    header("Location: ./addCountry.php");
}

if (isset($_POST['country']) && $_POST['country'] != '') {


    $country = htmlentities($_POST['country']);


    $addCountry = ORM::for_table('country')->create();
    $addCountry->country = $country;
    $addCountry->save();

  
    if ($result) {
        header("Location: ./addCountry.php");
        
    }
}

$all_country = select_country($conn);

?>

<body>
    <?php include './tamplate/header.php' ?>
    <h2 class="title">Добавить Страну </h2>
    <form class="form" method="POST">

        <label for="country"> Введите название страны</label>
        <input required class="input" type="text" name="country" id="country" value="">

        <input class="input input_submit" type="submit" value="Отправить">
    </form>

    <?php if (isset($all_country)) : ?>
        <?php foreach ($all_country as $value) : ?>
            <ul>
                <li><?= $value['country'] ?>
                    <a href="addCountry.php?del_id=<?= $value['id'] ?>"> Удалить</a>
                </li>


            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>