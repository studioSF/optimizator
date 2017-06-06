<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );


// Désactive l'API REST sauf si on est connecté
$opt_gen_apirest = get_option('opt_gen_apirest');
if($opt_gen_apirest){
    add_filter( 'rest_authentication_errors', 'secure_API' );
}

    
function secure_API( $access ) {
    if( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_cannot_access', __( 'Accès réservé aux personnes authentifiées', 'disable-json-api' ), array( 'status' => rest_authorization_required_code() ) );
    }
    return $access;
}
    