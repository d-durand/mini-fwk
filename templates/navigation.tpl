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