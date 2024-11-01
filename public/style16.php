<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style16($styleid, $userdata, $styledata, $listdata) {
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

            echo '  <div class="' . $styledata[83] . ' orphita-testimonials-' . $styleid . '-padding orphita-animation" orphita-animation="' . $styledata[103] . '">
                        <div class="orphita-testimonials-item-' . $styleid . '">
                            <div class="orphita-testimonials-style-' . $styleid . ' ' . $styledata[149] . '">                                  
                                <div class="orphita-testimonials-style-' . $styleid . '-image-parent">
                                    <div class="orphita-testimonials-style-' . $styleid . '-image">
                                        <img src="' . $editdata[11] . '">
                                    </div>
                                </div>
                                <div class="orphita-testimonials-style-' . $styleid . '-name-body-parent">
                                    <div class="orphita-testimonials-style-' . $styleid . '-info">
                                        ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                                        <div class="oxi-before"> </div>
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
                                <div class="orphita-before">
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
                position: relative;
                float: left; 
                display: flex;
                align-items: ' . $styledata[125] . ';
                background-color:  ' . $styledata[87] . ';
                border-left: ' . $styledata[113] . 'px solid ' . $styledata[115] . ';
                -webkit-box-shadow:' . $styledata[189] . 'px ' . $styledata[191] . 'px ' . $styledata[193] . 'px ' . $styledata[195] . 'px ' . $styledata[187] . ';
                -moz-box-shadow: ' . $styledata[189] . 'px ' . $styledata[191] . 'px ' . $styledata[193] . 'px ' . $styledata[195] . 'px ' . $styledata[187] . ';
                -ms-box-shadow:' . $styledata[189] . 'px ' . $styledata[191] . 'px ' . $styledata[193] . 'px ' . $styledata[195] . 'px ' . $styledata[187] . ';
                -o-box-shadow: ' . $styledata[189] . 'px ' . $styledata[191] . 'px ' . $styledata[193] . 'px ' . $styledata[195] . 'px ' . $styledata[187] . ';
                box-shadow: ' . $styledata[189] . 'px ' . $styledata[191] . 'px ' . $styledata[193] . 'px ' . $styledata[195] . 'px ' . $styledata[187] . ';
                }
            .orphita-testimonials-style-' . $styleid . ':hover{
                border-left: ' . $styledata[113] . 'px solid  ' . $styledata[111] . ';
            }
            .orphita-testimonials-style-' . $styleid . ' .orphita-before{
                position: absolute;
                right: 0;
                bottom: 0;
                width: 0;
                height: 0;
                border-bottom: ' . $styledata[109] . 'px solid ' . $styledata[115] . ';
                border-left: ' . $styledata[109] . 'px solid transparent;
            }
            .orphita-testimonials-style-' . $styleid . ':hover .orphita-before{
                border-bottom: ' . $styledata[109] . 'px solid ' . $styledata[111] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-image-parent{
                max-width: ' . ($styledata[117] + $styledata[121] * 2) . 'px; /*ekhane image size + padding left right asbe */
                width: 100%;
                float: left;  
                padding: ' . ($styledata[123] . 'px ' . $styledata[121]) . 'px;
                text-align: left;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-image-parent{
                max-width: ' . ($styledata[117] + $styledata[121] * 2) . 'px; /*ekhane image size + padding left right asbe */
                width: 100%;
                margin-left: auto;
                order: 2;
            }
            .orphita-testimonials-style-' . $styleid . '-image{
                max-width: ' . $styledata[117] . 'px;                
                position: relative;
                display: inline-block;
                width: 100%;
                -webkit-border-radius: ' . $styledata[129] . 'px;
                -moz-border-radius: ' . $styledata[129] . 'px;
                -ms-border-radius: ' . $styledata[129] . 'px;
                -o-border-radius: ' . $styledata[129] . 'px;
                border-radius: ' . $styledata[129] . 'px;
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
            .orphita-testimonials-style-' . $styleid . '-name-body-parent{
                width: calc(100% - ' . ($styledata[117] + $styledata[121] * 2) . 'px); /* ekhane 90px hocce image parrent width*/ 
                float: left; 
                padding: ' . $styledata[89] . 'px ' . $styledata[91] . 'px;
            }
            .orphita-testimonials-style-' . $styleid . '-info{
                padding: ' . $styledata[167] . 'px 0 ' . $styledata[169] . 'px 0;
                width: 100%;
                float: left;  
                font-size: ' . $styledata[131] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';   
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';
                color: ' . $styledata[133] . ';
                position: relative;                
                text-align: left;
            }           
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }          
            .orphita-testimonials-style-' . $styleid . '-name-body{                
                float: left;    
                width: 100%;            
            }

            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-name-body{
                width: 100%;
                float: left;  
                text-align: right;
            }            
            .orphita-testimonials-style-' . $styleid . '-name, a .orphita-testimonials-style-' . $styleid . '-name{
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
            ' . $styledata[197] . '
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
