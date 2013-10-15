<?php /* Smarty version Smarty-3.1.1, created on 2012-12-14 10:50:42
         compiled from "modules/Ajax/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70780847950caf672039fb9-99613751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5409d79e221d1231422f2cbcb7268593c19873f' => 
    array (
      0 => 'modules/Ajax/tpl/index.tpl',
      1 => 1353949895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70780847950caf672039fb9-99613751',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50caf67208cd4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50caf67208cd4')) {function content_50caf67208cd4($_smarty_tpl) {?>Exemple d'utilisation d'une action de module pour générer du contenu JSON
<code>
<pre>

$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})}
)


</pre>
</code>

<p>
Peu importe ce que vous tapez, le script serveur renvoie [un,deux,trois]...
</p>
<p>
Formulaire:  
</p>
<script src='js/jquery-1.4.3.min.js'></script>
<script src='js/jquery-ui-1.8.5.custom.min.js'></script>
<script>

$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})}
)

</script>
<input type='text' id='ajax' />
<div style='clear:both'></div><?php }} ?>