
<h1><i class="fa fa-code" aria-hidden="true"></i> wp-config</h1>
<p>Voici une liste de codes à copier-coller dans le fichier wp-config.php, à la racine de Wordpress</p>
<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans le plugin
	
 ?>
<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row">Désactivation de l'éditeur dans l'admin</th>
		<td>
			<pre>define('DISALLOW_FILE_EDIT', true);</pre>
		</td>
	</tr>
	<tr>
		<th scope="row">Limite à 3 des révisions des articles</th>
		<td>
			<pre>define('WP_POST_REVISIONS', 3);</pre>
		</td>
	</tr>
	<tr>
		<th scope="row">Fixe la limite de mémoire de PHP à 128Mo</th>
		<td>
			<pre>define('WP_MEMORY_LIMIT', '128M');</pre>
		</td>
	</tr>
	<tr>
		<th scope="row">Compression des scripts</th>
		<td>
			<pre>define('COMPRESS_SCRIPTS', true);</pre>
		</td>
	</tr>
	<tr>
		<th scope="row">Concatenation des scripts</th>
		<td>
			<pre>define('CONCATENATE_SCRIPTS', true);</pre>
		</td>
	</tr>
</table>