<a href="https://github.com/d-durand/mini-fwk"><img style="position: absolute; top: 50; right: 0; border: 0;z-index:1000" src="https://camo.githubusercontent.com/652c5b9acfaddf3a9c326fa6bde407b87f7be0f4/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png"></a>
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