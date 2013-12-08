<?php /* Smarty version Smarty-3.1.1, created on 2013-12-06 16:18:31
         compiled from "blocs/Login.bloc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191843869750b47fe94bc096-36771108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc30d042855801327071226a3acd75d9130236b6' => 
    array (
      0 => 'blocs/Login.bloc.tpl',
      1 => 1386343110,
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
<ul class="nav navbar-nav navbar-right">
	<li><a href='?module=Connexion&action=deconnect'><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
 | Se déconnecter</a></li>
</ul>


<?php }else{ ?>
	<form class="navbar-form navbar-right" role="form" method='POST' action="index.php?module=Connexion&action=login">
		<div class="form-group">
			<input name='Login' type="text" placeholder="Identifiant" class="form-control">
		</div>
		<div class="form-group">
			<input name='Pass' type="password" placeholder="Pass" class="form-control">
		</div>
	<input type="submit" class="btn btn-success" value='Connexion'>
	</form>
<?php }?>
</div>
<?php }} ?>