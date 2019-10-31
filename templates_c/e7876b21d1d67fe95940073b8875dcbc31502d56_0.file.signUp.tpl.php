<?php
/* Smarty version 3.1.33, created on 2019-10-26 16:20:16
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db456208f5a51_74153909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7876b21d1d67fe95940073b8875dcbc31502d56' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\signUp.tpl',
      1 => 1572099613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5db456208f5a51_74153909 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div style="text-align: center">
    <h2>Bienvenido!</h2>
    <h2>Registrese por favor..</h2>
    <form action="trySign" method="POST" style="width: 35vw; margin: auto; line-height: 30px;">
    <div style="margin-bottom: 20px;">
        <label for="Login_name">Nombre:</label>
        <input type="text" name="login_name" id="Login_name">
        <label for="Login_email">Email:</label>
        <input type="email" name="login_email" id="Login_email">
        <label for="Login_pass">Contraseña:</label>
        <input type="password" name="login_pass" id="Login_pass">
        <label for="Login_age">Edad:</label>
        <input type="number" name="login_age" id="Login_age">
        <input type="submit" value="Ingresar">
    </div>
    <?php if ($_smarty_tpl->tpl_vars['error']->value == 1) {?>
        <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
            Por favor ingrese un usuario no existente
        </span>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['error']->value == 2) {?>
        <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
            Por favor llene todos los campos
        </span>
    <?php }?>
    </form>
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
login">
    <h3>
        Ya tiene una cuenta? </br>
        Ingrese aquí mismo!
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
