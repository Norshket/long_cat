<?php
/* Smarty version 3.1.39, created on 2021-03-29 13:33:42
  from 'C:\OSPanel\domains\tasks\template\add_athleth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6061ad067ff718_54128405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c1d0d1bad09db050cec71316ef01d8d2134df35' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\add_athleth.tpl',
      1 => 1617004568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6061ad067ff718_54128405 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
  
    <div class="container">

        <h2 class="h2">Добавить спортсмена </h2>

        <div class="row justify-content-between">

            <form class="form col-md-4" action="/athleth/add" method="POST">

                <label class="form-label"   for="name"> Введите имя: </label>
                <input required class="form-control" type="text" name="name" id="name" value="">

                <label class="form-label" for="sure_name"> Введите фамилию:</label> <input required class="form-control" type="text" name="sure_name" id="sure_name" value="">

                <label class="form-label" for="patronymic"> Введите отчество:</label>
                <input class="form-control " type="text" name="patronymic" id="patronymic" value="">

                <input class="form-control btn-submit mt-4 " type="submit" value="Отправить">

            </form>

            <?php if ((isset($_smarty_tpl->tpl_vars['athletes']->value)) && $_smarty_tpl->tpl_vars['athletes']->value) {?>
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
                            <td><a class="btn bg-danger" href="/athleth/delete?del_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
?> <?php }
}
