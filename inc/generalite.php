
<h1><i class="fa fa-wrench" aria-hidden="true"></i> Optimisations générales</h1>
<p>
	Liste des options globales affectant le site côté front et/ou côté admin.
</p>

<?php
	// On liste ici les variables utilisées pour pouvoir les afficher dans la page du plugin
	$opt_gen_barreadmin = get_option('opt_gen_barreadmin');
	$opt_gen_nocommentaires = get_option('opt_gen_nocommentaires');
	$opt_gen_dw_press = get_option('opt_gen_dw_press');
	$opt_gen_dw_oeil = get_option('opt_gen_dw_oeil');
	$opt_gen_dw_commentaires = get_option('opt_gen_dw_commentaires');
	$opt_gen_dw_recent = get_option('opt_gen_dw_recent');
	$opt_gen_dw_activite = get_option('opt_gen_dw_activite');
	$opt_gen_dw_wordpress = get_option('opt_gen_dw_wordpress');
	$opt_gen_dw_plugins = get_option('opt_gen_dw_plugins');
	$opt_gen_dw_liens = get_option('opt_gen_dw_liens');
	$opt_gen_dw_welcome = get_option('opt_gen_dw_welcome');
	$opt_gen_ga = get_option('opt_gen_ga');
	$opt_gen_ga_cle = get_option('opt_gen_ga_cle');
	$opt_gen_extrait = get_option('opt_gen_extrait');
	$opt_gen_apirest = get_option('opt_gen_apirest');
 ?>
 
<table border="0" cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th scope="row"><label for="opt_gen_barreadmin">Désactivation la barre d'admin côté front</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_gen_barreadmin" id="opt_gen_barreadmin" <?php checked( $opt_gen_barreadmin, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_gen_nocommentaires">Désactivation des commentaires</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_gen_nocommentaires" id="opt_gen_nocommentaires" <?php checked( $opt_gen_nocommentaires, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_gen_apirest">Désactivation de l'Api REST</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_gen_apirest" id="opt_gen_apirest" <?php checked( $opt_gen_apirest, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row">Désactivation des widgets du dashboard</th>
		<td>
			<div class="optimizator-inlinebloc">
				<ul>
					<li><label for="opt_gen_dw_press"><input type="checkbox" value="1" name="opt_gen_dw_press" id="opt_gen_dw_press" <?php checked( $opt_gen_dw_press, true ); ?>>Brouillon rapide</label></li>
					<li><label for="opt_gen_dw_oeil"><input type="checkbox" value="1" name="opt_gen_dw_oeil" id="opt_gen_dw_oeil" <?php checked( $opt_gen_dw_oeil, true ); ?>>D'un coup d'oeil</label></li>
					<li><label for="opt_gen_dw_commentaires"><input type="checkbox" value="1" name="opt_gen_dw_commentaires" id="opt_gen_dw_commentaires" <?php checked( $opt_gen_dw_commentaires, true ); ?>>Commentaires récents</label></li>
					<li><label for="opt_gen_dw_recent"><input type="checkbox" value="1" name="opt_gen_dw_recent" id="opt_gen_dw_recent" <?php checked( $opt_gen_dw_recent, true ); ?>>Brouillons récents</label></li>
					<li><label for="opt_gen_dw_activite"><input type="checkbox" value="1" name="opt_gen_dw_activite" id="opt_gen_dw_activite" <?php checked( $opt_gen_dw_activite, true ); ?>>Activité</label></li>
				</ul>
			</div>
			<div class="optimizator-inlinebloc">
				<ul>
					<li><label for="opt_gen_dw_wordpress"><input type="checkbox" value="1" name="opt_gen_dw_wordpress" id="opt_gen_dw_wordpress" <?php checked( $opt_gen_dw_wordpress, true ); ?>>News de Wordpress</label></li>
					<li><label for="opt_gen_dw_plugins"><input type="checkbox" value="1" name="opt_gen_dw_plugins" id="opt_gen_dw_plugins" <?php checked( $opt_gen_dw_plugins, true ); ?>>Plugins</label></li>
					<li><label for="opt_gen_dw_liens"><input type="checkbox" value="1" name="opt_gen_dw_liens" id="opt_gen_dw_liens" <?php checked( $opt_gen_dw_liens, true ); ?>>Liens entrants</label></li>
					<li><label for="opt_gen_dw_welcome"><input type="checkbox" value="1" name="opt_gen_dw_welcome" id="opt_gen_dw_welcome" <?php checked( $opt_gen_dw_welcome, true ); ?>>Welcome</label></li>
				</ul>
			</div>
		</td>
	</tr>
	<!--<tr>
		<th scope="row"><label for="opt_gen_ga">Activation de Google Analytics</label></th>
		<td>
			<input type="checkbox" value="1" name="opt_gen_ga" id="opt_gen_ga" <?php checked( $opt_gen_ga, true ); ?>>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="opt_gen_ga_cle">Google Analytics Clé</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_gen_ga_cle; ?>" id="opt_gen_ga_cle" name="opt_gen_ga_cle"><br>
			<span class="description">Format : UA-XXXXXXXX-XX</span>
		</td>
	</tr>-->
	<tr>
		<th scope="row"><label for="opt_gen_extrait">Nombre de caractères de l'extrait (article et page si option activée)</label></th>
		<td>
			<input class="regular-text ltr" type="text" value="<?php echo $opt_gen_extrait; ?>" id="opt_gen_extrait" name="opt_gen_extrait"><br>
			<span class="description">75 est un bon ratio en général</span>
		</td>
	</tr>
