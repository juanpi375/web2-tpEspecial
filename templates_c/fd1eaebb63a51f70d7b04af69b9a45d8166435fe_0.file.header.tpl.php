<?php
/* Smarty version 3.1.33, created on 2019-10-31 21:09:48
  from 'C:\xampp\htdocs\phpPrograms\TPE\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb3f8cafd7d3_11232174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd1eaebb63a51f70d7b04af69b9a45d8166435fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpPrograms\\TPE\\templates\\header.tpl',
      1 => 1572552586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dbb3f8cafd7d3_11232174 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
css/general.css">
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </head>
    <body>
        <nav style="background: #aaa">
                    <h1 style="width: 20vw; text-align: center; display: inline-block">
                <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
            </h1>
            <span style="width: 20vw; display: inline-block; margin-left: 55vw">
                <h4>
            <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
login">
                    página de login
                            </a>
            /
            <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
signUp">
                                    registrarse
            </a>
                </h4>
            </span>
            
        </nav><?php }
}
