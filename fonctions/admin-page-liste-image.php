<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

$opt_page_imageune = get_option('opt_page_imageune');
if($opt_page_imageune){
	add_filter('manage_pages_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
	add_action('manage_pages_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
	add_action('admin_head', 'optimizator_css_page_liste_image');
}

// On insére la colonne Image à la une
function crunchify_add_post_admin_thumbnail_column($crunchify_columns){
	$thumb = array('crunchify_thumb' => __('Image à la une'));
	$crunchify_columns = array_slice($crunchify_columns, 0, 1) + $thumb + array_slice($crunchify_columns, 1, null);
	return $crunchify_columns;
}

// On insére dans la colonne l'image à la une de la page correspondante
function crunchify_show_post_thumbnail_column($crunchify_columns, $crunchify_id){
	switch($crunchify_columns){
		case 'crunchify_thumb':
		if( function_exists('the_post_thumbnail') )
			if(has_post_thumbnail()){
				global $post;
				$lien =  get_admin_url() .'post.php?post='. $post->ID .'&amp;action=edit';
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
				echo '<a href="'. $lien .'" style="display:block;height:80px;width:150px;background:url('. $large_image_url[0] .') center center red;"></a>';
				//echo the_post_thumbnail( array(150, 80) );
			} else {
				global $post;
				$lien =  get_admin_url() .'post.php?post='. $post->ID .'&amp;action=edit';
				echo '<a href="'. $lien .'" style="display:block;height:80px;width:150px;border:1px solid #ddd;text-align:center;line-height:80px;color:#aaa;background:#fff;"><em>Pas de photo...</em></a>';
		}
		else
			echo 'hmm... your theme doesn\'t support featured image...';
		break;
	}
}

function optimizator_css_page_liste_image() {
  echo '<style>
    .column-crunchify_thumb {width:150px;}
  </style>';
}