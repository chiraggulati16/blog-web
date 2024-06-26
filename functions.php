<?php
include get_template_directory()."/inc/customizer.php";
include get_template_directory()."/inc/theme_options.php";

function setupTheme() {
add_theme_support('post-thumbnails');
add_theme_support('html5',array(
    'search-form',
    'comment-form',
    'gallery',
    'caption'
));

function customCommentForm($fields) {
    $req   = get_option( 'require_name_email' );
    $html5 = true;
    $required_indicator = ' ' . wp_required_field_indicator();
	$required_text      = ' ' . wp_required_field_message();
    $commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
    $required_attribute = ( $html5 ? ' required' : ' required="required"' );
	$checked_attribute  = ( $html5 ? ' checked' : ' checked="checked"' );

    $fields = array(
		'author' => sprintf(
			'<p class="comment-form-author">%s %s</p>',
			sprintf(
				'<label for="author">%s%s</label>',
				__( 'Name' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<input id="author" name="author" class="form-control" type="text" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
				esc_attr( $commenter['comment_author'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'email'  => sprintf(
			'<p class="comment-form-email">%s %s</p>',
			sprintf(
				'<label for="email">%s%s</label>',
				__( 'Email' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<input id="email" class="form-control" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
				( $html5 ? 'type="email"' : 'type="text"' ),
				esc_attr( $commenter['comment_author_email'] ),
				( $req ? $required_attribute : '' )
			)
		),
	);

      return $fields;
}

function customDefaultFields($defaults) {

    $defaults['comment_field'] = sprintf(
        '<p class="comment-form-comment">%s %s</p>',
        sprintf(
            '<label for="comment">%s%s</label>',
            _x( 'Comment', 'noun' ),
            true
        ),
        '<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525"' . true . '></textarea>'
    );

    return $defaults;
}

add_filter( 'comment_form_default_fields', 'customCommentForm');
add_filter( 'comment_form_defaults', 'customDefaultFields');
} 
add_action('after_setup_theme','setupTheme');
register_sidebar(array(
    'name' => __('Wp Blog Sidebar', 'wpBlogSample'),
    'id'   => 'wp-blog-1',
    'description' => 'This is default sidebar',
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget mt-4 mb-3 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h5 class="widgettitle">',
    'after_title' => '</h5>'
));

// $location = array(
//     'menu-1' => 'Navigation Menu One',
//     'menu-2' => 'Navigation Menu Two',
// );

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
function paginationButton() {
    return "class='btn btn-outline-primary'";
}
add_filter('next_posts_link_attributes', 'paginationButton');
add_filter('previous_posts_link_attributes', 'paginationButton');
// register_nav_menus($location);
// function my_function() {
//     echo "<h1>I am custom hook";
// }
// add_action( 'my_custom_hook', 'my_function', 10 );
?> 