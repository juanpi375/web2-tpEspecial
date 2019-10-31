<?php
/* Smarty version 3.1.33, created on 2019-10-22 15:48:12
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\showModel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5daf089c1df775_43780463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d63777f3e2785736e02a026aac9b4579d68aa06' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\showModel.tpl',
      1 => 1571751880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modelCustomization.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5daf089c1df775_43780463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;
echo $_smarty_tpl->tpl_vars['prodNombre']->value;?>
">
        <h4>< Volver a <?php echo $_smarty_tpl->tpl_vars['prodNombre']->value;?>
</h4>
    </a>
    <div style="text-align: center">
        <h2><?php echo $_smarty_tpl->tpl_vars['mod']->value->nombre_m;?>
</h2>
        <img src="../images/<?php echo $_smarty_tpl->tpl_vars['mod']->value->foto;?>
" alt="algo">
                <h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->descripcion;?>
</h3>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>    
        <?php $_smarty_tpl->_subTemplateRender('file:modelCustomization.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }
$_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
