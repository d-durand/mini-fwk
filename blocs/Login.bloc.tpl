{if isset($login) }
Connecté:{$login} <a href='?module=Connexion&action=deconnect'>Logout</a>
{else}
<form action='?module=Connexion&action=login' method='post'>
	<input type='text' name='Login' placeholder='exemple'>
	<input type='password' name='Pass' placeholder='exemple'>
	<input type='submit' value='Login'>
</form>
{/if}