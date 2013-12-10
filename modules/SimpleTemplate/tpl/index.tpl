{literal}
<script>
//demande confirmation sur click d'un bouton supprimer
$(function() {
	//sur click d'un bouton de suppression
	$('a.glyphicon-remove').click(function(ev){
		//récupérer le href du lien
		//et l'utiliser pour le bouton de confirmation
		$('#go').attr("href",$(this).attr('href'))	

		//afficher la boite de dialogue
		$('#myModal').modal();
	
		//supprimer le comportement par défaut du lien d'origine
		ev.preventDefault();				
	})
});
</script>
{/literal}

<h2>Affichage des variables assignées au template par le module</h2>

<h4>variable1, type chaine</h4>
<p>{$chaine}</p>

<h4>var2, type chaine/date</h4>
<p>{$date}</p>
<h4>variable3, tableau associatif</h4>

	<table class='table table-striped'>
		<thead>
			<th>id</th><th>Reference</th><th>Prix</th>
		</thead>
		<tbody>
		{foreach $table as $ligne=>$donnees}
			<tr class='table-striped'>
				<td>{$donnees.id}</td>
				<td>{$donnees.Reference}</td>
				<td>{$donnees.Prix}</td>
			</tr>
		{foreachelse}	
			<tr><td colspan='2'>Aucune donnée</td></tr>
		{/foreach}
		</tbody>
	</table>
	
<h4>var4, type objet</h4>
<p>attribut1 : {$objet->attribut1} attribut2 : {$objet->attribut2}</p>
	
