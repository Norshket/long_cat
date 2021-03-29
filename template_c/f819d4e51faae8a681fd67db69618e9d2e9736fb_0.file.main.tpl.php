<?php
/* Smarty version 3.1.39, created on 2021-03-29 13:33:41
  from 'C:\OSPanel\domains\tasks\template\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6061ad0551b8d9_27374889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f819d4e51faae8a681fd67db69618e9d2e9736fb' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\main.tpl',
      1 => 1617013728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6061ad0551b8d9_27374889 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
    <div class="container">

        <h1 class="h1">Олимпийские игры медальный зачёт</h1>       

        <table class="table" >
            <tr>
                <th><a href="/main/view?&column=position&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Места</a></th>
                <th><a href="/main/view?column=country&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Страна</a></th>
                <th><a href="/main/view?column=gold&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Золотые медали</a></th>
                <th><a href="/main/view?column=silver&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Серебрянные медали</a></th>
                <th><a href="/main/view?column=cuprum&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Медные медали</a></th>
                <th><a href="/main/view?column=all_medals&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Все медали</a></th>
            </tr>


            <?php if ((isset($_smarty_tpl->tpl_vars['medals']->value))) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['medals']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['position'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
</td>
                    <td><a href="/page/view?medal=1&country_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['gold'];?>
</a></td>
                    <td><a href="/page/view?medal=2&country_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['silver'];?>
</a></td>
                    <td><a href="/page/view?medal=3&country_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['cuprum'];?>
</a></td>
                    <td><a href="/page/view?country_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['all_medals'];?>
</a></td>
                </tr>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>

          
        </table>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<?php }
}
