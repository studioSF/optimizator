<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Désactive la métabox des options de format (defaut, video, image, citation, en passant, etc.)
$opt_post_formats = get_option('opt_post_formats');
if($opt_post_formats){
	add_action('add_meta_boxes_post', 'optimizator_remove_formats', 11);
}

// Désactive les étiquettes pour les articles
$opt_post_etiquettes = get_option('opt_post_etiquettes');
if($opt_post_etiquettes){
	add_filter('manage_posts_columns', 'optimizator_remove_etiquettes_columns_posts');
	add_action('admin_menu', 'optimizator_remove_etiquettes_menus');
	add_action('admin_menu','optimizator_remove_etiquettes_metaboxes');
}

function optimizator_remove_formats(){
    remove_meta_box( 'formatdiv', $post->post_type,'side' );
}

function optimizator_remove_etiquettes_metaboxes() {
    remove_meta_box( 'tagsdiv-post_tag', 'post', 'side'); 
}

function optimizator_remove_etiquettes_menus () {
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}

function optimizator_remove_etiquettes_columns_posts($defaults) {
    unset($defaults['tags']); //remove tags
    return $defaults;
}



/* Supprime les options que l'on a dans "options de l'écran"
function my_remove_meta_boxes() {
		remove_meta_box( 'linktargetdiv', 'link', 'normal' );
		remove_meta_box( 'linkxfndiv', 'link', 'normal' );
		remove_meta_box( 'linkadvanceddiv', 'link', 'normal' );
		remove_meta_box( 'postexcerpt', 'post', 'normal' );
		remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
		remove_meta_box( 'postcustom', 'post', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
		remove_meta_box( 'commentsdiv', 'post', 'normal' );
		remove_meta_box( 'revisionsdiv', 'post', 'normal' );
		remove_meta_box( 'authordiv', 'post', 'normal' );
		remove_meta_box( 'sqpt-meta-tags', 'post', 'normal' );
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );*/
