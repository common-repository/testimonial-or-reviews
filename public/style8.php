<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style8($styleid, $userdata, $styledata, $listdata) {
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
            echo '<div class="' . $styledata[83] . ' orphita-testimonials-' . $styleid . '-padding orphita-animation" orphita-animation="' . $styledata[103] . '">
                        <div class="orphita-testimonials-item-' . $styleid . '">
                            <div class="orphita-testimonials-style-' . $styleid . ' ' . $styledata[175] . '">
                                <div class="orphita-testimonials-style-' . $styleid . '-image">
                                    <img src="' . $editdata[11] . '">
                                </div>
                                <div class="orphita-testimonials-style-' . $styleid . '-info">
                                    ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                                </div>  
                                <div class="orphita-testimonials-style-' . $styleid . '-name-body">
                                    <div class="orphita-testimonials-style-' . $styleid . '-name-body-left">
                                        <div class="orphita-testimonials-style-' . $styleid . '-name">
                                            ' . orphita_testimonial_or_reviews_special_charecter($editdata[3]) . '
                                        </div>
                                        <div class="orphita-testimonials-style-' . $styleid . '-working">
                                            ' . orphita_testimonial_or_reviews_special_charecter($editdata[13]) . '
                                        </div>
                                    </div>
                                    <div class="orphita-testimonials-style-' . $styleid . '-name-body-right">
                                        <a href="' . $editdata[9] . '" target="' . $styledata[97] . '"><i class="fa ' . $editdata[5] . '"></i></a>  
                                    </div>
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
                float: left;
                text-align: left;
                background-color: ' . $styledata[87] . ';
                padding: ' . $styledata[89] . 'px ' . $styledata[91] . 'px;
                -webkit-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -moz-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -ms-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -o-border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                border-radius: ' . $styledata[99] . 'px ' . $styledata[101] . 'px;
                -webkit-box-shadow:' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -moz-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -ms-box-shadow:' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -o-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-image{
                max-width: ' . $styledata[117] . 'px;
                margin: 0 auto ' . $styledata[121] . 'px 0;
                position: relative;
                display: block;
                width: 100%;
                -webkit-border-radius: ' . $styledata[129] . 'px;
                -moz-border-radius: ' . $styledata[129] . 'px;
                -ms-border-radius: ' . $styledata[129] . 'px;
                -o-border-radius: ' . $styledata[129] . 'px;
                border-radius: ' . $styledata[129] . 'px;
                vertical-align: middle;
                border: ' . $styledata[125] . 'px solid ' . $styledata[127] . ';
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-image{
                margin: 0 0 ' . $styledata[121] . 'px auto;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-image{
                margin: 0 auto ' . $styledata[121] . 'px auto;
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
            }
            .orphita-testimonials-style-' . $styleid . '-info{
                padding: ' . $styledata[141] . 'px ' . $styledata[143] . 'px;
                width: 100%;
                float: left;  
                position: relative;
                font-size: ' . $styledata[131] . 'px;
                color: ' . $styledata[133] . ';
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';                
                text-align: left;
            }
            .orphita-testimonials-style-' . $styleid . '-info:before, .orphita-testimonials-style-' . $styleid . '-info:after{             
                font-size: ' . $styledata[167] . 'px;
                color:   ' . $styledata[169] . ';
                font-family: FontAwesome;
            }
            .orphita-testimonials-style-' . $styleid . '-info:before{
                position: absolute;
                top:' . $styledata[149] . 'px; 
                right: 0;
                content: "\f10e";               
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info:before,
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info:before{
                left:0;
                right:auto;
                content: "\f10d";                
            }
            .orphita-testimonials-style-' . $styleid . '-info:after{
                position: absolute;
                bottom: ' . $styledata[151] . 'px;
                left: 0;
                content: "\f10d";   
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info:after,
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info:after{
                left:auto;
                right:0;
                content: "\f10e";
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }            
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info{
                text-align: center;
            }      
            .orphita-testimonials-style-' . $styleid . '-name-body{
                width: 100%;
                float: left;  
                display: flex;
                align-items: center;
            }
            .orphita-testimonials-style-' . $styleid . '-name-body-left{
                width: calc(100% - ' . ($styledata[171] + 10) . 'px);
                float: left;
            }
            .orphita-testimonials-style-' . $styleid . '-name-body-right{
                width: ' . ($styledata[171] + 10) . 'px;
                float: left;
                text-align: center;
            }        
            .orphita-testimonials-style-' . $styleid . '-name-body-right .fa{
                color: ' . $styledata[173] . ';
                font-size: ' . $styledata[171] . 'px;
            }
            .orphita-testimonials-style-' . $styleid . '-name-body-right .fa:hover{
                color:   ' . $styledata[165] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-name{
                width: 100%;
                float: left; 
                text-align: left;
                position: relative;
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
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-working{
                text-align: right;
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
