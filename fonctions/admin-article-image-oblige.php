<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Imposer l'utilisation d'une image à la une
$opt_post_image_obligatoire = get_option('opt_post_image_obligatoire');
if($opt_post_image_obligatoire){
	add_action('save_post', 'optimizator_featured_image');
	add_action('admin_notices', 'optimizator_image_error');
}


function optimizator_featured_image($post_id) {

    // Si c'est un article
    if(get_post_type($post_id) != 'post')
        return;

	// Si aucune image à la une n'est présente
    if ( !has_post_thumbnail( $post_id ) ) {
        // On utilise un transient pour afficher un message au redacteur
        set_transient( "has_post_thumbnail", "no" );
        // On supprime la fonction pour qu'elle ne boucle pas à l'infini
        remove_action('save_post', 'wpm_image_une');
        // On enregistre l'article en tant que brouillon
        wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
        add_action('save_post', 'wpm_image_une');
    } else {
        delete_transient( "has_post_thumbnail" );
    }
}

function optimizator_image_error()
{
    // On vérifie que le transient est défini et on affiche le message d'erreur
    if ( get_transient( "has_post_thumbnail" ) == "no" ) {
        echo "<div id='message' class='error'><p><strong>Vous devez choisir une image à la Une. Votre article est sauvegardé mais ne sera pas publié.</strong></p></div>";
        delete_transient( "has_post_thumbnail" );
    }
}
