
<h1><i class="fa fa-asterisk" aria-hidden="true"></i> Cookies choice</h1>
<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans le plugin
	$opt_uti_cookies = get_option('opt_uti_cookies');
	$opt_uti_cookies_pos = get_option('opt_uti_cookies_pos');
	$opt_uti_cookies_txt = get_option('opt_uti_cookies_txt');
	$opt_uti_cookies_btn = get_option('opt_uti_cookies_btn');
	$opt_uti_cookies_lien = get_option('opt_uti_cookies_lien');
	$opt_uti_cookies_url = get_option('opt_uti_cookies_url');
	$opt_uti_cookies_bgcolor = get_option('opt_uti_cookies_bgcolor');
	$opt_uti_cookies_btcolor = get_option('opt_uti_cookies_btcolor');
	$opt_uti_cookies_bgtxtcolor = get_option('opt_uti_cookies_bgtxtcolor');
    $opt_uti_cookies_bttxtcolor = get_option('opt_uti_cookies_bttxtcolor');
?>

<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row"><label for="opt_uti_cookies">Activation de Cookies Choice</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_uti_cookies" id="opt_uti_cookies" <?php checked( $opt_uti_cookies, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row">Position de la barre</th>
		<td>
			<input type="radio" name="opt_uti_cookies_pos" value="bottom" id="opt_uti_cookies_pos1" <?php checked('bottom', $opt_uti_cookies_pos); ?> /><label for="opt_uti_cookies_pos1">En bas</label>&nbsp;&nbsp;
            <input type="radio" name="opt_uti_cookies_pos" value="top" id="opt_uti_cookies_pos2" <?php checked('top', $opt_uti_cookies_pos); ?> /><label for="opt_uti_cookies_pos2">En haut</label>&nbsp;&nbsp;
            <input type="radio" name="opt_uti_cookies_pos" value="bottom-left" id="opt_uti_cookies_pos3" <?php checked('bottom-left', $opt_uti_cookies_pos); ?> /><label for="opt_uti_cookies_pos3">En bas à gauche</label>&nbsp;&nbsp;
            <input type="radio" name="opt_uti_cookies_pos" value="bottom-right" id="opt_uti_cookies_pos4" <?php checked('bottom-right', $opt_uti_cookies_pos); ?> /><label for="opt_uti_cookies_pos4">En bas à droite</label>&nbsp;&nbsp;
            <input type="radio" name="opt_uti_cookies_pos" value="push" id="opt_uti_cookies_pos5" <?php checked('push', $opt_uti_cookies_pos); ?> /><label for="opt_uti_cookies_pos5">En pushdown en haut</label>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_btn" class="optimizator-label">Message de l'encart</label></th>
		<td>
			<textarea class="regular-text ltr" id="opt_uti_cooopt_uti_cookies_txtkies_btn" name="opt_uti_cookies_txt" placeholder="Ici votre message"><?php echo $opt_uti_cookies_txt; ?></textarea>
			<br>
			<span class="description">Exemple : Les cookies assurent le bon fonctionnement de nos services. En utilisant ces derniers, vous acceptez l'utilisation des cookies</span>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_btn" class="optimizator-label">Titre du bouton</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_uti_cookies_btn; ?>" id="opt_uti_cookies_btn" name="opt_uti_cookies_btn">
			<span class="description">Exemple : J'ai compris</span>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_lien" class="optimizator-label">Titre du lien</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_uti_cookies_lien; ?>" id="opt_uti_cookies_lien" name="opt_uti_cookies_lien">
			<span class="description">Exemple : En savoir plus</span>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_url" class="optimizator-label">URL du lien</label></th>
		<td>
			<select name="opt_uti_cookies_url">
				<?php
				if( $pages = get_pages() ){
					foreach( $pages as $page ){
						echo '<option value="' . get_permalink( $page->ID ) . '" ' . selected( get_permalink( $page->ID ), $opt_uti_cookies_url ) . '>' . $page->post_title . '</option>';
					}
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_bgcolor" class="optimizator-label">Couleur de fond</label></th>
		<td>
			<input type="text" data-alpha="true" name="opt_uti_cookies_bgcolor" value="<?php echo $opt_uti_cookies_bgcolor; ?>" class="color-picker" id="opt_uti_cookies_bgcolor" >
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_bgtxtcolor" class="optimizator-label">Couleur du texte</label></th>
		<td>
			<input type="text" data-alpha="true" name="opt_uti_cookies_bgtxtcolor" value="<?php echo $opt_uti_cookies_bgtxtcolor; ?>" class="color-picker" id="opt_uti_cookies_bgtxtcolor" >
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_btcolor" class="optimizator-label">Couleur du bouton</label></th>
		<td>
			<input type="text" data-alpha="true" name="opt_uti_cookies_btcolor" value="<?php echo $opt_uti_cookies_btcolor; ?>" class="color-picker" id="opt_uti_cookies_btcolor" >
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_uti_cookies_bttxtcolor" class="optimizator-label">Couleur du texte du bouton</label></th>
		<td>
			<input type="text" data-alpha="true" name="opt_uti_cookies_bttxtcolor" value="<?php echo $opt_uti_cookies_bttxtcolor; ?>" class="color-picker" id="opt_uti_cookies_bttxtcolor" >
		</td>
	</tr>
</table>
