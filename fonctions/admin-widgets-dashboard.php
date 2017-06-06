<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

    // Welcome
    $opt_gen_dw_welcome = get_option('opt_gen_dw_welcome');
    if($opt_gen_dw_welcome){
        remove_action('welcome_panel', 'wp_welcome_panel');
    }

    // Suppression des widgets du dahsboard
    function optimizator_remove_dashboard_widgets () {
        // Brouillon rapide
        $opt_gen_dw_press = get_option('opt_gen_dw_press');
        if($opt_gen_dw_press){
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        }

        // Un coup d'oeil
        $opt_gen_dw_oeil = get_option('opt_gen_dw_oeil');
        if($opt_gen_dw_oeil){
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'side' );
        }

        // Commentaires récents
        $opt_gen_dw_commentaires = get_option('opt_gen_dw_commentaires');
        if($opt_gen_dw_commentaires){
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        }

        // Brouillons récents
        $opt_gen_dw_recent = get_option('opt_gen_dw_recent');
        if($opt_gen_dw_recent){
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        }

         // Activité
        $opt_gen_dw_activite = get_option('opt_gen_dw_activite');
        if($opt_gen_dw_activite){
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        }

        // WordPress.com Blog
        $opt_gen_dw_wordpress = get_option('opt_gen_dw_wordpress');
        if($opt_gen_dw_wordpress){
            remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
        }

        // Plugins
        $opt_gen_dw_plugins = get_option('opt_gen_dw_plugins');
        if($opt_gen_dw_plugins){
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        }

        // Incoming Links
        $opt_gen_dw_liens = get_option('opt_gen_dw_liens');
        if($opt_gen_dw_liens){
            remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );
        }
        
    }
    add_action('admin_init', 'optimizator_remove_dashboard_widgets');
