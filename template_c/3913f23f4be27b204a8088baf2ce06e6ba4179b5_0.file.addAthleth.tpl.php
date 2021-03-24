<?php
/* Smarty version 3.1.39, created on 2021-03-24 11:06:58
  from 'C:\OSPanel\domains\tasks\template\addAthleth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605af322b3b255_22292834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3913f23f4be27b204a8088baf2ce06e6ba4179b5' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\addAthleth.tpl',
      1 => 1616573217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_605af322b3b255_22292834 (Smarty_Internal_Template $_smarty_tpl) {
?><body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
  
    <div class="container">

        <h2 class="h2">Добавить спортсмена </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" method="POST">

                <label class="form-label" form="name"> Введите имя: </label>
                <input required class="form-control" type="text" name="name" id="name" value="">

                <label class="form-label" from="sure_name"> Введите фамилию:</label>
                <input required class="form-control" type="text" name="sure_name" id="sure_name" value="">

                <label class="form-label" from="patronymic"> Введите отчество:</label>
                <input class="form-control " type="text" name="patronymic" id="patronymic" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">

            </form>

            <?php if ((isset($_smarty_tpl->tpl_vars['athletes']->value))) {?>
                <table class="table  col-md-7">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['athletes']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                        <tr>
                            <td> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</td>
                            <td><a class="btn bg-danger" href="addAthleth.php?del_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">Удалить</a></td>
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
