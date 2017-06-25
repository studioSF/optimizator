<?php
/*
Plugin Name: Optimizator
Plugin URI: http://www.search-factory.fr
Description: Optimisations et configuration d'options : TinyMCE, articles, pages, interface, sécurité, etc.
Author: SEARCH-Factory
Author URI: http://www.search-factory.fr
Version: 1.0
*/

class Optimizator_Plugin {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'optimizator_plugin_settings_page' ) );
		add_action( 'init', array( $this, 'optimizator_non_optional_settings' ) );
		add_action( 'init', array( $this, 'optimizator_optional_settings' ) );
	}

	// COnfiguration du plugin
	public function optimizator_plugin_settings_page() {
		$page_title = 'Optimizator Settings Page';
		$menu_title = 'Optimizator';
		$capability = 'manage_options';
		$slug = 'optimizator_champs';
		$callback = array( $this, 'optimizator_options_page' );
		$icon = 'dashicons-editor-code';
		$position = 100;

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );

		// Insertion de font Awesome
		function optimizator_js_admin() {
			echo '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">';
		}
		add_action('admin_head', 'optimizator_js_admin');

		// Ajout CSS et JS perso côté admin
		function optimizator_admin_styles() {
			wp_register_script( 'optimizator_admin_JS', plugins_url( 'assets/optimizator.js', __FILE__ ) );
			wp_enqueue_script( 'optimizator_admin_JS' );
			wp_register_style( 'optimizator_admin_CSS', plugins_url( 'assets/optimizator.css', __FILE__ ) );
			wp_enqueue_style( 'optimizator_admin_CSS' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( 'assets/wp-color-picker-alpha.min.js', __FILE__ ), array( 'wp-color-picker' ), '1.0.0', true );
		}
		add_action( 'admin_enqueue_scripts', 'optimizator_admin_styles' );

		// Création des variables utilisées dans le plugin
		function register_mysettings() {
			$groupName = 'myoption-group';
			$groupVar = array (
				'opt_gen_barreadmin', 'opt_gen_nocommentaires', 'opt_gen_dw_press', 'opt_gen_dw_oeil', 'opt_gen_dw_commentaires', 'opt_gen_dw_recent', 'opt_gen_dw_activite', 'opt_gen_dw_wordpress', 'opt_gen_dw_plugins', 'opt_gen_dw_liens',
				'opt_gen_dw_welcome', 'opt_post_formats', 'opt_post_etiquettes', 'opt_uti_cookies', 'opt_uti_cookies_btn', 'opt_uti_cookies_lien', 'opt_uti_cookies_txt', 'opt_uti_cookies_url', 'opt_uti_cookies_bgcolor', 'opt_uti_cookies_btcolor',
				'opt_uti_cookies_bgtxtcolor', 'opt_uti_cookies_bttxtcolor', 'opt_uti_cookies_pos', 'opt_uti_cookies_pos2', 'opt_tinymce_formats', 'opt_page_imageune', 'opt_article_imageune', 'opt_post_rss', 'opt_post_rss_kill', 'opt_gen_extrait', 'opt_gen_extrait_page',
				'opt_post_image_obligatoire', 'opt_post_redirige', 'opt_acf_user', 'opt_acf_googlemap', 'opt_gen_ga', 'opt_gen_ga_cle', 'opt_tinymce_bouton', 'opt_post_rename', 'opt_post_rename_pluriel', 'opt_gen_apirest'
			);
			foreach ($groupVar as &$value){
				register_setting( $groupName, $value);
			}
		}
		add_action( 'admin_init', 'register_mysettings' );
		
	}

	// Affiche un encart pour avertir que les données ont été sauvegardées dans la BDD
	public function admin_notice() { ?>
        <div class="notice notice-success is-dismissible">
            <p>Vos modifications ont bien été enregistrées !</p>
        </div><?php
    }

	// Toutes les optimisations et fonctions ne nécessitant aucune validation ou option
	public function optimizator_non_optional_settings() {
		require_once('fonctions/_fonctions-automatique.php');
		
	}

	// Toutes les optimisations et fonctions nécessiant un parametrage ou une validation
	public function optimizator_optional_settings() {
		include_once('fonctions/front-admin-barre.php');			// Désactive la barre d'admin côté front
		include_once('fonctions/front-cookies.php');				// Ajoute le cookies choice
		include_once('fonctions/front-extrait.php');				// Modifie la longeur de l'extrait
		include_once('fonctions/front-GA.php');						// Insère Google Analytics avec sa clé
		include_once('fonctions/front-liste-article.php');			// Redirige automatiquement si il n'y a qu'un seul article dans la liste des article
		include_once('fonctions/front-apirest.php');				// Désactive l'Api REST
		include_once('fonctions/admin-tinymce-prestyle.php');		// Suppression dans la liste des formats de TinyMCE
		include_once('fonctions/admin-no-commentaire.php');			// Désactive les commentaires
		include_once('fonctions/admin-widgets-dashboard.php');		// Désactive les widgets du dashboard
		include_once('fonctions/admin-article-formats.php');		// Désactive la métabox des options de format (defaut, video, image, citation, en passant, etc.)
		include_once('fonctions/admin-page-liste-image.php');		// Ajoute de l'image à la une dans la liste des pages
		include_once('fonctions/admin-article-liste-image.php');	// Ajoute de l'image à la une dans la liste des articles
		include_once('fonctions/admin-article-rss.php');			// Fonctions pour le flux RSS des articles
		include_once('fonctions/admin-article-image-oblige.php');	// Imposer l'utilisation d'une image à la une
		include_once('fonctions/admin-acf.php');					// Fonctions ACF
		include_once('fonctions/admin-tinymce-bouton.php');			// Ajout un bouton qui permet de créer un bouton
		include_once('fonctions/admin-article-rename.php');			// Modification du titre "article"
	}

	// Interface Admin
	public function optimizator_options_page() { ?>

	<div class='wrap'>

		<div class="optimizator-menu">

			<div class="optimizator-titre">
				Optimizator
			</div>

			<ul class="onglets">
				<?php // Liste des icones : http://fontawesome.io/icons/ ?>
				<li><a href="#onglet-generalite" class="actif"><i class="fa fa-wrench" aria-hidden="true"></i> Général</a></li>
				<li><a href="#onglet-tinymce"><i class="fa fa-quote-right" aria-hidden="true"></i> TinyMCE</a></li>
				<li><a href="#onglet-articles"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Articles</a></li>
				<li><a href="#onglet-pages"><i class="fa fa-book" aria-hidden="true"></i> Pages</a></li>
				<li><a href="#onglet-utilisateurs"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Utilisateurs</a></li>
				<li><a href="#onglet-cookies"><i class="fa fa-asterisk" aria-hidden="true"></i> Cookies choice</a></li>
				<li><a href="#onglet-acf"><i class="fa fa-clone" aria-hidden="true"></i> ACF Pro</a></li>
				<li><a href="#onglet-maintenance"><i class="fa fa-shield" aria-hidden="true"></i> Maintenance</a></li>
				<li><a href="#onglet-wpconfig"><i class="fa fa-code" aria-hidden="true"></i> wp-config</a></li>
			</ul>

		</div>
		
		<div class="optimizator-contenu">
			<div class="optimizator-container">
				<?php
				if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
					$this->admin_notice();
				} ?>
				<h1></h1>
				
				<form method="post" action="options.php">

				<?php
					// Liste des options à sauvegarder
					wp_nonce_field('update-options');
					settings_fields( 'myoption-group' );
					do_settings_sections( 'myoption-group' );
				?>
				
				<?php
					// Boucle pour générer les onglets
					$arr = array('generalite', 'tinymce', 'articles', 'pages', 'utilisateurs', 'cookies', 'acf', 'maintenance', 'wpconfig');
					reset($arr);
					foreach ($arr as $value) {
				?>
					<div class="onglets-panel" id="onglet-<?php echo $value; ?>">
						<?php require_once('inc/'. $value .'.php'); ?>
					</div>
				<?php } ?>

					<div class="optimizator-footer">
						<?php
						$other_attributes = array( 'id' => 'optimizator-btn' );
						submit_button(
							'Sauvegarder les options',
							'primary',
							'submit',
							true,
							$other_attributes
						); ?>
					</div>

				</form>
			</div>

		</div>
	</div>

<?php }
}

// Lancement du plugin
new Optimizator_Plugin();


