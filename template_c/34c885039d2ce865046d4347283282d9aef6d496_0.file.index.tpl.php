<?php
/* Smarty version 3.1.39, created on 2021-03-26 17:34:11
  from 'C:\OSPanel\domains\tasks\template\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605df0e35cd6e5_89040168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34c885039d2ce865046d4347283282d9aef6d496' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\index.tpl',
      1 => 1616583143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_605df0e35cd6e5_89040168 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
    <div class="container">

        <h1 class="h1">Олимпийские игры медальный зачёт</h1>       

        <table class="table" >
            <tr>
                <th><a href="index.php?&column=position&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Места</a></th>
                <th><a href="index.php?column=country&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Страна</a></th>
                <th><a href="index.php?column=gold&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Золотые медали</a></th>
                <th><a href="index.php?column=silver&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Серебрянные медали</a></th>
                <th><a href="index.php?column=cuprum&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Медные медали</a></th>
                <th><a href="index.php?column=all_medals&type_sort=<?php if ($_smarty_tpl->tpl_vars['type_sort']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>">Все медали</a></th>
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
                    <td><a href="pageAwards.php?medal=1&country=<?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['gold'];?>
</a></td>
                    <td><a href="pageAwards.php?medal=2&country=<?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['silver'];?>
</a></td>
                    <td><a href="pageAwards.php?medal=3&country=<?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['cuprum'];?>
</a></td>
                    <td><a href="pageAwards.php?country=<?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
"> <?php echo $_smarty_tpl->tpl_vars['value']->value['all_medals'];?>
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
