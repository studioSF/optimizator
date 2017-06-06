
<h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> Articles</h1>
<p>Optimisation sur les articles : création, édition, liste</p>

<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans la page du plugin
	$opt_post_formats = get_option('opt_post_formats');
    $opt_post_etiquettes = get_option('opt_post_etiquettes');
	$opt_article_imageune = get_option('opt_article_imageune');
	$opt_post_rss = get_option('opt_post_rss');
	$opt_post_rss_kill = get_option('opt_post_rss_kill');
	$opt_post_image_obligatoire = get_option('opt_post_image_obligatoire');
	$opt_post_redirige = get_option('opt_post_redirige');
	$opt_post_rename = get_option('opt_post_rename');
	$opt_post_rename_pluriel = get_option('opt_post_rename_pluriel');
 ?>

<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row"><label for="opt_post_formats">Désactivation les options de formats</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_post_formats" id="opt_post_formats" <?php checked( $opt_post_formats, true ); ?>>
		</td>
	</tr>
    	<tr>
		<th scope="row"><label for="opt_post_etiquettes">Désactivation des étiquettes</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_post_etiquettes" id="opt_post_etiquettes" <?php checked( $opt_post_etiquettes, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_article_imageune">Ajoute une colonne "image à la une"" dans la liste des article</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_article_imageune" id="opt_article_imageune" <?php checked( $opt_article_imageune, true ); ?>>
			</p>
		</td>
	</tr>
	<tr>
	<th scope="row"><label for="opt_post_rss">Ajoute la miniature au flux RSS</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_post_rss" id="opt_post_rss" <?php checked( $opt_post_rss, true ); ?>>
			</p>
		</td>
	</tr>
	<th scope="row"><label for="opt_post_rss_kill">Désactive le flux RSS</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_post_rss_kill" id="opt_post_rss_kill" <?php checked( $opt_post_rss_kill, true ); ?>>
			</p>
		</td>
	</tr>
	<th scope="row"><label for="opt_post_image_obligatoire">Impose l'image à la une pour publier un article</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_post_image_obligatoire" id="opt_post_image_obligatoire" <?php checked( $opt_post_image_obligatoire, true ); ?>>
			</p>
		</td>
	</tr>
	<th scope="row"><label for="opt_post_redirige">Redirige automatiquement s'il n'y a qu'un seul article dans la liste (archive, etc.)</label></th>
		<td>
			<p>
				<input type="checkbox" value="1" name="opt_post_redirige" id="opt_post_redirige" <?php checked( $opt_post_redirige, true ); ?>>
			</p>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_post_rename">Nouveau titre à la place de "article"</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_post_rename; ?>" id="opt_post_rename" name="opt_post_rename">
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_post_rename_pluriel">Même nouveau titre au pluriel</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_post_rename_pluriel; ?>" id="opt_post_rename_pluriel" name="opt_post_rename_pluriel">
		</td>
	</tr>
</table>
<div class="encart-automatique">
	<h2><i class="fa fa-check-square" aria-hidden="true"></i> Automatique</h2>
	<ul>
		<li><input type="checkbox" checked  disabled> Suppression de la fonction "obtenir le lien court"</li>
		<li><input type="checkbox" checked  disabled> Ajoute la fonction "dupliquer" pour les articles</li>
	</ul>
</div>