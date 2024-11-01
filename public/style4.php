<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style4($styleid, $userdata, $styledata, $listdata) {
    wp_enqueue_style('' . $styledata[135] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[135] . '');
    wp_enqueue_style('' . $styledata[155] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[155] . '');
     wp_enqueue_style('' . $styledata[183] . '', 'https://fonts.googleapis.com/css?family=' . $styledata[183] . '');
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
            echo '<div class="' . $styledata[83] . ' orphita-testimonials-' . $styleid . '-padding orphita-animation" orphita-animation="' . $styledata[103] . '">
                        <div class="orphita-testimonials-item-' . $styleid . ' ' . $styledata[175] . '">
                            <div class="orphita-testimonials-style-' . $styleid . '">                                
                                <div class="orphita-testimonials-style-' . $styleid . '-info">
                                   ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                                </div>
                                <div class="orphita-testimonials-style-' . $styleid . '-left">
                                    <div class="orphita-testimonials-style-' . $styleid . '-image">
                                        <img src="' . $editdata[11] . '">
                                    </div> 
                                </div>
                                <div class="orphita-testimonials-style-' . $styleid . '-right">
                                    <div class="orphita-testimonials-style-' . $styleid . '-name">
                                        ' . orphita_testimonial_or_reviews_special_charecter($editdata[3]) . '
                                    </div>
                                    <div class="orphita-testimonials-style-' . $styleid . '-working">
                                       <a href="' . $editdata[9] . '" target="' . $styledata[97] . '">@' . orphita_testimonial_or_reviews_special_charecter($editdata[13]) . '</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   ';           
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
            .orphita-testimonials-style-' . $styleid . '-left{
                width: ' . $styledata[117] . 'px;    
                float: left;
            }
            .orphita-testimonials-style-' . $styleid . '-right{    
                width: calc(100% - ' . $styledata[117] . 'px);
                padding-left: ' . $styledata[151] . 'px;
                float: left;
            }
            .orphita-testimonials-right  .orphita-testimonials-style-' . $styleid . '-left, 
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-right{
                float: right;
                text-align: right;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-right{
                float: right;
                text-align: right;
                padding-left: 0px;
                padding-right: ' . $styledata[151] . 'px;
            }
            .orphita-testimonials-center  .orphita-testimonials-style-' . $styleid . '-left, 
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-right{
                float: left;
                text-align: center;
            }
            .orphita-testimonials-style-' . $styleid . '-image{
                max-width: ' . $styledata[117] . 'px;              
                width: 100%;
                position: relative;
                float: left;               
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
                padding: 10px 5px;
                width: 100%;
                float: left;       
                text-align: left;
                font-size: ' . $styledata[131] . 'px;
                color: ' . $styledata[133] . ';
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';              
                line-height: 130%;
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';
                margin-top: ' . $styledata[141] . 'px;
                margin-bottom: ' . $styledata[143] . 'px;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info{
                text-align: center;
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
                padding: ' . $styledata[161] . 'px 0 ' . $styledata[163] . 'px;               
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
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[183]) . ';
                font-style: ' . $styledata[185] . ';
                font-weight: ' . $styledata[187] . ';
                padding: ' . $styledata[189] . 'px 0 ' . $styledata[191] . 'px;               
            }
            .orphita-testimonials-style-' . $styleid . '-working a{
                color: ' . $styledata[179] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-working a:hover,
            .orphita-testimonials-style-' . $styleid . '-working a:active,
            .orphita-testimonials-style-' . $styleid . '-working a:focus{               
                color: ' . $styledata[181] . ';
                text-decoration:none;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-working{
                text-align: right;
            }
            ' . $styledata[193] . '
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
