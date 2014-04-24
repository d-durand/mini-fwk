<form method='POST' action='?module=TestChk&action=valide'>
<table>
{foreach $donnees as $l}

<tr>	
	<td>{$l.Civ}</td>
	<td>{$l.Nom}</td>
	<td>{$l.Actif}</td>
	<td><input type='checkbox' name='selec[]' value='{$l.id}'></td>
</tr>


{/foreach}
</table>



<input type='submit' name="do" value="Supprimer"/>
<input type='submit' name="do" value="Bannir"/>
<input type='submit' name="do" value="Activer"/>
</form>
<div style='clear:both' />
