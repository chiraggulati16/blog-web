<?php
function setupTheme() {
add_theme_support('post-thumbnails');
add_theme_support('htm5',array(
    'search-form',
    'comment-form',
    'gallery',
    'caption'
));
} 
add_action('after_setup_theme','setupTheme');
register_sidebar(array(
    'name' => __('Wp Blog Sidebar', 'wpBlogSample'),
    'id'   => 'wp-blog-1',
    'description' => 'This is default sidebar',
    'class' => '',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>'
));

$location = array(
    'menu-1' => 'Navigation Menu One',
    'menu-2' => 'Navigation Menu Two',
);

function enqueueScriptStyles() {
    //we can register a style before embeding or enquing into wordpress theme
    wp_register_style('bootstrap-ltr', get_template_directory_uri()."/assets/css/bootstrap.ltr.min.css",
    array(), false, 'all');
    wp_register_style('bootstrap-rtl', get_template_directory_uri()."/assets/css/bootstrap.rtl.min.css",
    array(), false, 'all');
    wp_register_style('my-style-css', get_template_directory_uri()."/assets/css/style.css",
    array(), false, 'all');
     //we can register a script before embeding or enquing into wordpress theme
     wp_register_script('popper-js', get_template_directory_uri()."/assets/js/popper.min.js",
    array('jquery'), false, '1.0',true); 
    wp_register_script('bootstrap-js', get_template_directory_uri()."/assets/js/bootstrap.min.js",
     array('jquery', 'popper-js'), false, '1.0',true);
    wp_register_script('my-custom-script', get_template_directory_uri()."/assets/js/custom.js",
    array('jquery', 'bootstrap-js', 'popper-js'), false, '1.0',true);

   if(is_rtl()) {
    wp_deregister_style('bootstrap-ltr');
    wp_enqueue_style('bootstrap-rtl');
   }
   else {
    wp_deregister_style('bootstrap-rtl');
    wp_enqueue_style('bootstrap-ltr');
   }

   wp_enqueue_script("my-custom-script");
   wp_enqueue_script("bootstrap-js");
   wp_enqueue_style('my-style-css');
}

add_action('wp_enqueue_scripts', 'enqueueScriptStyles');

function addMetaData() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
}
add_action('wp_head', 'addMetaData');
// register_nav_menus($location);
// function my_function() {
//     echo "<h1>I am custom hook";
// }
// add_action( 'my_custom_hook', 'my_function', 10 );
?> 