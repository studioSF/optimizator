<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Redirige automatiquement si il n'y a qu'un seul article dans la liste des articles
$opt_post_redirige = get_option('opt_post_redirige');
if($opt_post_redirige){
	add_action('template_redirect', 'optimizator_redirige_article');
}


function optimizator_redirige_article(){
    global $wp_query;
    if( is_archive() && $wp_query->post_count == 1 ){
        the_post();
        $post_url = get_permalink();
        wp_redirect( $post_url );
    }
} 