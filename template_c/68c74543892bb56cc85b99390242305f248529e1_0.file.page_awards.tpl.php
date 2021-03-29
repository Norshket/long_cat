<?php
/* Smarty version 3.1.39, created on 2021-03-29 13:34:07
  from 'C:\OSPanel\domains\tasks\template\page_awards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6061ad1f9ee022_22661581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68c74543892bb56cc85b99390242305f248529e1' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\page_awards.tpl',
      1 => 1617014045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6061ad1f9ee022_22661581 (Smarty_Internal_Template $_smarty_tpl) {
?><body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
    <?php if ((isset($_smarty_tpl->tpl_vars['medalsNamesCountry']->value)) && $_smarty_tpl->tpl_vars['medalsNamesCountry']->value) {?>
    <h2 class="h2">Страна <?php echo $_smarty_tpl->tpl_vars['medalsNamesCountry']->value[0]['country'];?>
</h2>
        <table class="table" >
            <tr>
                <th>Вид спорта</th>
                <th>Медаль</th>
                <th>"ФИО" Спортсмена</th>
            </tr>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['medalsNamesCountry']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sport_type'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['medal_type'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    <?php } else { ?>
        <p>Здесь нет медалей </p>
    <?php }?>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
