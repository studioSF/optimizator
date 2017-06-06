<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

$opt_gen_nocommentaires = get_option('opt_gen_nocommentaires');
if($opt_gen_nocommentaires){
	add_filter('comments_open', 'optimizator_comments_closed', 10, 2);
	add_action('admin_menu', 'optimizator_remove_metabox_comments');
	add_action('admin_menu', 'optimizator_remove_menu_comments');
	add_action('admin_bar_menu', 'optimizator_clean_comment_bar_admin', 999);
	add_filter('manage_pages_columns', 'optimizator_clean_comment_page_admin');
	add_filter('manage_posts_columns', 'optimizator_clean_comment_article_admin');
	add_filter('manage_media_columns', 'optimizator_clean_comment_media_admin');
}

/* Déactivation des commentaires côté Front */
function optimizator_comments_closed( $open, $post_id ) {
	$post = get_post( $post_id );
	//if ('post' == $post->post_type)
		$open = false;
		return $open;
}

/* Désactivation de la metabox commentaires dans les pages et articles */
function optimizator_remove_metabox_comments () {
	remove_meta_box('commentsdiv', 'page', 'normal');
	remove_meta_box('commentstatusdiv', 'page', 'normal');
	remove_meta_box('commentsdiv', 'post', 'normal');
	remove_meta_box('commentstatusdiv', 'post', 'normal');
	remove_meta_box('commentsdiv', 'attachment', 'normal');
	remove_meta_box('commentstatusdiv', 'attachment', 'normal');
	remove_meta_box('commentsdiv', 'link', 'normal');
	remove_meta_box('commentstatusdiv', 'link', 'normal');
}

/* Désactivation du menu Commentaire dans le menu */
function optimizator_remove_menu_comments () {
	remove_menu_page('edit-comments.php');
}

/* Désactivation du menu Commentaire dans la barre du haut */
function optimizator_clean_comment_bar_admin () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}

/* Désactivation de la colonne Commentaires dans les listes, articles et médias */
function optimizator_clean_comment_page_admin ($columns) {
	unset( $columns['comments']);
	return $columns;
}
function optimizator_clean_comment_article_admin ($columns) {
	unset( $columns['comments']);
	return $columns;
}
function optimizator_clean_comment_media_admin ($columns) {
	unset( $columns['comments']);
	return $columns;
}

