<script>
$(function(){
{literal}	
$("a[href='?module=Redirect']").click(function(){
$('h2').prepend("<p id='load' style=';height:40pt;border:3px gray solid;border-radius:10px;text-align:center'>Patientez quelques secondes</p>");
	})	
{/literal}	
})
</script>
<h2>Page index du site.</h2>

<h3>Personnalisation</h3>
<ul style='margin:30px'>
	<li>Cette page est générée à partir du module index et de son template index.tpl
	<li>Les entrées du menu principal sont configurées dans le fichier conf/Menus.ini.php</li>
	<li>L'apparence générale du site peut être modifiée dans le fichier templates/main.tpl</li>
	<li>Bootstrap 3 est utilisé pour le style, cf dossier styles</li>
	<li>L'apparence des champs de formulaire est modifiable à partir des templates : templates/champs</li>
	<li>Pour le reste, voir la <a href="doc">Documentation</a></li>
</ul>


<h3>Exemples de modules</h3>
<ol style='margin:30px'>
	<li>affichage d'un simple template</li>
	<li>affiche et "valide" un formulaire</li>
	<li>effectue un traitement silencieux et redirige vers la page d'accueil</li>
	<li>génère du contenu et l'envoie sous forme de fichier</li>
	<li>exemple ajax/jquery</li>	
</ol>