<?php
/* Smarty version 3.1.39, created on 2021-03-24 14:10:22
  from 'C:\OSPanel\domains\tasks\template\add_medals.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605b1e1ec39d43_74538525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9afc7df79e9adc591cbe6bab0d8d9247de8f65c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tasks\\template\\add_medals.tpl',
      1 => 1616584210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_605b1e1ec39d43_74538525 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 

    <div class="container">
    <h2 class="h2">Присвоение медалей</h2>
        <div class="row justify-content-between ">
            <form class="form col-lg-3" method="POST">
                <?php if ((isset($_smarty_tpl->tpl_vars['medals']->value)) && $_smarty_tpl->tpl_vars['medals']->value) {?>
                    <label class="form-label" for="medals">Медали</label>
                    <select class="form-control" name="medals" id="medals">
                        <option value=""> Выберите медаль </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['medals']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['medal_type'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                <?php }?>

                <?php if ((isset($_smarty_tpl->tpl_vars['sport_type']->value)) && $_smarty_tpl->tpl_vars['sport_type']->value) {?>
                    <label class="form-label" for="sport_type">Вид спорта</label>
                    <select class="form-control" name="sport_type" id="sport_type">
                        <option value=""> Выберите вид спорта </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sport_type']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?> 
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['sport_type'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                <?php }?>

                <?php if ((isset($_smarty_tpl->tpl_vars['country']->value)) && $_smarty_tpl->tpl_vars['country']->value) {?>
                    <label class="form-label" for="country">Страны</label>
                    <select class="form-control" name="country" id="country">
                        <option value=""> Выберите вид страну </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['country']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                <?php }?>


                <?php if ((isset($_smarty_tpl->tpl_vars['athletes']->value)) && 'athletes') {?>

                    <label class="form-label" for="athletes">Первый спортсмен</label>
                    <select class="form-control" name="athletes[1]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['athletes']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>

                    <label class="form-label" for="athletes">Второй спортсмен</label>
                    <select class="form-control" name="athletes[2]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['athletes']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                    <label class="form-label" for="athletes">Третий спортсмен</label>
                    <select class="form-control" name="athletes[3]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['athletes']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                    <label class="form-label" for="athletes">Четвёрытй спортсмен</label>
                    <select class="form-control" name="athletes[4]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['athletes']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                    <label class="form-label" for="athletes">Пятый спортсмен</label>
                    <select class="form-control" name="athletes[5]" id="athletes">
                        <option value="">Выберите имя сопортсмена </option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['athletes']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                <?php }?>
                <input class="form-control btn-submit mt-4" type="submit" value="Отправить">
            </form>

            <table class="table col-md-8">
                <tr>
                    <th>Страна</th>
                    <th>Медаль</th>
                    <th>Вид спорта</th>
                    <th>ФИО спортсмена</th>
                    <th>Удаление</th>
                </tr>

                <?php if ((isset($_smarty_tpl->tpl_vars['country_medals']->value)) && $_smarty_tpl->tpl_vars['country_medals']->value) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['country_medals']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['country'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['medal_type'];?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sport_type'];?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['sure_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['patronymic'];?>
</td>
                            <td><a  class="btn bg-danger" href="addMedals.php?del_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">Удалить</a> </td>

                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </table>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<?php }
}
