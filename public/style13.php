<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style13($styleid, $userdata, $styledata, $listdata) {
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
                                <div class="orphita-testimonials-style-' . $styleid . '-info">
                                    ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                                </div>
                                <div class="orphita-testimonials-style-' . $styleid . '-image-body-parent">
                                    <div class="orphita-testimonials-style-' . $styleid . '-image-parent">
                                        <div class="orphita-testimonials-style-' . $styleid . '-image">
                                             <img src="' . $editdata[11] . '">
                                        </div>
                                    </div>
                                    <div class="orphita-testimonials-style-' . $styleid . '-body-parent">
                                        <a href="' . $editdata[9] . '" target="' . $styledata[97] . '">
                                            <div class="orphita-testimonials-style-' . $styleid . '-name">
                                                ' . orphita_testimonial_or_reviews_special_charecter($editdata[3]) . '
                                            </div>
                                        </a>
                                        <div class="orphita-testimonials-style-' . $styleid . '-designation">
                                           ' . orphita_testimonial_or_reviews_special_charecter($editdata[5]) . '
                                        </div>
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
                max-width: ' . $styledata[85] . 'px;
                width: 100%;
                margin: 0 auto;
            }
            .orphita-testimonials-style-' . $styleid . '{
                width: 100%;   
                background-color:   ' . $styledata[87] . ';
                float: left;
            }
            .orphita-testimonials-style-' . $styleid . '-info{
                width: 100%;
                float: left;
                font-size: ' . $styledata[131] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';   
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';
                color: ' . $styledata[133] . ';
                text-align: left;                
                padding: ' . $styledata[167] . 'px ' . $styledata[169] . 'px;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info{
                text-align: center;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }
            .orphita-testimonials-style-' . $styleid . '-image-body-parent{
                width: 100%;
                float: left;
                align-items: center;
                display: flex;
            }
            .orphita-testimonials-style-' . $styleid . '-image-parent{
                width: 50%;
                float: left;
                padding: ' . $styledata[101] . 'px ' . $styledata[99] . 'px;
            }
            
            .orphita-testimonials-style-' . $styleid . '-image{
                max-width: ' . $styledata[117] . 'px;
                -webkit-border-radius: ' . $styledata[129] . 'px;
                -moz-border-radius: ' . $styledata[129] . 'px;
                -ms-border-radius: ' . $styledata[129] . 'px;
                -o-border-radius: ' . $styledata[129] . 'px;
                border-radius: ' . $styledata[129] . 'px;
                border: ' . $styledata[125] . 'px solid ' . $styledata[127] . ';
                position: relative;
                width: 100%;
                display: inline-block;
                float: right;
            }
            .orphita-testimonials-style-' . $styleid . '-image:after{
                content: "";
                padding-bottom: ' . $styledata[119] . 'px;
                display:block;
            }
            .orphita-testimonials-style-' . $styleid . '-image img{
                position: absolute;
                top:0;
                bottom: 0;
                width: 100%;
                height: 100%;
                display: block;
                -webkit-border-radius: ' . $styledata[129] . 'px;
                -moz-border-radius: ' . $styledata[129] . 'px;
                -ms-border-radius: ' . $styledata[129] . 'px;
                -o-border-radius: ' . $styledata[129] . 'px;
                border-radius: ' . $styledata[129] . 'px;
            }
            .orphita-testimonials-style-' . $styleid . '-body-parent{
                width: 50%;
                float: left;             
                padding: ' . $styledata[101] . 'px ' . $styledata[99] . 'px;
            }
            a .orphita-testimonials-style-' . $styleid . '-name{
                width: 100%;
                float: left;
                text-align: left;
                color: ' . $styledata[147] . ';
                font-size: ' . $styledata[145] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[155]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[159] . ';
                padding: ' . $styledata[161] . 'px 0 ' . $styledata[163] . 'px 0;          
            }
            .orphita-testimonials-style-' . $styleid . '-body-parent:hover, a .orphita-testimonials-style-' . $styleid . '-name:hover{
                color: ' . $styledata[151] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-body-parent .orphita-testimonials-style-' . $styleid . '-designation{
                width: 100%;
                float: left;
                text-align: left;
                color: ' . $styledata[173] . ';
                font-size: ' . $styledata[171] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[177]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[181] . ';
                padding: ' . $styledata[183] . 'px 0 ' . $styledata[185] . 'px 0;         
            }
            
            ' . $styledata[187] . '
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
