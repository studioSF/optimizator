
<h1><i class="fa fa-clone" aria-hidden="true"></i> ACF Pro</h1>
<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans le plugin
	$opt_acf_user = get_option('opt_acf_user');
	$opt_acf_googlemap = get_option('opt_acf_googlemap');

	if( is_plugin_active('advanced-custom-fields') ) {
?>
<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row"><label for="opt_acf_user">Affiche le menu ACF uniquement pour l'utilisateur</label></th>
		<td>
			<select name="opt_acf_user">
				<?php
				if( $users = get_users('orderby=login') ){
					foreach( $users as $user ){
						echo '<option value="' . get_permalink( $user->user_login ) . '" ' . selected( $user->user_login, $opt_acf_user ) . '>' . $user->user_login . '</option>';
					}
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_acf_googlemap">Google Map Api clé</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_acf_googlemap; ?>" id="opt_acf_googlemap" name="opt_acf_googlemap">
		</td>
	</tr>
</table>
<?php  } else { ?>
	<div class="optimizator-alerte"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Le plugin ACF Pro n'est pas activé et/ou installé. Veuillez l'installer et activer votre licence pour afficher ici les options.</div>
<?php } ?>
