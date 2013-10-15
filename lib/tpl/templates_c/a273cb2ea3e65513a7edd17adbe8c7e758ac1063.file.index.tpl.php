<?php /* Smarty version Smarty-3.1.1, created on 2012-12-14 10:50:39
         compiled from "modules/SimpleTemplate/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84239681250caf66f6d70c3-48194048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a273cb2ea3e65513a7edd17adbe8c7e758ac1063' => 
    array (
      0 => 'modules/SimpleTemplate/tpl/index.tpl',
      1 => 1353940501,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84239681250caf66f6d70c3-48194048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'chaine' => 0,
    'date' => 0,
    'table' => 0,
    'donnees' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50caf66f7fcd4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50caf66f7fcd4')) {function content_50caf66f7fcd4($_smarty_tpl) {?><h2>Affichage des variables issues du module</h2>

<h3>variable1, type chaine</h3>
<p><?php echo $_smarty_tpl->tpl_vars['chaine']->value;?>
</p>

<h3>var2, type chaine</h3>
<p><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</p>

<h3>variable3, tableau associatif</h3>
	<table id='modtpl_table'>
		<thead>
			<th>Col1</th><th>Col2</th><th>Col3</th>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['donnees'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['donnees']->_loop = false;
 $_smarty_tpl->tpl_vars['ligne'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['donnees']->key => $_smarty_tpl->tpl_vars['donnees']->value){
$_smarty_tpl->tpl_vars['donnees']->_loop = true;
 $_smarty_tpl->tpl_vars['ligne']->value = $_smarty_tpl->tpl_vars['donnees']->key;
?>
			<tr><td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['N'];?>
</td><td> <?php echo $_smarty_tpl->tpl_vars['donnees']->value['M'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['O'];?>
</td></tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['donnees']->_loop) {
?>	
		tableau vide
		<?php } ?>
		</tbody>
	</table><?php }} ?>