<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style15($styleid, $userdata, $styledata, $listdata) {
    wp_enqueue_style('' . $styledata[135] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[135] . '');
    wp_enqueue_style('' . $styledata[155] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[155] . '');
    wp_enqueue_style('' . $styledata[177] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[177] . '');
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
        foreach ($listdata as $value) {
            $editdata = explode('{#}|{#}', $value['files']);

            echo '   <div class="' . $styledata[83] . ' orphita-testimonials-' . $styleid . '-padding orphita-animation" orphita-animation="' . $styledata[103] . '">
                        <div class="orphita-testimonials-item-' . $styleid . '">
                            <div class="orphita-testimonials-style-' . $styleid . ' ' . $styledata[149] . '"> 
                                <div class="orphita-testimonials-style-' . $styleid . '-info">
                                    ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                                    <div class="oxi-before"> 
                                        <i class="fa ' . $editdata[11] . '"></i>
                                        <div class="oxi-before-before"></div>
                                    </div>
                                    <div class="oxi-after"> </div>
                                </div> 
                                <div class="orphita-testimonials-style-' . $styleid . '-name-body">    
                                    <a href="' . $editdata[9] . '" target="' . $styledata[97] . '">
                                        <div class="orphita-testimonials-style-' . $styleid . '-name">
                                           ' . orphita_testimonial_or_reviews_special_charecter($editdata[3]) . '
                                        </div>
                                    </a>
                                    <div class="orphita-testimonials-style-' . $styleid . '-working">
                                       ' . orphita_testimonial_or_reviews_special_charecter($editdata[5]) . '
                                    </div>
                                </div>                               
                            </div>
                    </div>';
            if ($userdata == 'admin') {
                ?>
                <div class="orphita-admin-absulote">
                    <div class="orphita-style-absulate-edit">
                        <form method="post"> 
                            <input type="hidden" name="item-id" value="<?php echo $value['id']; ?>">
                            <button class="btn btn-primary" type="submit" value="edit" name="edit" title="Edit">Edit</button>
                            <?php echo wp_nonce_field("orphita_testimonial_or_reviews_edit_data"); ?>
                        </form>
                    </div>
                    <div class="orphita-style-absulate-delete">
                        <form method="post">
                            <input type="hidden" name="item-id" value="<?php echo $value['id']; ?>">
                            <button class="btn btn-danger" type="submit" value="delete" name="delete" title="Delete">Delete</button>
                            <?php echo wp_nonce_field("orphita_testimonial_or_reviews_delete_data"); ?>
                        </form>
                    </div>
                </div>
                <?php
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
            }
            .orphita-testimonials-style-' . $styleid . '-info{
                padding: ' . $styledata[167] . 'px ' . $styledata[189] . 'px ' . $styledata[169] . 'px ' . $styledata[187] . 'px; /* ekhane padding left hobe padding left + oxi-before width - oxi-before left size */
                width: 100%;
                float: left;  
                font-size: ' . $styledata[131] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';   
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';
                color: ' . $styledata[133] . ';
                background-color:  ' . $styledata[87] . ';
                position: relative;                
                text-align: left;
                -webkit-box-shadow:' . $styledata[197] . 'px ' . $styledata[199] . 'px ' . $styledata[201] . 'px ' . $styledata[203] . 'px ' . $styledata[195] . ';
                -moz-box-shadow: ' . $styledata[197] . 'px ' . $styledata[199] . 'px ' . $styledata[201] . 'px ' . $styledata[203] . 'px ' . $styledata[195] . ';
                -ms-box-shadow:' . $styledata[197] . 'px ' . $styledata[199] . 'px ' . $styledata[201] . 'px ' . $styledata[203] . 'px ' . $styledata[195] . ';
                -o-box-shadow: ' . $styledata[197] . 'px ' . $styledata[199] . 'px ' . $styledata[201] . 'px ' . $styledata[203] . 'px ' . $styledata[195] . ';
                box-shadow: ' . $styledata[197] . 'px ' . $styledata[199] . 'px ' . $styledata[201] . 'px ' . $styledata[203] . 'px ' . $styledata[195] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-info .oxi-before{
                position: absolute;
                left: -' . $styledata[115] . 'px; 
                width: ' . $styledata[117] . 'px;
                height: ' . $styledata[117] . 'px;
                line-height: ' . $styledata[117] . 'px;
                text-align: center;
                background-color:  ' . $styledata[119] . ';
                top: 50%;
                -webkit-transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                -o-transform: translateX(-50%);
                transform: translateY(-50%);
            }
            .orphita-testimonials-style-' . $styleid . '-info .oxi-before .oxi-before-before{
                position: absolute;
                left: 0;
                top:-' . $styledata[115] . 'px;
                width: 0;
                height: 0;
                border-bottom: ' . $styledata[115] . 'px solid ' . $styledata[113] . ';
                border-left: ' . $styledata[115] . 'px solid transparent;
            }
            .orphita-testimonials-style-' . $styleid . '-info .oxi-before .fa{
                color:  ' . $styledata[121] . ';
                font-size: ' . $styledata[123] . 'px;
            }
            .orphita-testimonials-style-' . $styleid . '-info .oxi-after{
                position: absolute;
                left: ' . ($styledata[187] + $styledata[117] - $styledata[115]) . 'px; /* ekhane padding left hobe padding left + oxi-before width - oxi-before left size */
                bottom: -' . $styledata[191] . 'px; /* ekhane info r left padding asbe */
                width: 0;
                height: 0;
                border-left: ' . $styledata[191] . 'px solid transparent;
                border-right: ' . $styledata[191] . 'px solid transparent;
                border-top: ' . $styledata[191] . 'px solid ' . $styledata[193] . ';

            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info .oxi-after{
                left: 50%;
                -webkit-transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                -o-transform: translateX(-50%);
                transform: translateX(-50%);
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info .oxi-after{
                left: auto;
                right: ' . $styledata[189] . 'px; /* ekhane padding right asbe */
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info{
                text-align: center;
            }  
           
            .orphita-testimonials-style-' . $styleid . '-name-body{                
                float: left;    
                width: 100%;
                padding: 0 ' . $styledata[89] . 'px;                
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-name-body{               
                text-align: center;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-name-body{              
                text-align: right;
            }            
            .orphita-testimonials-style-1-name, a .orphita-testimonials-style-' . $styleid . '-name{
                width: 100%;
                float: left; 
                color: ' . $styledata[147] . ';
                font-size: ' . $styledata[145] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[155]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[159] . ';     
                padding-top: ' . $styledata[161] . 'px;
                padding-bottom: ' . $styledata[163] . 'px;               
            }
            .orphita-testimonials-style-' . $styleid . '-name:hover, a .orphita-testimonials-style-' . $styleid . '-name:hover{
                color: ' . $styledata[151] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-working{
                width: 100%;
                float: left; 
                color: ' . $styledata[173] . ';
                font-size: ' . $styledata[171] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[177]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[181] . ';           
                padding-top: ' . $styledata[183] . 'px;
                padding-bottom: ' . $styledata[185] . 'px;                 
            }
            ' . $styledata[205] . '
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
