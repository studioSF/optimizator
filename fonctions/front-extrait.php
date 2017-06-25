<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Modifie la longeur de l'extrait
function optimizator_extrait($length){
    $opt_gen_extrait = get_option('opt_gen_extrait');
    return $opt_gen_extrait;
}
add_filter('excerpt_length', 'optimizator_extrait');

// Active l'extrait pour les pages
$opt_gen_extrait_page = get_option('opt_gen_extrait_page');
if($opt_gen_extrait_page){
    add_action( 'admin_init', create_function('', "return add_post_type_support( 'page', 'excerpt' );") );
}