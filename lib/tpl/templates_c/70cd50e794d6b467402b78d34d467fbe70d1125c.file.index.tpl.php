<?php /* Smarty version Smarty-3.1.1, created on 2013-10-15 16:11:11
         compiled from "modules/DownloadFile/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1138108620525d4cffb3c707-72406161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70cd50e794d6b467402b78d34d467fbe70d1125c' => 
    array (
      0 => 'modules/DownloadFile/tpl/index.tpl',
      1 => 1353951395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1138108620525d4cffb3c707-72406161',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_525d4cffdc9b9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525d4cffdc9b9')) {function content_525d4cffdc9b9($_smarty_tpl) {?><p>
Utilisation des headers php pour générer du contenu autre que HTML vers le navigateur
</p>
<code>
<pre>
		header("Content-type: text/plain; charset=utf8");
		header('Content-Disposition: attachment; filename="exemple.txt"');
		echo "du texte";
		exit;

</pre>
</code>


<ul>
	<li><a href="?module=DownloadFile&action=textbrut">Text Brut</a></li>
	<li><a href="?module=DownloadFile&action=csv">CSV</a></li>
	<li><a href="?module=DownloadFile&action=imagegd">Image générée</a></li>
	<li><a href="?module=DownloadFile&action=imagechargee">Image chargée du disque</a></li>	
</ul><?php }} ?>