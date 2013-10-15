<!-- start template-->
<html>
	<head>
	<title>{$titre}</title>
	
	<link rel='stylesheet' href='styles/defaut.css' />
	<link rel='stylesheet' href='styles/smoothness/jquery-ui-1.8.5.custom.css' />

	</head>
	<body>
	<div id='page'>
		<div id='login' title='voir le code du module Modules/Login'>Bloc login fictif &darr;
			{$Bloc_Login}
		</div>

		<div id='entete'>
		<a href='?module=index'>Mini-FWK</a>
		</div>
	
		<div id='menu'>
			<a href='?' title='contenu'>Defaut</a> Exemples &rarr; 
			{foreach $menus as $m=>$href}
			<a href='{$href}'>{$m}</a>
			{/foreach}
		</div>
	
	<div class='echo' style='background:#FFF9C4;border:5px red dotted;margin-top:20px'>
			<h1>Erreur</h1>
			
			{$message|default:"Le site a rencontré un problème."}
			</div>


			
			
		</div>
	</div>
	</body>
		
</html>
<!-- end template-->
