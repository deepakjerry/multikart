<?php

function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri(),'style.css' ); 
  wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/style.css', array(), '1.1', 'all');
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/vendors/bootstrap.css', array(), '1.1', 'all');
  wp_enqueue_style( 'themifyicon', get_template_directory_uri() . '/assets/css/vendors/themify-icons.css', array(), '1.1', 'all');
  wp_enqueue_style( 'animatecss', get_template_directory_uri() . '/assets/css/vendors/animate.css', array(), '1.1', 'all');
  wp_enqueue_style( 'slickcss', get_template_directory_uri() . '/assets/css/vendors/slick-theme.css', array(), '1.1', 'all');
  wp_enqueue_style( 'slickvendorcss', get_template_directory_uri() . '/assets/css/vendors/slick.css', array(), '1.1', 'all');
  wp_enqueue_style( 'awesomecss', get_template_directory_uri() . '/assets/css/vendors/font-awesome.css', array(), '1.1', 'all');

 
 // js inclde
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'jqueryui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'exitintent', get_template_directory_uri() . '/assets/js/jquery.exitintent.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'exitjquery', get_template_directory_uri() . '/assets/js/exit.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/assets/js/slick.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'menujs', get_template_directory_uri() . '/assets/js/menu.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'lazysizes', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'bootstrapbt', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'notifyc', get_template_directory_uri() . '/assets/js/bootstrap-notify.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'flyjs', get_template_directory_uri() . '/assets/js/fly-cart.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'themesetting', get_template_directory_uri() . '/assets/js/theme-setting.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'scriptjs', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), 1.1, true);
 
    
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/*Post featured image showing in datatable function start here*/
add_image_size( 'crunchify-admin-post-featured-image', 120, 120, false );
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
// Add the column
function crunchify_add_post_admin_thumbnail_column($crunchify_columns){
    $crunchify_columns['crunchify_thumb'] = __('Featured Image');
    return $crunchify_columns;
}
// Let's manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
// Here we are grabbing featured-thumbnail size post thumbnail and displaying it
function crunchify_show_post_thumbnail_column($crunchify_columns, $crunchify_id){
    switch($crunchify_columns){
        case 'crunchify_thumb':
        if( function_exists('the_post_thumbnail') )
            echo the_post_thumbnail( 'crunchify-admin-post-featured-image' );
        else
            echo 'hmm... your theme doesn\'t support featured image...';
        break;
    }
}


// Changing excerpt length
function new_excerpt_length($length) {
return 90;
}
add_filter('excerpt_length', 'new_excerpt_length');
 
// Changing excerpt more
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_theme_support( 'post-thumbnails');
function wporg_custom_post_type() {
  register_post_type('wporg_product',
    array(
      'labels'      => array(
        'name'          => __('Products', 'textdomain'),
        'singular_name' => __('Product', 'textdomain'),
      ),
        'public'      => true,
        'has_archive' => true,
    )
  );
}
add_action('init', 'wporg_custom_post_type');