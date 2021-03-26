<body>
  {include file ="header.tpl" } 
  
    <div class="container">

        <h2 class="h2">Добавить Страну </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" method="POST">

                <label class="form-label" for="country"> Введите название страны</label>
                <input required class="form-control" type="text" name="country" id="country" value="">

                <input class="form-control btn-submit mt-3" type="submit" value="Отправить">
            </form>
            {if isset($all_country) && $all_country}           
            <table class=" table col-md-6">
                {foreach $all_country as $value}
                <tr>
                    <td>{$value.country}</td>
                    <td> <a  class="btn bg-danger" href="addCountry.php?del_id={$value.id}"> Удалить</a></td>
                </tr>
                {/foreach}
            </table>
            {/if}
        </div>
    </div>
    {include file ="footer.tpl" } 
