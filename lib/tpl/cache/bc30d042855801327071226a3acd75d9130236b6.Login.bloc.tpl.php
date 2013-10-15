<?php /*%%SmartyHeaderCode:81835986850b47fda614f83-71452023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc30d042855801327071226a3acd75d9130236b6' => 
    array (
      0 => 'blocs/Login.bloc.tpl',
      1 => 1353937352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81835986850b47fda614f83-71452023',
  'variables' => 
  array (
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50b47fda62ee9',
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b47fda62ee9')) {function content_50b47fda62ee9($_smarty_tpl) {?><form action='?module=login&action=login' method='post'>
	<input type='text' name='Login'>
	<input type='password' name='Pass'>
	<input type='submit' value='Login'>
</form>
<?php }} ?>