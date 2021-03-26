    {include file ="header.tpl" } 

    <div class="container">
    <h2 class="h2">Присвоение медалей</h2>
        <div class="row justify-content-between ">
            <form class="form col-lg-3" method="POST">
                {if isset($medals) && $medals }
                    <label class="form-label" for="medals">Медали</label>
                    <select class="form-control" name="medals" id="medals">
                        <option value=""> Выберите медаль </option>
                        {foreach $medals as $value}
                            <option value="{$value.id}">{$value.medal_type}</option>
                        {/foreach}
                    </select>
                {/if}

                {if isset($sport_type) && $sport_type}
                    <label class="form-label" for="sport_type">Вид спорта</label>
                    <select class="form-control" name="sport_type" id="sport_type">
                        <option value=""> Выберите вид спорта </option>
                        {foreach $sport_type as $value} 
                            <option value="{$value.id}">{$value.sport_type}</option>
                        {/foreach}
                    </select>
                {/if}

                {if isset ($country) && $country}
                    <label class="form-label" for="country">Страны</label>
                    <select class="form-control" name="country" id="country">
                        <option value=""> Выберите вид страну </option>
                        {foreach $country as $value}
                            <option value="{$value.id}">{$value.country}</option>
                        {/foreach}
                    </select>
                {/if}


                {if isset($athletes) && athletes}

                    <label class="form-label" for="athletes">Первый спортсмен</label>
                    <select class="form-control" name="athletes[1]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        {foreach $athletes as $value}
                            <option value="{$value.id}"> {$value.name} {$value.sure_name} {$value.patronymic}</option>
                        {/foreach}
                    </select>

                    <label class="form-label" for="athletes">Второй спортсмен</label>
                    <select class="form-control" name="athletes[2]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        {foreach $athletes as $value}
                            <option value="{$value.id}"> {$value.name} {$value.sure_name} {$value.patronymic}</option>
                        {/foreach}
                    </select>
                    <label class="form-label" for="athletes">Третий спортсмен</label>
                    <select class="form-control" name="athletes[3]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        {foreach $athletes as $value}
                            <option value="{$value.id}"> {$value.name} {$value.sure_name} {$value.patronymic}</option>
                        {/foreach}
                    </select>
                    <label class="form-label" for="athletes">Четвёрытй спортсмен</label>
                    <select class="form-control" name="athletes[4]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        {foreach $athletes as $value}
                            <option value="{$value.id}"> {$value.name} {$value.sure_name} {$value.patronymic}</option>
                        {/foreach}
                    </select>
                    <label class="form-label" for="athletes">Пятый спортсмен</label>
                    <select class="form-control" name="athletes[5]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        {foreach $athletes as $value}
                            <option value="{$value.id}"> {$value.name} {$value.sure_name} {$value.patronymic}</option>
                        {/foreach}
                    </select>
                {/if}
                <input class="form-control btn-submit mt-4" type="submit" value="Отправить">
            </form>

            <table class="table col-md-8">
                <tr>
                    <th>Страна</th>
                    <th>Медаль</th>
                    <th>Вид спорта</th>
                    <th>ФИО спортсмена</th>
                    <th>Удаление</th>
                </tr>

                {if isset($country_medals) && $country_medals}
                    {foreach $country_medals as $value}
                        <tr>
                            <td>{$value.country}</td>
                            <td>{$value.medal_type} </td>
                            <td>{$value.sport_type} </td>
                            <td>{$value.name} {$value.sure_name} {$value.patronymic}</td>
                            <td><a  class="btn bg-danger" href="addMedals.php?del_id={$value.id}">Удалить</a> </td>

                        </tr>
                    {/foreach}
                {/if}
            </table>
        </div>
    </div>
    {include file ="footer.tpl" } 