</table>

<div class="encart-automatique">
	<h2><i class="fa fa-check-square" aria-hidden="true"></i> Automatique</h2>
	<ul>
		<li><input type="checkbox" checked  disabled> Désactivation des Emojiis</li>
		<li><input type="checkbox" checked  disabled> Désactivation le numéro de version de WP dans le header</li>
		<li><input type="checkbox" checked  disabled> Modification du texte de pied de page de l'admin en indiquant le temps de chargement de la page</li>
		<li><input type="checkbox" checked  disabled> Suppression de l'aide</li>
		<li><input type="checkbox" checked  disabled> Désactivation du menu Wordpress dans la barre du haut</li>
		<li><input type="checkbox" checked  disabled> Désactivation de numéro de version de WP dans l'admin'</li>
		<li><input type="checkbox" checked  disabled> Quand on veut insérer une image, l'option "pas de lien" est cochée par défaut</li>
		<li><input type="checkbox" checked  disabled> Désactive XMLRPC</li>
		<li><input type="checkbox" checked  disabled> Désactive RSD link</li>
		<li><input type="checkbox" checked  disabled> Désactive Wlwmanifest</li>
		<li><input type="checkbox" checked  disabled> Supprime la class "current_page_parent" du menu "Le Blog" si on est sur une page de CPT</li>
		<li><input type="checkbox" checked  disabled> Modifie la class sur les images insérées</li>
		<li><input type="checkbox" checked  disabled> Supprimer les hauteur et largeur des images insérées via l'editeur</li>
		<li><input type="checkbox" checked  disabled> Désactive le customizer</li>
		<li><input type="checkbox" checked  disabled> Supprime les fonctions inutiles de l'entête</li>
		<li><input type="checkbox" checked  disabled> Renomme les fichiers accentués uploadés</li>
		<li><input type="checkbox" checked  disabled> Désactive l'onglet "option d'écran"</li>
		<li><input type="checkbox" checked  disabled> Modifie le "Salutations" par "Bonjour"</li>
		<li><input type="checkbox" checked  disabled> Déplace la metabox Yoast toujours en bas des pages</li>
		<li><input type="checkbox" checked  disabled> Autorise l'upload des fichiers .SVG</li>
		<li><input type="checkbox" checked  disabled> Préserve le classement des categories des articles</li>
		<li><input type="checkbox" checked  disabled> Redirige vers la page d'accueil après déconnexion de l'admin</li>
	</ul>
</div>

