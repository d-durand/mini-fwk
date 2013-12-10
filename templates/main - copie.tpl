<!-- start template-->
<html>
	<head>
	<title>{$titre}</title>
	<script src='js/jquery-1.10.2.min.js'></script>
	<script src='js/jquery-ui-1.10.3.custom.min.js'></script>	
	<script src='styles/bootstrap/js/bootstrap.min.js'></script>	
	<script src='js/default.js'></script>	
	<link rel='stylesheet' href='styles/ui-lightness/jquery-ui-1.10.3.custom.min.css' />
	<link rel='stylesheet' href='styles/bootstrap/css/bootstrap.min.css' />	
	<link rel='stylesheet' href='styles/defaut.css' />

	</head>
	<body>
	<div id='page'>
		<div id='login_form' title='voir le code du module Modules/Login'>Bloc login fictif &darr;
			{$Bloc_Login}
		</div>

		<div id='entete'>
		<a href='?module=index'>Mini-FWK</a>
		</div>
				
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">Index</a>
		</div>
		
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
		
			{foreach $menus as $m=>$data}
				{if !is_array($data)}
					<li><a id='A_{$m}' href='{$data}'>{$m}</a></li>
				{else}
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Exemples <b class="caret"></b></a>
						<ul class="dropdown-menu">
						{foreach $data as $sm=>$shref}	
							<li>
							<a href='{$shref}'>{$sm}</a>
							</li>
						{/foreach}			        
						</ul>
					</li>
				{/if}
			{/foreach}
			</ul>		
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Doc">Documentation</a></li>			
			</ul>
		</nav>
		
		
		
		
		


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