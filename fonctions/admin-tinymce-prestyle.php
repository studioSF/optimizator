<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

// Suppression dans la liste des formats de TinyMCE : h1, h5, h6, adress et Pre
$opt_tinymce_formats = get_option('opt_tinymce_formats');
if($opt_tinymce_formats){
	add_filter('tiny_mce_before_init', 'optimizator_tiny_mce_remove_unused_formats' );
}

function optimizator_tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;';
	return $init;
}