<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Ajoute la miniature au flux RSS des articles
$opt_post_rename = get_option('opt_post_rename');
$opt_post_rename_pluriel = get_option('opt_post_rename_pluriel');

if($opt_post_rename){
	add_action( 'admin_menu', 'optimizator_change_post_label' );
	add_action( 'init', 'optimizator_change_post_object' );
}


function optimizator_change_post_label() {
    global $menu;
    global $submenu;
    $opt_post_rename = get_option('opt_post_rename');
    if (array_key_exists('edit.php', $submenu)) {
        $submenu['edit.php'][5][0]  = 'tous les tata';

        if (count($submenu['edit.php']) >= 11) {
            $submenu['edit.php'][10][0] = 'Add News';
        }

        if (count($submenu['edit.php']) >= 17) {
            $submenu['edit.php'][16][0] = 'News Tags';
        }
    }
}
function optimizator_change_post_object() {
    global $wp_post_types;
    $opt_post_rename = get_option('opt_post_rename');
    $opt_post_rename_pluriel = get_option('opt_post_rename_pluriel');
    $labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
