
    {include file = "header.tpl"}

    <div class="container">
    <h2 class="h2">Добавить Вид спорта </h2>
        <div class="row justify-content-between" >
            <form class="form col-lg-4" method="POST">

                <label for="sport_type" class="form-label"> Введите название</label>
                <input required class="form-control" type="text" name="sport_type" id="sport_type" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">
            </form>

            {if isset($all_sport_type) && $all_sport_type } 
            <table class="table col-lg-6">
            {foreach $all_sport_type as $value}
                <tr>
                    <td>{$value.sport_type}</td>
                    <td>
                        <a  class="btn bg-danger" href="addSportType.php?del_id={$value.id}">Удалить</a>
                    </td>
                </tr>
            {/foreach}
            </table>                        
            
            {/if}
        </div>
    </div>

    {include file = "footer.tpl"}
