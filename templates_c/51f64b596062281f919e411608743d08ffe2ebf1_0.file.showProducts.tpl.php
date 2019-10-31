<?php
/* Smarty version 3.1.33, created on 2019-10-26 19:42:50
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\showProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db4859a3bc236_34749495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51f64b596062281f919e411608743d08ffe2ebf1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\showProducts.tpl',
      1 => 1572111768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:formsMain.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5db4859a3bc236_34749495 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_assignInScope('aux', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prodArray']->value, 'prod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
?>
    <?php $_smarty_tpl->_assignInScope('aux', $_smarty_tpl->tpl_vars['aux']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['aux']->value == 1) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
">
        <h4>< Volver al listado</h4>
    </a>
<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prodArray']->value, 'prod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
?>
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
delProd/<?php echo $_smarty_tpl->tpl_vars['prod']->value->id_producto;?>
" style="display: inline-block">
                <h1>x----</h1>
            </a>  
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;
echo $_smarty_tpl->tpl_vars['prod']->value->nombre;?>
" style="display: inline-block">
            <h1><?php echo $_smarty_tpl->tpl_vars['prod']->value->nombre;?>
</h1> 
        </a>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modArray']->value, 'mod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['prod']->value->id_producto == $_smarty_tpl->tpl_vars['mod']->value->id_producto) {?>
                                        <li>
                    <?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
delModel/<?php echo $_smarty_tpl->tpl_vars['mod']->value->id_modelo;?>
/<?php echo $_smarty_tpl->tpl_vars['mod']->value->foto;?>
" style="display: inline-block">
                            <h3>x----</h3>
                        </a>            
                    <?php }?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;
echo $_smarty_tpl->tpl_vars['prod']->value->nombre;?>
/<?php echo $_smarty_tpl->tpl_vars['mod']->value->nombre_m;?>
" style="display: inline-block">
                        <h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->nombre_m;?>
</h3>
                    </a>
                </li>
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['aux']->value > 1 && $_smarty_tpl->tpl_vars['isAdmin']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender('file:formsMain.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
$_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
