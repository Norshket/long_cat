<?php
/* Smarty version 3.1.39, created on 2021-03-24 13:05:45
  from 'C:\OSPanel\domains\tasks\template\addSportType.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605b0ef9eb2676_23384287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88208a04beeaef7f97792b8ac4b2cd9c5ad1b8ab' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\addSportType.tpl',
      1 => 1616580146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_605b0ef9eb2676_23384287 (Smarty_Internal_Template $_smarty_tpl) {
?><body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container">
    <h2 class="h2">Добавить Вид спорта </h2>
        <div class="row justify-content-between" >
            <form class="form col-lg-4" method="POST">

                <label for="sport_type" class="form-label"> Введите название</label>
                <input required class="form-control" type="text" name="sport_type" id="sport_type" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">
            </form>

            <?php if ((isset($_smarty_tpl->tpl_vars['all_sport_type']->value))) {?> 
            <table class="table col-lg-6">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_sport_type']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sport_type'];?>
</td>
                    <td>
                        <a  class="btn bg-danger" href="addSportType.php?del_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">Удалить</a>
                    </td>
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
</body>

</html><?php }
}
