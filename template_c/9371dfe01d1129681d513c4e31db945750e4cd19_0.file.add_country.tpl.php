<?php
/* Smarty version 3.1.39, created on 2021-03-24 14:10:23
  from 'C:\OSPanel\domains\tasks\template\add_country.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605b1e1f7ba647_64546213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9371dfe01d1129681d513c4e31db945750e4cd19' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\add_country.tpl',
      1 => 1616584112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_605b1e1f7ba647_64546213 (Smarty_Internal_Template $_smarty_tpl) {
?><body>
  <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
  
    <div class="container">

        <h2 class="h2">Добавить Страну </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" method="POST">

                <label class="form-label" for="country"> Введите название страны</label>
                <input required class="form-control" type="text" name="country" id="country" value="">

                <input class="form-control btn-submit mt-3" type="submit" value="Отправить">
            </form>
            <?php if ((isset($_smarty_tpl->tpl_vars['all_country']->value)) && $_smarty_tpl->tpl_vars['all_country']->value) {?>           
            <table class=" table col-md-6">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_country']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
</td>
                    <td> <a  class="btn bg-danger" href="addCountry.php?del_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"> Удалить</a></td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <?php }?>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<?php }
}
