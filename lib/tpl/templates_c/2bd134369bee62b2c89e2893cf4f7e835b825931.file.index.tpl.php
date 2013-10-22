<?php /* Smarty version Smarty-3.1.1, created on 2013-10-22 19:30:42
         compiled from "modules/index/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133577807650b48171173e10-55408361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bd134369bee62b2c89e2893cf4f7e835b825931' => 
    array (
      0 => 'modules/index/tpl/index.tpl',
      1 => 1382463041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133577807650b48171173e10-55408361',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50b4817123311',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b4817123311')) {function content_50b4817123311($_smarty_tpl) {?><script>
$(function(){
	
$("a[href='?module=Redirect']").click(function(){
$('h2').prepend("<p id='load' style=';height:40pt;border:3px gray solid;border-radius:10px;text-align:center'>Patientez quelques secondes</p>");
	})	
	
})
</script>
<h2>Page index du site.</h2>

<h3>Install</h3>
<ul style='margin:30px'>
	<li>éditer conf/Params.ini.php pour paramétrer l'accès à la base de données</li>
</ul>

<h3>Exemples de modules</h3>
<ol style='margin:30px'>
	<li>affichage d'un simple template</li>
	<li>affiche et "valide" un formulaire</li>
	<li>effectue un traitement silencieux et redirige vers la page d'accueil</li>
	<li>génère du contenu et l'envoie sous forme de fichier</li>
	<li>exemple ajax/jquery</li>	
</ol><?php }} ?>