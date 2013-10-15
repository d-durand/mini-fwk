<p>
Utilisation des headers php pour générer du contenu autre que HTML vers le navigateur
</p>
<code>
<pre>
		header("Content-type: text/plain; charset=utf8");
		header('Content-Disposition: attachment; filename="exemple.txt"');
		echo "du texte";
		exit;

</pre>
</code>


<ul>
	<li><a href="?module=DownloadFile&action=textbrut">Text Brut</a></li>
	<li><a href="?module=DownloadFile&action=csv">CSV</a></li>
	<li><a href="?module=DownloadFile&action=imagegd">Image générée</a></li>
	<li><a href="?module=DownloadFile&action=imagechargee">Image chargée du disque</a></li>	
</ul>