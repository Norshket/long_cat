<?php
/* Smarty version 3.1.39, created on 2021-03-26 17:32:21
  from 'C:\OSPanel\domains\tasks\template\add_sportType.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605df075427268_90971221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c8d6ca3f53fedb8d2962224e688e4694a5e8ffc' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\add_sportType.tpl',
      1 => 1616768733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_605df075427268_90971221 (Smarty_Internal_Template $_smarty_tpl) {
?>
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

            <?php if ((isset($_smarty_tpl->tpl_vars['all_sport_type']->value)) && $_smarty_tpl->tpl_vars['all_sport_type']->value) {?> 
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
                        <a  class="btn bg-danger" href="SportType/delete?del_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
}
}
