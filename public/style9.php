<?php
if (!defined('ABSPATH'))
    exit;

function orphita_testimonial_or_reviews_shortcode_function_style9($styleid, $userdata, $styledata, $listdata) {
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

            echo ' <div class="' . $styledata[83] . ' orphita-testimonials-' . $styleid . '-padding orphita-animation" orphita-animation="' . $styledata[103] . '">
                        <div class="orphita-testimonials-item-' . $styleid . '">
                            <div class="orphita-testimonials-style-' . $styleid . ' ' . $styledata[149] . '">
                                <div class="orphita-testimonials-style-' . $styleid . '-info">
                                    ' . orphita_testimonial_or_reviews_special_charecter($editdata[7]) . '
                                </div> 
                                <div class="orphita-testimonials-style-' . $styleid . '-image-parent">
                                    <div class="orphita-testimonials-style-' . $styleid . '-image">
                                        <img src="' . $editdata[11] . '">
                                    </div>
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
                background-color:   ' . $styledata[87] . ';
                -webkit-box-shadow:' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -moz-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -ms-box-shadow:' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                -o-box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
                box-shadow: ' . $styledata[109] . 'px ' . $styledata[111] . 'px ' . $styledata[113] . 'px ' . $styledata[115] . 'px ' . $styledata[107] . ';
            }
            .orphita-testimonials-style-' . $styleid . '-info{
                padding: ' . $styledata[89] . 'px ' . $styledata[91] . 'px;
                width: 100%;
                float: left;  
                position: relative;
                color: ' . $styledata[133] . ';
                font-size: ' . $styledata[131] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[135]) . ';   
                font-style: ' . $styledata[137] . ';
                font-weight: ' . $styledata[139] . ';
                text-align: left;
                border-top: ' . $styledata[141] . 'px solid  ' . $styledata[151] . ';
                border-bottom: ' . $styledata[143] . 'px solid ' . $styledata[151] . '; /* ekhane color ekta hobe just tom ebomg botton er size diffrence */
            }
            .orphita-testimonials-style-' . $styleid . ':hover .orphita-testimonials-style-' . $styleid . '-info{
                border-top: ' . $styledata[141] . 'px solid  ' . $styledata[153] . ';
                border-bottom: ' . $styledata[143] . 'px solid ' . $styledata[153] . ';
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info{
                text-align: center;
            }
            .orphita-testimonials-style-' . $styleid . '-info:after{
                position: absolute;
                width: ' . $styledata[167] . 'px;
                height: ' . $styledata[167] . 'px;
                display: block;
                background-color:  ' . $styledata[151] . ';           
                bottom: -' . ($styledata[167] / 2 + $styledata[143]) . 'px;         /* ekhane width/2 + border-botom asbe */ 
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                -ms-border-radius: 50%;
                -o-border-radius: 50%;
                border-radius: 50%;
                left: 10px; /*ekhane left er kono kaj hobe na eta static */
                content: "";
                display: block;
            }
            .orphita-testimonials-style-' . $styleid . ':hover .orphita-testimonials-style-' . $styleid . '-info:after{
                background-color:  ' . $styledata[153] . ';
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-info:after{
                text-align: right;
                left: auto;
                right: 10px;/* ei right er kono kaj hobe na */
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-info:after{              
                -webkit-transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                -o-transform: translateX(-50%);
                transform: translateX(-50%);
                left: 50%;
            }
            .orphita-testimonials-style-' . $styleid . '-image-parent{
                padding: 0px ' . $styledata[91] . 'px;
                width: 100%;
                float: left;   
                text-align: left;
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-image-parent{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-image-parent{
                text-align: center;
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
                vertical-align: middle;
                margin-top: ' . $styledata[121] . 'px;
                margin-bottom: ' . $styledata[123] . 'px;    /* ekhane ektai hobe padding top ar bottom ust value 2 jaygate bosbe */
                border: ' . $styledata[125] . 'px solid ' . $styledata[127] . ';
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
            .orphita-testimonials-style-' . $styleid . '-name-body{
                width: 100%;
                float: left;   
                padding: 0px ' . $styledata[91] . 'px;
            }
            .orphita-testimonials-style-' . $styleid . '-name, a .orphita-testimonials-style-' . $styleid . '-name{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[147] . ';
                font-size: ' . $styledata[145] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[155]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[159] . ';
                padding-top: ' . $styledata[161] . 'px;
                padding-bottom: ' . $styledata[163] . 'px;              
            }
            .orphita-testimonials-style-' . $styleid . '-name:hover, a .orphita-testimonials-style-' . $styleid . '-name:hover{
                color: ' . $styledata[165] . ';
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
                 color: ' . $styledata[173] . ';
                font-size: ' . $styledata[171] . 'px;
                font-family: ' . orphita_testimonial_or_reviews_font_familly_charecter($styledata[177]) . ';
                font-style: ' . $styledata[157] . ';
                font-weight: ' . $styledata[181] . ';
                padding-top: ' . $styledata[183] . 'px;
                padding-bottom: ' . $styledata[185] . 'px;                
            }
            .orphita-testimonials-right .orphita-testimonials-style-' . $styleid . '-working{
                text-align: right;
            }
            .orphita-testimonials-center .orphita-testimonials-style-' . $styleid . '-working{
                text-align: center;
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
