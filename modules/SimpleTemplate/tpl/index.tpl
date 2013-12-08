{literal}
<script>
//demande confirmation sur click d'un bouton supprimer
$(function() {
	$('a.glyphicon-remove').click(function(ev){
		var a = $(this);
		$( "<div>Effacer " + a.attr('title') + "</div>" ).dialog({
			resizable: false,
			modal: true,
			title:'Confirmation',
			position: "center",//{ my: "top", at: " top", of: "window" },
			buttons: {
				Effacer: function() {
					window.location=a.attr('href')
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					
					$( this ).dialog( "close" );
				}
			}
			});
		ev.preventDefault();				
	})
});
</script>
{/literal}

<h2>Affichage des variables issues du module</h2>

<h3>variable1, type chaine</h3>
<p>{$chaine}</p>

<h3>var2, type chaine/date</h3>
<p>{$date}</p>
<h3>variable3, tableau associatif</h3>
	<table class='table table-striped'>
		<thead>
			<th>id</th><th>Reference</th><th>Prix</th><th>Actions</th>
		</thead>
		<tbody>
		{foreach $table as $ligne=>$donnees}
			<tr class='table-striped'>
				<td>{$donnees.id}</td>
				<td>{$donnees.Reference}</td>
				<td>{$donnees.Prix}</td>
				<td>

					<a class='glyphicon glyphicon-pencil' href='?module=SimpleTemplate&action=modifier&id={$donnees.id}&ref={$donnees.Reference}'></a> 
					<a class='glyphicon glyphicon-remove' title={$donnees.Reference} href='?module=SimpleTemplate&action=supprimer&id={$donnees.id}'></a>					
				
				</td>
			</tr>
		{foreachelse}	
			<tr><td colspan='3'>tableau vide</td></tr>
		{/foreach}
		</tbody>
	</table>