<h2>Affichage des variables issues du module</h2>

<h3>variable1, type chaine</h3>
<p>{$chaine}</p>

<h3>var2, type chaine</h3>
<p>{$date}</p>

<h3>variable3, tableau associatif</h3>
	<table id='modtpl_table'>
		<thead>
			<th>Col1</th><th>Col2</th><th>Col3</th>
		</thead>
		<tbody>
		{foreach $table as $ligne=>$donnees}
			<tr><td>{$donnees.N}</td><td> {$donnees.M}</td><td>{$donnees.O}</td></tr>
		{foreachelse}	
		tableau vide
		{/foreach}
		</tbody>
	</table>