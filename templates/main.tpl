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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

	{include file="navigation.tpl"}

    <div class="container">
		<ol class="breadcrumb">
			<li><a href="?module">Home</a></li>
			<li><a href="?module={$module}">{$module}</a></li>
			<li class="active">{$titre}</li>
		</ol>

		{if $messages}
			<div class="bs-callout bs-callout-primary">
				<h4>Zone de messages transmis par <code>Site::ajouter_message():</code></h4>
				{$messages}
			</div>
		{/if}


		<div id='module'>
			{$bloc_contenu}
		</div>			
				{if $affichages}
			<div class='alert alert-info'>
				<h4>Affichages divers</h4>
				<p>
				{$affichages}
				</p>
			</div>
			{/if}
			{if $erreurs}
			<div class='alert alert-warning'>
				<h4>Erreurs diverses</h4>			
				<p>
				{$erreurs}
				</p>
			</div>
			{/if}
	</div>
	</body>
		
</html>
<!-- end template-->