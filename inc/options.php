<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function yfaqs_optionsframework_option_name(){
    $yfaqs_optionsframework_settings = get_option('yfaqs_optionsframework');
    $yfaqs_optionsframework_settings['id'] = 'yfaqsall_options';
    update_option('yfaqs_optionsframework', $yfaqs_optionsframework_settings);
}

add_action('yfaqs_optionsframework_after', 'yfaqs_support_link');

function yfaqs_support_link(){};

add_filter('yfaqs_optionsframework_menu', 'yfaqs_options_menu');
function yfaqs_options_menu($menu) {
    $menu['page_title'] = 'Welcome to YFAQs';
    $menu['menu_title'] = 'YFAQS Seting';
    $menu['mode'] = 'menu';
    $menu['menu_slug'] = 'yfaqs';
    $menu['position'] = '30';
    return $menu;
}
$options = get_option('yfaqsall_options');

function yfaqs_optionsframework_options(){
    $options = array();
    $options[] = array('name' => __('General Settings', 'yfaqs'),
        'type' => 'heading');
    $options[] = array('name' => __('Font Color ', 'yfaqs'),
        'desc' => __('Font Color', 'yfaqs'),
        'id' => 'titlecol',
        'std' => '#000000',
        'type' => 'color');
    $options[] = array('name' => __('Icon Color ', 'yfaqs'),
        'desc' => __('Close Icon Color', 'yfaqs'),
        'id' => 'iconcolor',
        'std' => '#000000',
        'type' => 'color');

    $options[] = array('name' => __('Quize Titl/Close BG ', 'yfaqs'),
        'desc' => __('Background Color for Quize Titl when Close', 'yfaqs'),
        'id' => 'quesbg',
        'std' => '#fff',
        'type' => 'color');

    $options[] = array('name' => __('Quize Titl/Open BG ', 'yfaqs'),
        'desc' => __('Background Color for Quize Titl when Open', 'yfaqs'),
        'id' => 'qtopenbg',
        'std' => '#fff',
        'type' => 'color');

    $options[] = array('name' => __('Answer BG Color ', 'yfaqs'),
        'desc' => __('Quize Answer BG Color', 'yfaqs'),
        'id' => 'answercol',
        'std' => '#fff',
        'type' => 'color');

    $options[] = array('name' => __('Select Icon', 'yfaqs'),
        'desc' => __(' Select the Icon For FAQ .', 'yfaqs'),
        'id' => 'icon_select',
        'options' => array('angle-up-down' => 'Angle UP/Down', 'angle-double-up' => 'Angle Double', 'eye' => 'Eye'),
        'type' => 'select');

    $options[] = array('name' => __('Shortcode', 'yfaqs'),
        'type' => 'heading');

    $options[] = array('name' => __('[FAQ]', 'yfaqs'),
        'desc' => __('Use this Shortcode in Post, Page or widgets ', 'yfaqs'),
        'id' => 'scode');

    $options[] = array('name' => __('<?php echo do_shortcode ("[FAQ]")?>', 'yfaqs'),
        'desc' => __('Use this Shortcode in template ', 'yfaqs'),
        'id' => 'scode');
    return $options;
}
