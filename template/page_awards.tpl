<body>
    {include file = "header.tpl"}
    <div class="container">
    {if isset($medalsNamesCountry) && $medalsNamesCountry}
    <h2 class="h2">Страна{$country}</h2>
        <table class="table" >
            <tr>
                <th>Вид спорта</th>
                <th>Медаль</th>
                <th>"ФИО" Спортсмена</th>
            </tr>

            {foreach $medalsNamesCountry as $value}
                <tr>
                    <td>{$value.sport_type}</td>
                    <td>{$value.medal_type}</td>
                    <td>{$value.name}</td>
                </tr>
            {/foreach}
        </table>
    {else}
        <p>Здесь нет медалей </p>
    {/if}
    </div>
    {include file = "footer.tpl"}
