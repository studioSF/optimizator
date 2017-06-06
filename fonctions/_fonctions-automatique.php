<?php

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

    // Désactivation des emojiis
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    // Désactive XMLRPC
    add_filter( 'xmlrpc_enabled', '__return_false' );
    add_filter( 'wp_headers', 'disable_x_pingback' );
    function disable_x_pingback( $headers ) {
        unset( $headers['X-Pingback'] );
    return $headers;
    }
    
    // Désactive RSD link
    remove_action('wp_head', 'rsd_link');

    // Désactive Wlwmanifest
    remove_action('wp_head', 'wlwmanifest_link');


    // Supprime la class "current_page_parent" du menu "Le Blog" si on est sur une page de CPT
    function wpdev_nav_classes( $classes, $item ) {
        if( ( is_post_type_archive( 'realisation' ) || is_singular( 'realisation' ) || is_tax('genre') )
            && $item->title == 'Blog' ){
            $classes = array_diff( $classes, array( 'current_page_parent') );
        }
        return $classes;
    }
    add_filter( 'nav_menu_css_class', 'wpdev_nav_classes', 10, 2 );

    // Activation des images à la une pour les pages
    add_theme_support('post-thumbnails');

    // Modifie la class sur les images insérées
    function personnalize_add_custom_class_to_all_images($content){
        /* Filter by Qassim Hassan - http://wp-time.com */
        $my_custom_class = "img-responsive"; // your custom class
        $add_class = str_replace('<img class="', '<img class="'.$my_custom_class.' ', $content); // add class
        return $add_class; // display class to image
    }
    add_filter('the_content', 'personnalize_add_custom_class_to_all_images');

    // Supprimer les hauteur et largeur des images insérées via l'editeur
    function remove_width_attribute( $html ) {
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return $html;
    }
    add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
    add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images


    // Supprime les fonctions inutiles de l'entête
    add_action('init', 'optimizator_clean_head');
    function optimizator_clean_head () {
        remove_action( 'wp_head', 'feed_links', 2 );                            // Affiche les liens des flux RSS pour les Articles et les commentaires.
        remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Affiche les liens des flux RSS supplémentaires comme les catégories de vos articles.
        remove_action( 'wp_head', 'rsd_link' );
        remove_action( 'wp_head', 'wlwmanifest_link' );                         // Affiche le lien xml dont a besoin Windows Live Writer pour accéder à votre blog. Si vous ne publiez pas vos articles avec ce logiciel, il ne vous sert à rien.
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Affiche les liens relatifs vers les articles suivants et précédents. (<kbd><link title=" href=" rel="prev" /></kbd> et <kbd>       				<link title="" href=""" rel="next" /></kbd>). Ces liens peuvent parfois affecter votre SEO.
        remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );              // Affiche l'url raccourcie de la page ou vous vous situez.

    // On en profite pour supprimer le style en trop ajouté par le widget "Commentaires récents"
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ));
    }


    /*-------------------------------------------------------------
    * --------------------- BACK-OFFICE ---------------------------
    * Liste des optimisations / fonctions spécifique pour l'admin
    *-------------------------------------------------------------*/

    // Se souvenir de moi coché par défaut
    add_action( 'login_form' , create_function( '', 'global $rememberme; $rememberme = 1;' ) );

    // Supprime le customizer du menu
    function remove_customize_page(){
		global $submenu;
		unset($submenu['themes.php'][6]); // supprimer personnalise = customizer
        unset($submenu['themes.php'][15]); // supprime en-tête
	}
	add_action( 'admin_menu', 'remove_customize_page');

    // Modification du texte de pied de page de l'admin
    function optimizator_remove_footer_admin () {
        //echo 'Page chargée en '. timer_stop() .' secondes'; // affiche le temps de chargement de la page
        echo 'Porté & développé par SEARCH-factory';
    }
    add_filter('admin_footer_text', 'optimizator_remove_footer_admin');

    // Suppression de l'aide
    function optimizator_non_help_admin ($old_help, $screen_id, $screen) {
        $screen->remove_help_tabs();
        return $old_help;
    }
    add_filter('contextual_help', 'optimizator_non_help_admin', 999, 3);

    // Suppression obtenir le lien court
    add_filter('pre_get_shortlink', '__return_empty_string');

    // Désactivation du menu Wordpress dans la barre du haut
    function optimizator_clean_bar_admin () {
        global $wp_admin_bar;
        $wp_admin_bar->remove_node('wp-logo');
    }
    add_action('admin_bar_menu', 'optimizator_clean_bar_admin', 999);

    // Ajout de la fonction "dupliquer" pour les articles
    function dupliquer_sans_plugin(){
        global $wpdb;
        if (! ( isset( $_GET['post']) || isset( $_POST['post']) || ( isset($_REQUEST['action']) && 'dupliquer_sans_plugin' == $_REQUEST['action'] ) ) ) {
            wp_die("Aucun article à dupliquer n'a été fourni...");

            check_admin_referer( 'duplicate-post_' . $post->ID ); // correction du 9 février 2017
        }
    
            // RECUPERE LES INFOS A DUPLIQUER
            $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
            $post = get_post( $post_id );
            $current_user = wp_get_current_user();
            $new_post_author = $post->post_author; // correction du 9 février 2017

        if (isset( $post ) && $post != null) {
    
            // REGLAGES DU NOUVEAU BROUILLON
            $args = array(
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_name' => $post->post_name,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft',
            'post_title' => $post->post_title,
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order
            );
    
            $new_post_id = wp_insert_post( $args );
    
            $taxonomies = get_object_taxonomies($post->post_type);
            foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
 
        $post_meta_infos = get_post_meta( $post_id ); // correction du 9 février 2017
 
        wp_redirect( admin_url( 'post.php?action=edit&amp;post=' . $new_post_id ) );
        exit;
        } else {
        wp_die("Une erreur s'est produite, impossible de trouver l'article original : " . $post_id);
        }
    }

    add_action( 'admin_action_dupliquer_sans_plugin', 'dupliquer_sans_plugin' );

    function dupliquer_le_post( $actions, $post ) {
        if (current_user_can('edit_posts', $post->ID)) { // correction du 9 février 2017
            $url = wp_nonce_url( admin_url( 'admin.php?action=dupliquer_sans_plugin&amp;amp;post=' . $post->ID ), 'duplicate-post_' . $post->ID ); // correction du 9 février 2017
            $actions['duplicate'] = '<a href="' . esc_url( $url ) . '" title="Dupliquer cet article" rel="permalink">Dupliquer</a>'; // correction du 9 février 2017
        }
        return $actions;
    }
    
    add_filter( 'post_row_actions', 'dupliquer_le_post', 10, 2 );

    // Désactivation de numéro de version de WP dans le header
    remove_action('wp_head', 'wp_generator');
    function optimizator_remove_version() {
        return '';
    }
    add_filter('the_generator', 'optimizator_remove_version');

    // Désactivation de numéro de version de WP dans l'admin
    function optimizator_remove_version_footer(){
        remove_filter ('update_footer', 'core_update_footer');
    }
    add_action('admin_menu', 'optimizator_remove_version_footer');

    // Cache le menu des mises à jour si utilisateur est non-admin
    if( ! is_admin() ){
        function optimizator_remove_menu_maj () {
            remove_submenu_page('index.php', 'update-core.php');
        }
        add_action('admin_menu', 'optimizator_remove_menu_maj');
    }

    // Quand on veut insérer une image, l'option "pas de lien" est cochée par défaut
    update_option('image_default_link_type','none');

    // Affiche par défaut la seconde barre d'outils de TinyMCE
    function optimizator_unhide_secondBar( $args ) {
        $args['wordpress_adv_hidden'] = false;
        return $args;
    }
    add_filter( 'tiny_mce_before_init', 'optimizator_unhide_secondBar' );


    // Renomme les fichiers accentués uploadés
    function wpc_sanitize_french_chars($filename) {
	
        /* Force the file name in UTF-8 (encoding Windows / OS X / Linux) */
        $filemane = mb_convert_encoding($filename, "UTF-8");

        $char_not_clean = array('/À/','/Á/','/Â/','/Ã/','/Ä/','/Å/','/Ç/','/È/','/É/','/Ê/','/Ë/','/Ì/','/Í/','/Î/','/Ï/','/Ò/','/Ó/','/Ô/','/Õ/','/Ö/','/Ù/','/Ú/','/Û/','/Ü/','/Ý/','/à/','/á/','/â/','/ã/','/ä/','/å/','/ç/','/è/','/é/','/ê/','/ë/','/ì/','/í/','/î/','/ï/','/ð/','/ò/','/ó/','/ô/','/õ/','/ö/','/ù/','/ú/','/û/','/ü/','/ý/','/ÿ/', '/©/');
        $clean = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y','copy');

        $friendly_filename = preg_replace($char_not_clean, $clean, $filename);

        /* After replacement, we destroy the last residues */
        $friendly_filename = utf8_decode($friendly_filename);
        $friendly_filename = preg_replace('/\?/', '', $friendly_filename);

        /* Lowercase */
        $friendly_filename = strtolower($friendly_filename);

        return $friendly_filename;
    }
    add_filter('sanitize_file_name', 'wpc_sanitize_french_chars', 10);

    // Désactive l'onglet "option d'écran"
    function remove_screen_options($display_boolean, $wp_screen_object){
        // liste des pages où supprimer l'onglet
        $blacklist = array('post.php', 'post-new.php', 'index.php', 'edit.php', 'upload.php', 'media-new.php', 'edit-tags.php', 'options-general.php', 'themes.php', 'widgets.php');
        if (in_array($GLOBALS['pagenow'], $blacklist)) {
            $wp_screen_object->render_screen_layout();
            $wp_screen_object->render_per_page_options();
            return false;
        } else {
            return true;
        }
    }
    add_filter('screen_options_show_screen', 'remove_screen_options', 10, 2);

    // Modification du "Salutations" par autre chose
    function custom_howdy( $text ) {
        $greeting = 'Bonjour';
        if ( is_admin() ) {
            $text = str_replace( 'Salutations', $greeting, $text );
        }
        return $text;
    }
    add_filter( 'gettext', 'custom_howdy' );

    // Déplace la metabox Yoast toujours en bas des pages
    function yoast_bottom() {
        return 'low';
    }
    add_filter( 'wpseo_metabox_prio', 'yoast_bottom');


    // Autorise le format .SVG
    function add_mime_types( $mimes ){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter( 'upload_mimes', 'add_mime_types' );

    // Préserve le classement des categories des articles
    class Category_Checklist {
        static function init() {
            add_filter( 'wp_terms_checklist_args', array( __CLASS__, 'checklist_args' ) );
        }
        static function checklist_args( $args ) {
            add_action( 'admin_footer', array( __CLASS__, 'script' ) );
            $args['checked_ontop'] = false;
            return $args;
        }
        // Scrolls to first checked category
        static function script() {
    ?>
    <script type="text/javascript">
        jQuery(function(){
            jQuery('[id$="-all"] > ul.categorychecklist').each(function() {
                var $list = jQuery(this);
                var $firstChecked = $list.find(':checkbox:checked').first();
                if ( !$firstChecked.length )
                    return;
                var pos_first = $list.find(':checkbox').position().top;
                var pos_checked = $firstChecked.position().top;
                $list.closest('.tabs-panel').scrollTop(pos_checked - pos_first + 5);
            });
        });
    </script>
    <?php
        }
    }
    Category_Checklist::init();

    // Redirige vers la page d'accueil après déconnexion de l'admin
    add_action('wp_logout','auto_redirect_after_logout');
    function auto_redirect_after_logout(){
        wp_redirect( home_url() );
        exit();
    }

    // Supprime les colonnes YOAST de la liste des articles et des pages pour les non-admins
    function rkv_remove_columns( $columns ) {
        if( current_user_can('manage_options')) {
            return $columns;
        } else {
            unset( $columns['wpseo-score'] );
            unset( $columns['wpseo-title'] );
            unset( $columns['wpseo-metadesc'] );
            unset( $columns['wpseo-focuskw'] );
            unset( $columns['wpseo-score-readability'] );
            return $columns;
        }
    }
    add_filter ( 'manage_edit-post_columns', 'rkv_remove_columns' );
    add_filter ( 'manage_edit-page_columns', 'rkv_remove_columns' );