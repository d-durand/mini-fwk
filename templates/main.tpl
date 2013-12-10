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


		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">MiniFWK</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				{foreach $menus as $m=>$data}
					{if !is_array($data)}
						<li><a id='A_{$m}' href='{$data}'>{$m}</a></li>
					{else}
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{$m} <b class="caret"></b></a>
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
				{$Bloc_Login}			
		</nav>


    <div class="container">
		<ol class="breadcrumb">
			<li><a href="?module">Home</a></li>
			<li><a href="?module={$module}">{$module}</a></li>
			<li class="active">{$titre}</li>
		</ol>

		{if $messages}
			<div class="bs-callout bs-callout-danger">
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