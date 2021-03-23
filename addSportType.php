<?php
require_once './function.php';
$error = [];
$conn = conn();

if (isset($_GET['del_id'])) {

    $del_id = $_GET['del_id'];

    $delSportType = ORM::for_table('sport_type')->find_one($del_id);
    $delSportType->delete();

    header("Location: ./addSportType.php");
}


if (isset($_POST['sport_type']) && $_POST['sport_type'] != '') {

    $sport_type = htmlentities($_POST['sport_type']);

    $addSportType = ORM::for_table('sport_type')->create();
    $addSportType->sport_type = $sport_type;
    $addSportType->save();
}
$all_sport_type = select_sport_type($conn);

?>

<body>
    <?php include './tamplate/header.php' ?>
    
    <div class="container">
    <h2 class="h2">Добавить Вид спорта </h2>
        <div class="row justify-content-between" >
            <form class="form col-lg-4" method="POST">

                <label for="sport_type" class="form-label"> Введите название</label>
                <input required class="form-control" type="text" name="sport_type" id="sport_type" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">
            </form>

            <?php if (isset($all_sport_type)) : ?> 
            <table class="table col-lg-6">
            <?php foreach ($all_sport_type as $value) : ?>
                <tr>
                    <td><?= $value['sport_type'] ?></td>
                    <td>
                        <a  class="btn bg-danger" href="./addSportType.php?del_id=<?= $value['id'] ?>">Удалить</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>                        
            
            <?php endif; ?>
        </div>
    </div>

    <?php include './tamplate/footer.php' ?>
</body>

</html>