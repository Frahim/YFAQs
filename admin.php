<?php
// Settings Page: Yfaqs
// Retrieving values: get_option( 'your_field_id' )

add_action('admin_menu', 'add_yfaqs_cpt_submenu');
add_action( 'admin_init', 'yfaqs_settings_init' );

//admin_menu callback function

function add_yfaqs_cpt_submenu() {

    add_submenu_page(
            'edit.php?post_type=yfaq', //$parent_slug
            'YFAQS Otion', //$page_title
            'Settings', //$menu_title
            'manage_options', //$capability
            'yfaqs' //$menu_slug
            
    );
}

//add_submenu_page callback function

function yfaqs_settings_init() {

?>
<h1>tr fdsg ssg</h1>
<?php } ?>