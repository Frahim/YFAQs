<?php
/**
 * @wordpress-plugin
 * Plugin Name:       YFAQ
 * Plugin URI:        https://github.com/Frahim/YFAQ
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Md Yeasir Arafat
 * Author URI:        https://yeasir.adaptstoday.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yfaq
 * Domain Path:       /languages
 */
/**
 *
 * Enable Localization
 *
 */
load_plugin_textdomain('yfaqs', false, basename(dirname(__FILE__)) . '/lang');
/**
 *
 * Add admin settings
 *
 */
define('yfaqs_OPTIONS_FRAMEWORK_DIRECTORY', plugins_url('/inc/', __FILE__));
define('yfaqs_OPTIONS_FRAMEWORK_PATH', dirname(__FILE__) . '/inc/');
require_once dirname(__FILE__) . '/inc/options-framework.php';

/**
 * Activate the plugin.
 */
function yfaqs_activate() {
    // Trigger our function that registers the custom post type plugin.
   // yfaqs_setup_post_type('yfaq', ['public' => true]);
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'yfaqs_activate');

/**
 * Deactivation hook.
 */
function yfaqs_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type('yfaq');
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'yfaqs_deactivate');

//registering javascript and css

function yfaqs_script_style() {
    //wp_enqueue_script
    wp_register_script('yfaqsjs', plugins_url('js/yfaqs.js', __FILE__));
    wp_enqueue_script('yfaqsjs', plugin_dir_url( __DIR__ ). 'js/yfaq-admin.js', array('jquery'), rand(), true);

    //wp_enqueue_style
    wp_register_style('yfaqscss', plugins_url('css/yfaqs_style.css', __FILE__));
    wp_enqueue_style('yfaqscss');
    wp_enqueue_style('icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'yfaqs_script_style');

/**
 * Post type
 * 
 */
require dirname(__FILE__) . '/inc/posttype.php';

/**
 * Options
 * 
 */
require dirname(__FILE__) . '/inc/yfaq_options.php';

/**
 * The Shortcode link
 * 
 */
require dirname(__FILE__) . '/inc/shortcode.php';
