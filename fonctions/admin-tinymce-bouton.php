<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Suppression dans la liste des formats de TinyMCE : h1, h5, h6, adress et Pre
$opt_tinymce_bouton = get_option('opt_tinymce_bouton');
if($opt_tinymce_bouton){
	add_action('admin_head', 'gavickpro_add_my_tc_button');
}


function gavickpro_add_my_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    	return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "gavickpro_add_tinymce_plugin");
        add_filter('mce_buttons', 'gavickpro_register_my_tc_button');
    }
}
function gavickpro_add_tinymce_plugin($plugin_array) {
	$plugin_array['gavickpro_tc_button'] = plugins_url( '../assets/optimizator-button.js', __FILE__ );
    return $plugin_array;
}
function gavickpro_register_my_tc_button($buttons) {
   array_push($buttons, "gavickpro_tc_button");
   return $buttons;
}

add_action('admin_head', 'gavickpro_custom_css');
function gavickpro_custom_css() {
	// Ajoute le style CSS pour mettre le bouton à la bonne largeur. Adapter l'id en fonction de l'id généré
	echo '<style>
	#mceu_14 button .mce-ico {width:62px;} 
	</style>';
}