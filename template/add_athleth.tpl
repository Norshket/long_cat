    {include file ="header.tpl" } 
  
    <div class="container">

        <h2 class="h2">Добавить спортсмена </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" action="/athleth/add" method="POST">

                <label class="form-label"   for="name"> Введите имя: </label>
                <input required class="form-control" type="text" name="name" id="name" value="">

                <label class="form-label" for="sure_name"> Введите фамилию:</label> <input required class="form-control" type="text" name="sure_name" id="sure_name" value="">

                <label class="form-label" for="patronymic"> Введите отчество:</label>
                <input class="form-control " type="text" name="patronymic" id="patronymic" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">

            </form>

            {if isset($athletes) && $athletes }
                <table class="table  col-md-7">
                    {foreach $athletes as $value}
                        <tr>
                            <td> {$value.name} {$value.sure_name} {$value.patronymic}</td>
                            <td><a class="btn bg-danger" href="/athleth/delete?del_id={$value.id}">Удалить</a></td>
                        </tr>
                {/foreach}
                </table>

            {/if}
        </div>
    </div>
    {include file ="footer.tpl" } 