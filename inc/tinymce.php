
<h1><i class="fa fa-quote-right" aria-hidden="true"></i> Editeur TinyMCE</h1>
<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans le plugin
	$opt_tinymce_formats = get_option('opt_tinymce_formats');
	$opt_tinymce_bouton = get_option('opt_tinymce_bouton');
 ?>
<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row"><label for="opt_tinymce_formats">Suppression des formats inutiles et déconseillés</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_tinymce_formats" id="opt_tinymce_formats" <?php checked( $opt_tinymce_formats, true ); ?>> <span class="description">Formats supprimés : h1, h5, h6, address et pre</span>
			</p>
		</td>
	</tr>
		<tr>
		<th scope="row"><label for="opt_tinymce_bouton">Ajout un bouton pour créer un bouton</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_tinymce_bouton" id="opt_tinymce_bouton" <?php checked( $opt_tinymce_bouton, true ); ?>><br>
				<span class="description">Editer le fichier "optimizator-button.js" pour modifier les class appliqués au bouton créé</span>
			</p>
		</td>
	</tr>
</table>
<div class="encart-automatique">
	<h2><i class="fa fa-check-square" aria-hidden="true"></i> Automatique</h2>
	<ul>
		<li><input type="checkbox" checked  disabled> Affiche par défaut la seconde barre d'outils de TinyMCE</li>
	</ul>
</div>