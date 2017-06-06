<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Ajoute la miniature au flux RSS des articles
$opt_post_rss = get_option('opt_post_rss');
if($opt_post_rss){
	add_filter('the_excerpt_rss', 'optimizator_rss_post_thumbnail');
	add_filter('the_content_feed', 'optimizator_rss_post_thumbnail');
}


function optimizator_rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '
		
		' . get_the_post_thumbnail($post->ID) .
		'
		
		' . get_the_content();
	}
	return $content;
}

// Désactive le flux RSS des articles
$opt_post_rss_kill = get_option('opt_post_rss_kill');
if($opt_post_rss_kill){
	add_action('do_feed', 'optimizator_rss_fill', 1);
add_action('do_feed_rdf', 'optimizator_rss_fill', 1);
add_action('do_feed_rss', 'optimizator_rss_fill', 1);
add_action('do_feed_rss2', 'optimizator_rss_fill', 1);
add_action('do_feed_atom', 'optimizator_rss_fill', 1);
}

function optimizator_rss_fill() {
	wp_die( __('Sorry, we don\'t use RSS!') );
}