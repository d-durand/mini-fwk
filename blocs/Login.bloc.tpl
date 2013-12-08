{if isset($login) }	
<ul class="nav navbar-nav navbar-right">
	<li><a href='?module=Connexion&action=deconnect'>{$login} | Se déconnecter</a></li>
</ul>


{else}
	<form class="navbar-form navbar-right" role="form" method='POST' action="index.php?module=Connexion&action=login">
		<div class="form-group">
			<input name='Login' type="text" placeholder="Identifiant" class="form-control">
		</div>
		<div class="form-group">
			<input name='Pass' type="password" placeholder="Pass" class="form-control">
		</div>
	<input type="submit" class="btn btn-success" value='Connexion'>
	</form>
{/if}
</div>
