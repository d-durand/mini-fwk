<?php /* Smarty version Smarty-3.1.1, created on 2013-11-19 19:30:28
         compiled from "blocs/Login.bloc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191843869750b47fe94bc096-36771108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc30d042855801327071226a3acd75d9130236b6' => 
    array (
      0 => 'blocs/Login.bloc.tpl',
      1 => 1384885825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191843869750b47fe94bc096-36771108',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50b47fe94d2d4',
  'variables' => 
  array (
    'login' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b47fe94d2d4')) {function content_50b47fe94d2d4($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['login']->value)){?>
Connecté:<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
 <a href='?module=Connexion&action=deconnect'>Logout</a>
<?php }else{ ?>
<form action='?module=Connexion&action=login' method='post'>
	<input type='text' name='Login' placeholder='exemple'>
	<input type='password' name='Pass' placeholder='exemple'>
	<input type='submit' value='Login' class="btn">
</form>
<?php }?><?php }} ?>