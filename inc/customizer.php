<?php

function registerCustomizer($wp_customize) {
$wp_customize->add_panel('pwspk_custom_panel', array(
    'title'=> 'Custom Theme Panel',
    'description'=> 'This is customizer for theme',
    'priority'=> 20,
));
$wp_customize->add_section('custom_section', array(
    'title'=> 'Colors and Background',
    'description'=> 'Change color and background',
    'priority'=> 10,
    'panel' => 'pwspk_custom_panel'
));
$wp_customize->add_setting('custom_setting', array(
    'default'=> '#000',
    'transport' => 'refresh'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link-color',
array(
        'label'      => __( 'Header Color', 'techBlog' ),
		'section'    => 'custom_section',
		'settings'   => 'custom_setting',
)));

$wp_customize->add_section('custom_footer_section', array(
    'title'=> 'Change Footer Section',
    'description'=> 'Change settings for footer',
    'priority'=> 20,
    'panel' => 'pwspk_custom_panel'
));
//footer section settings, controls
$wp_customize->add_setting('footer_copyrights', array(
    'default'=> '©2024 Blog. All rights reserved',
    'transport' => 'refresh'
));
$wp_customize->add_control('copyright_control',
array(
        'title'      => 'Add copyright info',
		'type'    => 'text',
		'input_attr'   => [
            'class' => 'form-control',
        ],
        'section' => 'custom_footer_section',
        'settings' => 'footer_copyrights'
));
}
add_action('customize_register', 'registerCustomizer', 10,1);
?>