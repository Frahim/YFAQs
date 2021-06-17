<?php
//All Options
add_action('wp_head', 'yfaqs_options', 100);

function yfaqs_options() {
    $options = get_option('yfaqsall_options');
    $yficon = $options['icon_select'];
    $icon_color = $options['iconcolor'];
    $qtopenbg = $options['quesbg'];
    $qtclosebg = $options['qtopenbg'];
    $answerbg = $options['answercol'];
    $fontcolor = $options['titlecol'];
    ?>
    <style>
    <?php if ($yficon == "angle-up-down") { ?>
            .collapse-open span.faqarrow:after {content: "\f106"; }
            .collapse-close span.faqarrow:after {content: "\f107"; }
    <?php } elseif ($yficon == "angle-double-up") { ?>
            .collapse-open span.faqarrow:after {content: "\f102"; } 
            .collapse-close span.faqarrow:after {content: "\f103"; }
    <?php } else { ?>
            .collapse-open span.faqarrow:after {content: "\f070"; }
            .collapse-close span.faqarrow:after {content: "\f06e"; }
    <?php } ?>
            
        .collapse-open span.faqarrow:after,.collapse-close span.faqarrow:after {color:<?php echo $icon_color; ?>; }        
        .collapse-close  .quize-titl{background: <?php echo $qtopenbg; ?>!important;}
        .faq-title .quize-titl{background:<?php echo $qtclosebg; ?>; color:<?php echo $fontcolor; ?>}
        .answer .quize-titl{color:<?php echo $fontcolor; ?>}
        .answer{background: <?php echo $answerbg; ?>}
    </style>
<?php } ?>