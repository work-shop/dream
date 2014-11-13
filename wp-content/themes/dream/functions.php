<?php


get_template_parts( array( 'theme-options') );


function register_my_menus(){
	register_nav_menus(
	array(
	'primary' => _( 'Main Menu' ),
	)
	);
}
add_action( 'init', 'register_my_menus');


add_action( 'init', 'create_post_type' );
function create_post_type() {

	register_post_type( 'dreams',
		array(
			'labels' => array(
				'name' => 'Dreams',
				'singular_name' =>'Dream',
				'add_new' => 'Add New',
			    'add_new_item' => 'Add New Dream',
			    'edit_item' => 'Edit Dream',
			    'new_item' => 'New Dream',
			    'all_items' => 'All Dreams',
			    'view_item' => 'View Dream',
			    'search_items' => 'Search Dreams',
			    'not_found' =>  'No Dreams found',
			    'not_found_in_trash' => 'No Dreams found in Trash', 				
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'dreams'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);	
	
	register_post_type( 'interactions',
		array(
			'labels' => array(
				'name' => 'Interactions',
				'singular_name' =>'Interaction',
				'add_new' => 'Add New',
			    'add_new_item' => 'Add New Interaction',
			    'edit_item' => 'Edit Interaction',
			    'new_item' => 'New Interaction',
			    'all_items' => 'All Interactions',
			    'view_item' => 'View Interaction',
			    'search_items' => 'Search Interactions',
			    'not_found' =>  'No Interactions found',
			    'not_found_in_trash' => 'No Interactions found in Trash', 				
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'interactions'),
			'supports' => array( 'title', 'editor')
		)
	);		

}

function custom_taxonomy()  {

	$labels = array(
		'name'                       => _x( 'Interaction Type', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Interaction Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Interaction Type', 'text_domain' ),
		'all_items'                  => __( 'All Interaction Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Interaction Types', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Interaction Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Interaction Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Interaction Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Interaction Type', 'text_domain' ),
		'update_item'                => __( 'Update Interaction Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Interaction Types with commas', 'text_domain' ),
		'search_items'               => __( 'Search Interaction Types', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Interaction Type', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Interaction Types', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'interaction_type', 'interactions', $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

function theme_scripts() {
	wp_deregister_script( 'jquery' );
    
    wp_register_script( 'jquery', get_template_directory_uri() . '/_/js/jquery.js');
    wp_register_script( 'less', get_template_directory_uri() . '/_/js/less.js');
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/_/js/bootstrap.min.js');
    wp_register_script( 'flexslider', get_template_directory_uri() . '/_/js/flexslider.js');
    wp_register_script( 'functions', get_template_directory_uri() . '/_/js/functions.js');


    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'less' );    
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'flexslider' ); 
	wp_enqueue_script( 'functions' );
	
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_styles() { 
  
  wp_register_style( 'bootstrap', get_template_directory_uri() . '/_/css/bootstrap/bootstrap.css');    
  wp_register_style( 'style-less', get_template_directory_uri() . '/_/css/style.less');  
  //wp_register_style( 'style-css', get_template_directory_uri() . '/_/css/style.css');    
  wp_register_style( 'pictograms', get_template_directory_uri() . '/_/fonts/pictograms.css');  
  wp_register_style( 'akkurat', get_template_directory_uri() . '/_/fonts/akkurat.css');  
   
  wp_enqueue_style( 'bootstrap' );   
  wp_enqueue_style( 'style-less' );
  wp_enqueue_style( 'akkurat' );  
  wp_enqueue_style( 'pictograms' );
  
}
add_action('wp_enqueue_scripts', 'theme_styles');

function enqueue_less_styles($tag, $handle) {
    global $wp_styles;
    $match_pattern = '/\.less$/U';
    if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
        $handle = $wp_styles->registered[$handle]->handle;
        $media = $wp_styles->registered[$handle]->args;
        $href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
        $rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
        $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';

        $tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
    }
    return $tag;
}
add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);


if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 570, 570, false );
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'drawing', 768, 768, true );
	add_image_size( 'background', 1440, 1440, true );			
}


function autoset_featured() {
  global $post;
  $already_has_thumb = has_post_thumbnail($post->ID);
      if (!$already_has_thumb)  {
      $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
          if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
            set_post_thumbnail($post->ID, $attachment_id);
            }
          }
      }
}
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');


function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/_/css/login.css' );
}
add_action('login_head', 'login_css');


function customAdmin() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/_/css/admin.css' );}
add_action('admin_head', 'customAdmin');


function get_template_parts( $parts = array() ) {
	foreach( $parts as $part ) {
		get_template_part( $part );
	};
}

function remove_menus () {
global $menu;
	$restricted = array( __('Comments'), __('Posts'),__ ('Appearance') );
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');


function remove_acf_menu(){
 
    $admins = array( 
        'dev', 
    );
 
    $current_user = wp_get_current_user();
 
    if( !in_array( $current_user->user_login, $admins ) )
    {
        remove_menu_page('edit.php?post_type=acf');
    }
 
}

add_action( 'admin_menu', 'remove_acf_menu', 999 );


show_admin_bar(false);


add_filter('default_hidden_meta_boxes', 'be_hidden_meta_boxes', 10, 2);
function be_hidden_meta_boxes($hidden, $screen) {
	if ( 'post' == $screen->base || 'page' == $screen->base )
		$hidden = array('slugdiv', 'trackbacksdiv', 'commentstatusdiv', 'commentsdiv', 'postcustom', 'revisionsdiv');
	return $hidden;
}



function interactions_relationship( $html, $post ) {
	$terms = wp_get_post_terms( $post->ID, 'interaction_type' );
	
	if ( $terms ) {

		//$html .= '<h3>'. $terms .'</h3>';

	}

	return $html;

}





add_filter(
	'acf/fields/relationship/result/name=interaction', 
	'interactions_relationship', 
	10, 
	2
);






define('MAGPIE_FETCH_TIME_OUT', 180);


?>
