<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

	// Désactive la barre d'admin côté front
    $opt_gen_barreadmin = get_option('opt_gen_barreadmin');
    if($opt_gen_barreadmin){
        add_filter('show_admin_bar', '__return_false');
    }
