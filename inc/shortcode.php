<?php
// All Shortcode
function yfaqs_shortcode() {
    ob_start();
    // Create the Query
    $args = array(
        'post_type' => 'yfaq',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    $wp_query = new WP_Query($args);
    if ($wp_query->have_posts()) : while (have_posts()) : the_post();
            ?>

            <div class="faq-single">
                <div class="collapsible faq-title" id="section<?php echo $i; ?> "><span class="faqicon"></span><div class="quize-titl"><?php the_title(); ?></div><span class="faqarrow"></span></div>
                <div class='answer' id="ans<?php echo $i; ?>"><div class="quize-titl"><?php the_content(); ?></div></div>
            </div>

            <?php
            $i++;
        endwhile;

    endif;

    // Reset query to prevent conflicts
    wp_reset_query();

    $output = ob_get_clean();
    return $output;
}

add_shortcode('FAQ', 'yfaqs_shortcode');