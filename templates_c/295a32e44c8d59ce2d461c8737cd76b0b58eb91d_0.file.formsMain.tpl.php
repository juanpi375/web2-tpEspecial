<?php
/* Smarty version 3.1.33, created on 2019-10-22 14:59:19
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\formsMain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5daefd27818a26_16272853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '295a32e44c8d59ce2d461c8737cd76b0b58eb91d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\formsMain.tpl',
      1 => 1571748262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5daefd27818a26_16272853 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="editProd" method="POST">
    <h3>Seleccione un producto a editar..</h3>
        <select name="p_selected" id="P_selected">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prodArray']->value, 'prod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
?>  
            <option value="<?php echo $_smarty_tpl->tpl_vars['prod']->value->id_producto;?>
">
            <?php echo $_smarty_tpl->tpl_vars['prod']->value->nombre;?>

            </option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <label for="P_name">Nombre:</label>
    <input type="text" name="p_name" id="P_name">
    <input type="submit" value="Guardar">
</form> 




<form action="addProd" method="POST">
    <h3>Agregar un nuevo producto..</h3>
    <label for="P_name">Nombre:</label>
    <input type="text" name="p_name" id="P_name">
    <input type="submit" value="Agregar">
</form>




<form action="addModel" method="POST" enctype="multipart/form-data">
    <h3>Agregar un nuevo modelo..</h3>
    <label for="P_selection"></label>
    <select name="p_selection" id="P_selection">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prodArray']->value, 'prod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['prod']->value->id_producto;?>
"><?php echo $_smarty_tpl->tpl_vars['prod']->value->nombre;?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <label for="M_name">Nombre:</label>
    <input type="text" name="m_name" id="M_name">
    <label for="M_description">Descripción:</label>
    <input type="text" name="m_description" id="M_description">
    <label for="M_photo">Imágen:</label>
    <input type="file" name="m_photo" id="M_photo">
        <input type="submit" value="Agregar">
</form>
<?php }
}
