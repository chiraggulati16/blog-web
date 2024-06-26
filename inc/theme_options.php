<?php

function themeOptionCallback() { ?>
    <h2>General Theme Options</h2>
   <form action="options.php" method="post">
    <?php settings_fields('option_group1'); ?>
    <?php do_settings_sections('option_group1'); ?>
    <table class="form">
        <tr>
            <th>Option One</th>
            <td><input type="text" name="option1" value="<?php echo esc_attr(get_option('option 1'
        )); ?>"></td>
        </tr>
    </table>
    <?php submit_button('Save Options', 'primary', 'submit', true, null); ?>
   </form>

   <?php
}

function adminInitCallback() {
    register_setting( 'option_group1', 'option1');
}
function adminMenu() {
    add_theme_page('My Theme Options', 'My Theme Options', 'manage_options', 'custom-options',
    'themeOptionCallback');
    add_action('admin_init', 'adminInitCallback');
}
add_action('admin_menu', 'adminMenu');
?>