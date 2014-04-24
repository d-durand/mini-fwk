<?php /* Smarty version Smarty-3.1.1, created on 2014-02-26 22:05:26
         compiled from "modules/SimpleTemplate/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84239681250caf66f6d70c3-48194048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a273cb2ea3e65513a7edd17adbe8c7e758ac1063' => 
    array (
      0 => 'modules/SimpleTemplate/tpl/index.tpl',
      1 => 1386677136,
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
    'objet' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50caf66f7fcd4')) {function content_50caf66f7fcd4($_smarty_tpl) {?>
<script>
//demande confirmation sur click d'un bouton supprimer
$(function() {
	//sur click d'un bouton de suppression
	$('a.glyphicon-remove').click(function(ev){
		//récupérer le href du lien
		//et l'utiliser pour le bouton de confirmation
		$('#go').attr("href",$(this).attr('href'))	

		//afficher la boite de dialogue
		$('#myModal').modal();
	
		//supprimer le comportement par défaut du lien d'origine
		ev.preventDefault();				
	})
});
</script>


<h2>Affichage des variables assignées au template par le module</h2>

<h4>variable1, type chaine</h4>
<p><?php echo $_smarty_tpl->tpl_vars['chaine']->value;?>
</p>

<h4>var2, type chaine/date</h4>
<p><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</p>
<h4>variable3, tableau associatif</h4>

	<table class='table table-striped'>
		<thead>
			<th>id</th><th>Reference</th><th>Prix</th>
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
			</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['donnees']->_loop) {
?>	
			<tr><td colspan='2'>Aucune donnée</td></tr>
		<?php } ?>
		</tbody>
	</table>
	
<h4>var4, type objet</h4>
<p>attribut1 : <?php echo $_smarty_tpl->tpl_vars['objet']->value->attribut1;?>
 attribut2 : <?php echo $_smarty_tpl->tpl_vars['objet']->value->attribut2;?>
</p>
	
<?php }} ?>