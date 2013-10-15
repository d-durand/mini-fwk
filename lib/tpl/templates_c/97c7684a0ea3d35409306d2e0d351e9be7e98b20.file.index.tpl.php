<?php /* Smarty version Smarty-3.1.1, created on 2012-11-27 17:35:58
         compiled from "modules/TestChk/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212829879150b4e278044a37-23200344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c7684a0ea3d35409306d2e0d351e9be7e98b20' => 
    array (
      0 => 'modules/TestChk/tpl/index.tpl',
      1 => 1354033168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212829879150b4e278044a37-23200344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50b4e278061f6',
  'variables' => 
  array (
    'donnees' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b4e278061f6')) {function content_50b4e278061f6($_smarty_tpl) {?><form method='POST' action='?module=TestChk&action=valide'>
<table>
<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['donnees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>

<tr>	
	<td><?php echo $_smarty_tpl->tpl_vars['l']->value['Civ'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['l']->value['Nom'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['l']->value['Actif'];?>
</td>
	<td><input type='checkbox' name='selec[]' value='<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
'></td>
</tr>

<?php } ?>
</table>
<input type='submit' name="do" value="Supprimer"/>
<input type='submit' name="do" value="Bannir"/>
<input type='submit' name="do" value="Activer"/>
</form>
<div style='clear:both' />
<?php }} ?>