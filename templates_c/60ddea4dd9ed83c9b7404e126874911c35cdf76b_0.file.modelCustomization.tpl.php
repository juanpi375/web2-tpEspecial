<?php
/* Smarty version 3.1.33, created on 2019-10-22 16:26:42
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\modelCustomization.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5daf11a22f50a3_71349150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60ddea4dd9ed83c9b7404e126874911c35cdf76b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\modelCustomization.tpl',
      1 => 1571754222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5daf11a22f50a3_71349150 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="editModel/<?php echo $_smarty_tpl->tpl_vars['prodNombre']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mod']->value->id_modelo;?>
/<?php echo $_smarty_tpl->tpl_vars['mod']->value->nombre_m;?>
/<?php echo $_smarty_tpl->tpl_vars['mod']->value->foto;?>
" method="POST" enctype="multipart/form-data">

    <h3>Encuentra fallas en el modelo? Edítelo a continuación..</h3>

    <label for="M_name">Nombre:</label>
    <input type="text" name="m_name" id="M_name">
    <label for="M_description">Descripción:</label>
    <input type="text" name="m_description" id="M_description">
    <label for="M_photo">Foto:</label>
    <input type="file" name="m_photo" id="M_photo">
    <input type="submit" value="Guardar">
</form>

<h3>Desea eliminar el modelo?..</h3>
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
delModel/<?php echo $_smarty_tpl->tpl_vars['mod']->value->id_modelo;?>
/<?php echo $_smarty_tpl->tpl_vars['mod']->value->foto;?>
">
        <button>Eliminar</button>
    </a>

<?php }
}
