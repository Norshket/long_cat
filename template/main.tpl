    {include file ="header.tpl" } 
    <div class="container">

        <h1 class="h1">Олимпийские игры медальный зачёт</h1>       

        <table class="table" >
            <tr>
                <th><a href="/main/view?&column=position&type_sort={if $type_sort == 'asc'}desc{else}asc{/if}">Места</a></th>
                <th><a href="/main/view?column=country&type_sort={if $type_sort == 'asc'}desc{else}asc{/if}">Страна</a></th>
                <th><a href="/main/view?column=gold&type_sort={if $type_sort == 'asc'}desc{else}asc{/if}">Золотые медали</a></th>
                <th><a href="/main/view?column=silver&type_sort={if $type_sort == 'asc'}desc{else}asc{/if}">Серебрянные медали</a></th>
                <th><a href="/main/view?column=cuprum&type_sort={if $type_sort == 'asc'}desc{else}asc{/if}">Медные медали</a></th>
                <th><a href="/main/view?column=all_medals&type_sort={if $type_sort == 'asc'}desc{else}asc{/if}">Все медали</a></th>
            </tr>


            {if isset($medals)}
            {foreach $medals as $value}
                <tr>
                    <td>{$value.position}</td>
                    <td>{$value.country}</td>
                    <td><a href="/page/view?medal=1&country_id={$value.country_id}">{$value.gold}</a></td>
                    <td><a href="/page/view?medal=2&country_id={$value.country_id}">{$value.silver}</a></td>
                    <td><a href="/page/view?medal=3&country_id={$value.country_id}">{$value.cuprum}</a></td>
                    <td><a href="/page/view?country_id={$value.country_id}">{$value.all_medals}</a></td>
                </tr>

            {/foreach}
            {/if}

          
        </table>
    </div>
    {include file ="footer.tpl" } 
