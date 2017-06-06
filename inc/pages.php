
<h1><i class="fa fa-book" aria-hidden="true"></i> Pages</h1>
<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans le plugin
	$opt_page_imageune = get_option('opt_page_imageune');
	$opt_gen_extrait_page = get_option('opt_gen_extrait_page');

 ?>

<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row"><label for="opt_page_imageune">Ajoute l'image à la une sur la liste des pages</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_page_imageune" id="opt_page_imageune" <?php checked( $opt_page_imageune, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_gen_extrait_page">Active l'extrait pour les pages</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_gen_extrait_page" id="opt_gen_extrait_page" <?php checked( $opt_gen_extrait_page, true ); ?>>
		</td>
	</tr>
</table>

<div class="encart-automatique">
	<h2><i class="fa fa-check-square" aria-hidden="true"></i> Automatique</h2>
	<ul>
		<li><input type="checkbox" checked  disabled> Suppression de la fonction "obtenir le lien court"</li>
		<li><input type="checkbox" checked  disabled> Activation des images à la une pour les pages</li>
	</ul>
</div>
