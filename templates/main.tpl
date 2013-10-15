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
	

		{if $messages}
		<div id='zonemessage'>
			Zone de messages transmis par les modules :
			    {$messages}
		</div>
		{/if}


		
		<div id='contenu'>
			Zone d'affichage du contenu généré par le module <b>{$module}->{$action}()</b>

			<div id='module'>
				<h1>{$titre}</h1>
				{$bloc_contenu}
			</div>
			
			{if $affichages}
			<div id='erreurs'>
				<h3>Affichages divers</h3>
				{$affichages}
			</div>
			{/if}



			{if $erreurs}
			<div id='erreurs'>
				<h3>Erreurs diverses</h3>			
				{$erreurs}
			</div>
			{/if}
			
			
		</div>
	</div>
	</body>
		
</html>
<!-- end template-->