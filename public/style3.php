<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style3($styleid, $userdata, $styledata, $listdata) {
    wp_enqueue_style('' . $styledata[135] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[135] . '');
    wp_enqueue_style('' . $styledata[155] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[155] . '');
    wp_enqueue_style('' . $styledata[185] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[185] . '');
    ?>
    <div class="orphita-testimonials-wrapper">
        <?php
     
        if ($styledata[1] == 'yes') {
            orphita_testimonial_or_reviews_shortcode_carousel($styleid, $styledata, $styledata[83]);
            echo '<div class="orphita-testimonial-carousel-' . $styleid . '">';
            $carouseldivclose = '</div>';
        } else {
            $carouseldivclose = '';
        }
        ?>

        <?php
        foreach ($listdata as $value) {
            $editdata = explode('{#}|{#}', $value['files']);
            echo ' <div class="' . $styledata[83] . ' orphita-testimonials-' . $styleid . '-padding orphita-animation" orphita-animation="' . $styledata[103] . '">
                    <div class="orphita-testimonials-item-' . $styleid . '">
                        <div class="orphita-testimonials-style-' . $styleid . '  ' . $styledata[175] . '">
                            <div class="orphita-testimonials-style-' . $styleid . '-image">
                                 <img src="' . $editdata[11] . '">
                            </div>
                            <div class="orphita-testimonials-style-' . $styleid . '-info">
                                 ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                            </div>
                             <div class="orphita-testimonials-style-' . $styleid . '-rating">
                                    ' . orphita_testimonial_or_reviews_shortcode_rating($editdata[5]) . '
                                </div>
                                <div class="orphita-testimonials-style-' . $styleid . '-name">
                                     ' . orphita_testimonial_or_reviews_special_charecter($editdata[3]) . '
                                </div>
                            <div class="orphita-testimonials-style-' . $styleid . '-working">
                                ' . orphita_testimonial_or_reviews_special_charecter($editdata[13]) . ' at <a href="#">Theme Forest</a>
                            </div>
                        </div>
                    </div>';
            if ($userdata == 'admin') {
                echo '<div class="orphita-admin-absulote">
                            <div class="orphita-style-absulate-edit">
                                <form method="post"> 
                                    <input type="hidden" name="item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="edit" title="Edit">Edit</button>
                                    ' . wp_nonce_field("orphita_testimonial_or_reviews_edit_data") . '
                                </form>
                            </div>
                            <div class="orphita-style-absulate-delete">
                                <form method="post">
                                    <input type="hidden" name="item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger" type="submit" value="delete" name="delete" title="Delete">Delete</button>
                                    ' . wp_nonce_field("orphita_testimonial_or_reviews_delete_data") . '
                                </form>
                            </div>
                        </div>';
            }
            echo '</div>';
        }
        echo $carouseldivclose;
        echo '<style>
            .orphita-testimonials-' . $styleid . '-padding{
                 padding: ' . $styledata[93] . 'px ' . $styledata[95] . 'px;
                -webkit-animation-duration: ' . $styledata[105] . 's;
                -moz-animation-duration: ' . $styledata[105] . 's;
                -ms-animation-duration: ' . $styledata[105] . 's;
                -o-animation-duration: ' . $styledata[105] . 's;
                animation-duration: ' . $styledata[105] . 's;
            }
            .orphita-testimonials-item-' . $styleid . '{
                position: relative;
                 max-width: ' . $styledata[85] . 'px;
                width: 100%;
                margin: 0 auto;
            }
            .orphita-testimonials-style-' . $styleid . '{
                width: 100%;
                position: relative;
                float: left;
                text-align: left;
                background-color: ' . $styledata[87] . ';
                padding: ' . $styledata[89] . 'px ' . $styledata[91] . 'px;
                -webkit-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -moz-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -ms-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -o-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -webkit-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -moz-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -ms-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -o-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-image{
                width: ' . $styledata[117] . 'px;
                position: absolute;
                top: 0;
                right: ' . $styledata[93] . 'px;
                margin-top: -' . $styledata[117] / 2 . 'px;
                vertical-align: middle;               
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-image{
                right: auto;
                left: ' . $styledata[93] . 'px;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-image{
                right: auto;
                -webkit-transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                -o-transform: translateX(-50%);
                transform: translateX(-50%);
                left: 50%;
            }
            .orphita-testimonials-style-' . $styleid . '-image:after{
                padding-bottom:' . $styledata[119] . 'px;
                content: "";
                display: block;
            }
            .orphita-testimonials-style-' . $styleid . '-image img{              
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%; 
                display: block;
                -webkit-border-radius: ' . $styledata[129] . 'px;
                -moz-border-radius: ' . $styledata[129] . 'px;
                -ms-border-radius: ' . $styledata[129] . 'px;
                -o-border-radius: ' . $styledata[129] . 'px;
                border-radius: ' . $styledata[129] . 'px;
                border: ' . $styledata[125] . 'px solid ' . $styledata[127] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-info{               
                width: 100%;
                float: left;                
                font-size: ' . $styledata[131] . 'px;
                color: ' . $styledata[133] . ';
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';
                text-align: left;
                line-height: 130%;
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';
                padding-top: ' . $styledata[117] / 2 . 'px;
                margin-top: ' . $styledata[141] . 'px;
                margin-bottom: ' . $styledata[143] . 'px;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }            
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info{
                text-align: center;
            }
            .orphita-testimonials-style-' . $styleid . '-rating{
                width: 100%;
                float: left; 
                text-align: left;
                padding-top: ' . $styledata[171] . 'px;
                padding-bottom: ' . $styledata[173] . 'px;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-rating{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-rating{
                text-align: center;
            }
            .orphita-testimonials-style-' . $styleid . '-rating .fa{
                font-size: ' . $styledata[167] . 'px;
                color:  ' . $styledata[169] . ';
                padding: 0 2px;
            }
            .orphita-testimonials-style-' . $styleid . '-name{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[147] . ';
                font-size: ' . $styledata[145] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[155]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[159] . ';
                padding-top: ' . $styledata[161] . 'px;
                padding-bottom:  ' . $styledata[163] . 'px;                
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-name{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-name{
                text-align: center;
            }
            .orphita-testimonials-style-' . $styleid . '-working{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[179] . ';
                font-size: ' . $styledata[177] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[185]) . ';
                font-style: ' . $styledata[187] . ';
                font-weight: ' . $styledata[189] . ';
                padding-top: ' . $styledata[191] . 'px;
                padding-bottom:  ' . $styledata[193] . 'px;               
            }
            .orphita-testimonials-style-' . $styleid . '-working a{
                color: ' . $styledata[181] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-working a:hover,
            .orphita-testimonials-style-' . $styleid . '-working a:active,
            .orphita-testimonials-style-' . $styleid . '-working a:focus,{
                color: ' . $styledata[183] . ';
               text-decoration: none;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-working{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-working{
                text-align: center;
            }
             ' . $styledata[195] . '
        </style>
        <script>
                function oxiequalHeight(group) {
                   tallest = 0;
                   group.each(function() {
                      thisHeight = jQuery(this).height();
                      if(thisHeight > tallest) {
                         tallest = thisHeight;
                      }
                   });
                   group.height(tallest);
                }
                jQuery(document).ready(function() {
                   oxiequalHeight(jQuery(".orphita-testimonials-style-' . $styleid . '-info"));
                });
                </script>';
        ?>

    </div>  
    <?php
}
