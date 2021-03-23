<?php
require_once './function.php';
$error = [];
$conn = conn();

if (isset($_GET['del_id'])) {

    $del_id = (int) $_GET['del_id'];

    $delSportType = ORM::for_table('athletes')->find_one($del_id);
    $delSportType->delete();

    header("Location: ./addAthleth.php");
}
if ($_POST['name'] != '' && $_POST['sure_name'] != '') {
    $name = htmlentities($_POST['name']);
    $sure_name =  htmlentities($_POST['sure_name']);
    $patronymic = htmlentities($_POST['patronymic']);


    $addAthletes = ORM::for_table('athletes')->create();
    $addAthletes->name = $name;
    $addAthletes->sure_name = $sure_name;
    $addAthletes->patronymic = $patronymic;
    $addAthletes->save();
}
$athletes = select_athletes($conn);

?>

<body>
    <?php include './tamplate/header.php' ?>
    <div class="container">

        <h2 class="h2">Добавить спортсмена </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" method="POST">

                <label class="form-label" form="name"> Введите имя: </label>
                <input required class="form-control" type="text" name="name" id="name" value="">

                <label class="form-label" from="sure_name"> Введите фамилию:</label>
                <input required class="form-control" type="text" name="sure_name" id="sure_name" value="">

                <label class="form-label" from="patronymic"> Введите отчество:</label>
                <input class="form-control " type="text" name="patronymic" id="patronymic" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">

            </form>


            <?php if (isset($athletes)) : ?>
                <table class="table  col-md-7">
                    <?php foreach ($athletes as $value) : ?>
                        <tr>
                            <td> <?= $value['name']; ?> <?= $value['sure_name']; ?> <?= $value['patronymic']; ?></td>
                            <td><a class="btn bg-danger" href="./addAthleth.php?del_id=<?= $value['id'] ?>">Удалить</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif; ?>

        </div>
    </div>
    <?php include './tamplate/footer.php' ?>
</body>

</html>