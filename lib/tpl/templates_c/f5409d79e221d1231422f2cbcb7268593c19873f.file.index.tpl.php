<?php /* Smarty version Smarty-3.1.1, created on 2013-12-11 21:51:05
         compiled from "modules/Ajax/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70780847950caf672039fb9-99613751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5409d79e221d1231422f2cbcb7268593c19873f' => 
    array (
      0 => 'modules/Ajax/tpl/index.tpl',
      1 => 1386795063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70780847950caf672039fb9-99613751',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50caf67208cd4',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50caf67208cd4')) {function content_50caf67208cd4($_smarty_tpl) {?>Utilisation d'une action de module pour générer du contenu JSON

<div class="panel panel-default">
<div class="panel-heading">Exemple</div>
<pre>

$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})
}

</pre>
</div>


<p>
Tapez un nombre en lettres [un,deux,trois...]
</p>
<p>
Formulaire:  
</p>
<script>

$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})}
)

</script>
<input type='text' id='ajax'>
<div style='clear:both'></div><?php }} ?>