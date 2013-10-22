<?php /* Smarty version Smarty-3.1.1, created on 2013-10-22 19:29:47
         compiled from "templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179219845350b47fe94d6c94-45604315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c6baab8db5b147146df4d4d7f083fab98802ca' => 
    array (
      0 => 'templates/main.tpl',
      1 => 1382462985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179219845350b47fe94d6c94-45604315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50b47fe954f1c',
  'variables' => 
  array (
    'titre' => 0,
    'Bloc_Login' => 0,
    'menus' => 0,
    'href' => 0,
    'm' => 0,
    'messages' => 0,
    'module' => 0,
    'action' => 0,
    'bloc_contenu' => 0,
    'affichages' => 0,
    'erreurs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b47fe954f1c')) {function content_50b47fe954f1c($_smarty_tpl) {?><!-- start template-->
<html>
	<head>
	<title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
	<script src='js/jquery-1.10.2.min.js'></script>
	<script src='js/jquery-ui-1.10.3.custom.min.js'></script>
	
	<link rel='stylesheet' href='styles/defaut.css' />
	<link rel='stylesheet' href='styles/ui-lightness/jquery-ui-1.10.3.custom.min.css' />

	</head>
	<body>
	<div id='page'>
		<div id='login' title='voir le code du module Modules/Login'>Bloc login fictif &darr;
			<?php echo $_smarty_tpl->tpl_vars['Bloc_Login']->value;?>

		</div>

		<div id='entete'>
		<a href='?module=index'>Mini-FWK</a>
		</div>
	
		<div id='menu'>
			<a href='?' title='contenu'>Defaut</a> Exemples &rarr; 
			<?php  $_smarty_tpl->tpl_vars['href'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['href']->_loop = false;
 $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['href']->key => $_smarty_tpl->tpl_vars['href']->value){
$_smarty_tpl->tpl_vars['href']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->value = $_smarty_tpl->tpl_vars['href']->key;
?>
			<a href='<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</a>
			<?php } ?>
		</div>
	

		<?php if ($_smarty_tpl->tpl_vars['messages']->value){?>
		<div id='zonemessage'>
			Zone de messages transmis par les modules :
			    <?php echo $_smarty_tpl->tpl_vars['messages']->value;?>

		</div>
		<?php }?>


		
		<div id='contenu'>
			Zone d'affichage du contenu généré par le module <b><?php echo $_smarty_tpl->tpl_vars['module']->value;?>
-><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
()</b>

			<div id='module'>
				<h1><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h1>
				<?php echo $_smarty_tpl->tpl_vars['bloc_contenu']->value;?>

			</div>
			
			<?php if ($_smarty_tpl->tpl_vars['affichages']->value){?>
			<div id='erreurs'>
				<h3>Affichages divers</h3>
				<?php echo $_smarty_tpl->tpl_vars['affichages']->value;?>

			</div>
			<?php }?>



			<?php if ($_smarty_tpl->tpl_vars['erreurs']->value){?>
			<div id='erreurs'>
				<h3>Erreurs diverses</h3>			
				<?php echo $_smarty_tpl->tpl_vars['erreurs']->value;?>

			</div>
			<?php }?>
			
			
		</div>
	</div>
	</body>
		
</html>
<!-- end template--><?php }} ?>