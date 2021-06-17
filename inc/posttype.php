<?php
/**
 * Register the "FAQ" custom post type
 */
function yfaq_setup_post_types() {

    $faq_labels = apply_filters('yfaq_labels', array(
        'name' => 'FAQs',
        'singular_name' => 'FAQ',
        'add_new' => __('Add New', 'rc_faq'),
        'add_new_item' => __('Add New FAQ', 'rc_faq'),
        'edit_item' => __('Edit FAQ', 'rc_faq'),
        'new_item' => __('New FAQ', 'rc_faq'),
        'all_items' => __('All FAQs', 'rc_faq'),
        'view_item' => __('View FAQ', 'rc_faq'),
        'search_items' => __('Search FAQs', 'rc_faq'),
        'not_found' => __('No FAQs found', 'rc_faq'),
        'not_found_in_trash' => __('No FAQs found in Trash', 'rc_faq'),
        'parent_item_colon' => '',
        'menu_name' => __('FAQs', 'rc_faq'),
        'exclude_from_search' => true
    ));


    $faq_args = array(
        'labels' => $faq_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => apply_filters('yfaq_supports', array('title', 'editor')),
    );
    register_post_type('yfaq', apply_filters('yfaq_post_type_args', $faq_args));
}

add_action('init', 'yfaq_setup_post_types');