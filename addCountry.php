<?php

require_once './function.php';
$error = [];
$conn = conn();


if (isset($_GET['del_id'])) {

    $del_id = (int) $_GET['del_id'];

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
    <div class="container">

        <h2 class="h2">Добавить Страну </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" method="POST">

                <label class="form-label" for="country"> Введите название страны</label>
                <input required class="form-control" type="text" name="country" id="country" value="">

                <input class="form-control btn-submit mt-3" type="submit" value="Отправить">
            </form>
            <?php if (isset($all_country)) : ?>
            <table class=" table col-md-6">
                <?php foreach ($all_country as $value) : ?>
                <tr>
                    <td><?= $value['country'] ?></td>
                    <td> <a  class="btn bg-danger" href="addCountry.php?del_id=<?= $value['id'] ?>"> Удалить</a></td>
                </tr>
                <?php endforeach; ?>

            </table>
            <?php endif; ?>
        </div>
    </div>
    <?php include './tamplate/footer.php' ?>
</body>

</html>