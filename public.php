<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function($styleid, $userdata) {
    $styleid = (int) $styleid;
    global $wpdb;
    $table_name = $wpdb->prefix . 'oxi_div_style';
    $table_list = $wpdb->prefix . 'oxi_div_list';
    $oxitype = 'testimonial';
    $listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id ASC ", $styleid), ARRAY_A);
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $styleid), ARRAY_A);
    $stylename = $styledata['style_name'];
    $styledata = $styledata['css'];
    $styledata = explode('|', $styledata);
    include_once orphita_testimonial_or_reviews_url . 'public/' . $stylename . '.php';
    wp_enqueue_style('font-awesome', plugins_url('helper/font-awesome.min.css', __FILE__));
    wp_enqueue_script('animation-js', plugins_url('public/animation.js', __FILE__));
    wp_enqueue_style('animation', plugins_url('public/animation.css', __FILE__));
    wp_enqueue_style('orphita-testimonial-or-reviews', plugins_url('public/style.css', __FILE__));
    $stylefunctionmane = 'orphita_testimonial_or_reviews_shortcode_function_' . $stylename . '';
    $stylefunctionmane($styleid, $userdata, $styledata, $listdata);
}

function orphita_testimonial_or_reviews_shortcode_carousel($styleid, $styledata, $itemrow) {
    wp_enqueue_script('oxilab-carousel', plugins_url('public/owl.carousel.min.js', __FILE__));
    $nevextradata = explode(' ', $styledata[11]);

    if ($itemrow == 'orphita-testimonial-or-reviews-col-1') {
        $responsive = ' responsive: { 0: {items: 1 }, 600: { items: 1}, 1000: { items: 1 }}';
    } elseif ($itemrow == 'orphita-testimonial-or-reviews-col-2') {
        $responsive = ' responsive: { 0: {items: 1 }, 600: { items: 1}, 1000: { items: 2 }}';
    } elseif ($itemrow == 'orphita-testimonial-or-reviews-col-3') {
        $responsive = ' responsive: { 0: {items: 1 }, 600: { items: 2}, 1000: { items: 3 }}';
    } elseif ($itemrow == 'orphita-testimonial-or-reviews-col-4') {
        $responsive = ' responsive: { 0: {items: 1 }, 600: { items: 2}, 1000: { items: 4 }}';
    } elseif ($itemrow == 'orphita-testimonial-or-reviews-col-5') {
        $responsive = ' responsive: { 0: {items: 1 }, 600: { items: 2}, 1000: { items: 5 }}';
    } elseif ($itemrow == 'orphita-testimonial-or-reviews-col-6') {
        $responsive = ' responsive: { 0: {items: 1 }, 600: { items: 3}, 1000: { items: 6 }}';
    }
    if ($styledata[5] == 'true') {
        $autoplay = ' autoplay: true,  autoplayTimeout: ' . $styledata[7] * 1000 . ', autoplayHoverPause: true';
    } else {
        $autoplay = ' autoplay: false';
    }
    wp_add_inline_script('oxilab-carousel', 'jQuery(".orphita-testimonial-carousel-' . $styleid . '").OxiowlCarousel({
                                                            loop: true,
                                                            margin: 0,
                                                            center: ' . $styledata[3] . ',
                                                            ' . $autoplay . ',
                                                            ' . $responsive . ',
                                                            nav:' . $styledata[9] . ',
                                                            dots:' . $styledata[23] . ',
                                                            navText: ["<i class=\'fa ' . $nevextradata[0] . '\'></i>", "<i class=\'fa ' . $nevextradata[1] . '\'></i>"],
                                                        });');
    ?>  
    <style>
        .orphita-testimonial-carousel-<?php echo $styleid; ?> {
            display: none;
            width: 100%;
            -webkit-tap-highlight-color: transparent;
            /* position relative and z-index fix webkit rendering fonts issue */
            position: relative;
            z-index: 1; 
        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-stage {
            position: relative;
            -ms-touch-action: pan-Y;
            -moz-backface-visibility: hidden;
            /* fix firefox animation glitch */ }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-stage:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-stage-outer {
            position: relative;
            overflow: hidden;
            /* fix for flashing background */
            -webkit-transform: translate3d(0px, 0px, 0px); }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-wrapper,
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-item {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0); }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-item {
            position: relative;
            min-height: 1px;
            float: left;
            -webkit-backface-visibility: hidden;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none; }

        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav.disabled,
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dots.disabled {
            display: none; }
        <?php
        if ($styledata[23] == 'true') {
            echo '.orphita-testimonial-carousel-' . $styleid . ' .owl-dots.disabled {
            display: block; }';
        }
        if ($styledata[9] == 'true') {
            echo '.orphita-testimonial-carousel-' . $styleid . ' .owl-nav.disabled {
            display: block; }';
        }
        ?>
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav .owl-prev,
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav .owl-next,
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dot {
            cursor: pointer;
            cursor: hand;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?>.owl-loaded {
            display: block; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?>.owl-loading {
            opacity: 0;
            display: block; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?>.owl-hidden {
            opacity: 0; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?>.owl-refresh .owl-item {
            visibility: hidden; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?>.owl-drag .owl-item {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none; }


        /* No Js */
        .no-js .orphita-testimonial-carousel-<?php echo $styleid; ?> {
            display: block; }


        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav {
            transform: translateY(-50%);
            top: 50%;
            opacity:0;
            width:100%;
            text-align: center;
            position: absolute;
            -webkit-tap-highlight-color: transparent;
        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?><?php echo $styledata[21]; ?> .owl-nav{
            opacity:1;
        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav [class*='owl-'] {
            color:  <?php echo $styledata[15]; ?>;
            float:left;
            font-size:  <?php echo $styledata[13]; ?>px;
            margin: 0px;
            padding: 0px 0px;
            line-height:100%;            
            margin-top: -<?php echo $styledata[13] / 2; ?>px;
            position: absolute;
            display: inline-block;
            cursor: pointer;
            transition: all 20ms ease;
            border-radius: 3px;         
            left: <?php echo $styledata[19]; ?>px;

        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav .owl-next{
            right: <?php echo $styledata[19]; ?>px;
            left: auto;
        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav [class*='owl-']:hover {           
            color:  <?php echo $styledata[17]; ?>;
            text-decoration: none; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav .disabled {
            opacity: 0.5;
            cursor: default; }

        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-nav.disabled + .owl-dots {
            margin-top: 0;
        }

        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dots {
            <?php
            $posdata = explode(' ', $styledata[25]);
            echo 'text-align: ' . $posdata[1] . ';';
            echo $posdata[0] . ':0;';
            ?>
            position: absolute;
            width:100%;
            -webkit-tap-highlight-color: transparent; 
        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dots .owl-dot {
            display: inline-block;
            zoom: 1;
            *display: inline;
        }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dots .owl-dot span {
            width: <?php echo $styledata[31]; ?>px;
            height: <?php echo $styledata[33]; ?>px;          
            background: <?php echo $styledata[27]; ?>;
            margin: 0px <?php echo $styledata[39]; ?>px;
            display: block;
            -webkit-backface-visibility: visible;
            transition: all 300ms ease;
            border-radius: <?php echo $styledata[41]; ?>px; }
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dots .owl-dot.active span,
        .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-dots .owl-dot:hover span {
            background: <?php echo $styledata[29]; ?>;
            -ms-transform: scale(<?php echo $styledata[35]; ?>);
            -webkit-transform: scale(<?php echo $styledata[35]; ?>);
            transform: scale(<?php echo $styledata[35]; ?>);
        }
    <?php if ($styledata[23] == 'true') { ?>
            .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-stage-outer{
                padding-<?php echo $posdata[0]; ?>: <?php echo $styledata[37]; ?>px;  
            }
        <?php } ?>


    <?php if ($styledata[3] == 'true') { ?>
            .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-item{
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
                opacity: 0.7;
            }
            .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-item{
                opacity: 0.7;
                transition: all 300ms ease;                
            }
            .orphita-testimonial-carousel-<?php echo $styleid; ?> .owl-item.active.center{
                opacity: 1;
                -ms-transform: scale(1);
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
            }
    <?php } ?>

    </style>
    <?php
}

function orphita_testimonial_or_reviews_shortcode_rating($data) {
    if ($data > 4.75) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    } elseif ($data <= 4.75 && $data > 4.25) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
    } elseif ($data <= 4.25 && $data > 3.75) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
    } elseif ($data <= 3.75 && $data > 3.25) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>';
    } elseif ($data <= 3.25 && $data > 2.75) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    } elseif ($data <= 2.75 && $data > 2.25) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    } elseif ($data <= 2.25 && $data > 1.75) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    } elseif ($data <= 1.75 && $data > 1.25) {
        return '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    } elseif ($data <= 1.25) {
        return '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
}
