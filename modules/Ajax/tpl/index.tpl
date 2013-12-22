Utilisation d'une action de module pour générer du contenu JSON

<div class="panel panel-default">
<div class="panel-heading">Exemple</div>
<pre>
{literal}
$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})
}
{/literal}
</pre>
</div>


<p>
Tapez un nombre en lettres [un,deux,trois...]
</p>
<p>
Formulaire:  
</p>
<script>
{literal}
$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})}
)
{/literal}
</script>
<input type='text' id='ajax'>
<div style='clear:both'></div>