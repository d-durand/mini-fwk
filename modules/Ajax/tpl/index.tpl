Exemple d'utilisation d'une action de module pour générer du contenu JSON
<code>
<pre>
{literal}
$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})}
)
{/literal}

</pre>
</code>

<p>
Peu importe ce que vous tapez, le script serveur renvoie [un,deux,trois]...
</p>
<p>
Formulaire:  
</p>
<script src='js/jquery-1.4.3.min.js'></script>
<script src='js/jquery-ui-1.8.5.custom.min.js'></script>
<script>
{literal}
$(function(){
	$('#ajax').autocomplete({source: "?module=Ajax&action=ajax"})}
)
{/literal}
</script>
<input type='text' id='ajax' />
<div style='clear:both'></div>