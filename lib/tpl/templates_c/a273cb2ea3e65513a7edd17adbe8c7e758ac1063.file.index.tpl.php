<?php /* Smarty version Smarty-3.1.1, created on 2013-12-06 23:55:45
         compiled from "modules/SimpleTemplate/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84239681250caf66f6d70c3-48194048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a273cb2ea3e65513a7edd17adbe8c7e758ac1063' => 
    array (
      0 => 'modules/SimpleTemplate/tpl/index.tpl',
      1 => 1386370542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84239681250caf66f6d70c3-48194048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50caf66f7fcd4',
  'variables' => 
  array (
    'chaine' => 0,
    'date' => 0,
    'table' => 0,
    'donnees' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50caf66f7fcd4')) {function content_50caf66f7fcd4($_smarty_tpl) {?>
<script>
//demande confirmation sur click d'un bouton supprimer
$(function() {
	$('a.glyphicon-remove').click(function(ev){
		var a = $(this);
		$( "<div>Effacer " + a.attr('title') + "</div>" ).dialog({
			resizable: false,
			modal: true,
			title:'Confirmation',
			position: "center",//{ my: "top", at: " top", of: "window" },
			buttons: {
				Effacer: function() {
					window.location=a.attr('href')
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					
					$( this ).dialog( "close" );
				}
			}
			});
		ev.preventDefault();				
	})
});
</script>


<h2>Affichage des variables issues du module</h2>

<h3>variable1, type chaine</h3>
<p><?php echo $_smarty_tpl->tpl_vars['chaine']->value;?>
</p>

<h3>var2, type chaine/date</h3>
<p><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</p>
<h3>variable3, tableau associatif</h3>
	<table class='table table-striped'>
		<thead>
			<th>id</th><th>Reference</th><th>Prix</th><th>Actions</th>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['donnees'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['donnees']->_loop = false;
 $_smarty_tpl->tpl_vars['ligne'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['donnees']->key => $_smarty_tpl->tpl_vars['donnees']->value){
$_smarty_tpl->tpl_vars['donnees']->_loop = true;
 $_smarty_tpl->tpl_vars['ligne']->value = $_smarty_tpl->tpl_vars['donnees']->key;
?>
			<tr class='table-striped'>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['Reference'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['Prix'];?>
</td>
				<td>

					<a class='glyphicon glyphicon-pencil' href='?module=SimpleTemplate&action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['id'];?>
&ref=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Reference'];?>
'></a> 
					<a class='glyphicon glyphicon-remove' title=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Reference'];?>
 href='?module=SimpleTemplate&action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['id'];?>
'></a>					
				
				</td>
			</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['donnees']->_loop) {
?>	
			<tr><td colspan='3'>tableau vide</td></tr>
		<?php } ?>
		</tbody>
	</table><?php }} ?>