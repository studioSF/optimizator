<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

$opt_acf_user = get_option('opt_acf_user');
$opt_acf_googlemap = get_option('opt_acf_googlemap');

// On affiche le menu ACF uniquement pour le user
if($opt_acf_user){
	add_filter('acf/settings/show_admin', 'optimizator_acf_user');
}

// Insertion de la Google Map API Key
if($opt_acf_googlemap){
	add_action('acf/init', 'optimizator_acf_mapapi_cle');
}


/*-- On affiche le menu ACF uniquement pour le user "vivien" --*/
function optimizator_acf_user() {
	global $current_user;
    get_currentuserinfo();
	if ( $current_user->user_login == ''. $opt_acf_user.'' ){
	  return current_user_can('manage_options');
	}
}

/*-- Google Map API Key --*/
function optimizator_acf_mapapi_cle() {
	acf_update_setting('google_api_key', ''. $opt_acf_googlemap.'');
}

