<?php
/* Smarty version 3.1.33, created on 2019-10-26 00:54:39
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db37d2fbaaa04_99573265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b5fbe21eeb50a341136386d980eddaaaaf7dfe3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\login.tpl',
      1 => 1572044074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5db37d2fbaaa04_99573265 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div style="text-align: center">
    <h2>Bienvenido nuevamente!</h2>
    <h2>Ingrese a su cuenta..</h2>
    <form action="tryLog" method="POST" style="width: 35vw; margin: auto; line-height: 30px;">
        <div style="margin-bottom: 20px;">
            <label for="Login_name">Nombre:</label>
            <input type="text" name="login_name" id="Login_name">
            <label for="Login_pass">Contraseña:</label>
            <input type="password" name="login_pass" id="Login_pass">
            <input type="submit" value="Ingresar">
        </div>
        <?php if ($_smarty_tpl->tpl_vars['error']->value == 1) {?>
            <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
                Por favor ingrese un usuario y contraseña correctos
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value == 2) {?>
            <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
                Por favor llene todos los campos
            </span>
        <?php }?>
    </form>
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
signUp">
    <h3>
        Aún no tiene una cuenta? </br>
        Créese una aquí mismo!
    </h3>
    </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
">
    <h3>
        Quiere continuar sin loguearse? </br>
        Ingrese como invitado aquí
    </h3>
    </a>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
