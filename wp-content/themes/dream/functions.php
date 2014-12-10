<?php


get_template_parts( array( 'theme-options') );

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
}

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

/*

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
*/


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

		
/*
add_action('save_post', 'populate_the_content');

function populate_the_content($post_id) {
    if(get_post_type( $post_id ) != 'acf'){

	    //Check it's not an auto save routine
	     if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
	          return;
	
	    //Perform permission checks! For example:
	    if ( !current_user_can('edit_post', $post_id) ) 
	          return;
	
	    //Check your nonce!
	
	    //If calling wp_update_post, unhook this function so it doesn't loop infinitely
	    remove_action('save_post', 'populate_the_content');
	    
		$post_content = get_field('dream_text',$post_id);
	
	    // call wp_update_post update, which calls save_post again. E.g:
	    	wp_update_post(array('ID' => $post_id, 'post_content' => $post_content));
	
	
	    // re-hook this function
	    add_action('save_post', 'populate_the_content');
    
    }
}
*/


define('MAGPIE_FETCH_TIME_OUT', 180);


?>
