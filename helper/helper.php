<?php
if (!defined('ABSPATH'))
    exit;
orphita_testimonial_or_reviews_user_capabilities();

function orphita_testimonial_or_reviews_admin_head() {
    ?>
    <div class="orphita-admin-notifications">
        <h3>
            <span class="dashicons dashicons-flag"></span> 
            Notifications
        </h3>
        <p></p>
        <div class="orphita-admin-notifications-holder">
            <div class="orphita-admin-notifications-alert">
                <p>Thank you for using my Testimonials or Reviews Plugin. I Just wanted to see if you have any questions or concerns about my plugins. If you do, Please do not hesitate to <a href="https://wordpress.org/support/plugin/testimonial-or-reviews#new-post">file a bug report</a></p>
                <p> By the way, did you know we also have a <a href="https://www.oxilab.org/downloads/testimonial-or-reviews/">Premium Version</a>? It offers lots of options with automatic update. It also comes with 16/5 personal support.</p>
                <p>Thanks Again!</p>
                <p></p>
            </div>                     
        </div>
        <p></p>
    </div> 
    <p></p>
    <?php
}

function orphita_testimonial_or_reviews_admin_support() {
    ?>
        <div class="orphita-admin-support-body">
            <div class="col-xs-12">                                           
                <a href="https://www.oxilab.org/docs/testimonial-or-reviews/getting-started/installing-for-the-first-time/" target="_blank">
                    <div class="orphita-admin-support-col">
                        <div class="orphita-admin-support-icon">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </div>  
                        <div class="orphita-admin-support-heading">
                            Read Our Docs
                        </div> 
                        <div class="orphita-admin-support-info">
                            Learn how to set up and using Testimonials or Reviews
                        </div> 
                    </div>
                </a>
                <a href="https://wordpress.org/support/plugin/testimonial-or-reviews" target="_blank">
                    <div class="orphita-admin-support-col">
                        <div class="orphita-admin-support-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>  
                        <div class="orphita-admin-support-heading">
                            Support
                        </div> 
                        <div class="orphita-admin-support-info">
                            Powered by WordPress.org, Issues resolved by Plugins Author.
                        </div> 
                    </div>
                </a>
                <a href="#" target="_blank">
                    <div class="orphita-admin-support-col">
                        <div class="orphita-admin-support-icon">
                            <i class="fa fa-ticket" aria-hidden="true"></i>
                        </div>  
                        <div class="orphita-admin-support-heading">
                            Video Tutorial 
                        </div> 
                        <div class="orphita-admin-support-info">
                            Watch our Using Video Tutorial in Youtube.
                        </div> 
                    </div>
                </a>
            </div>
        </div> 
        <?php
}

function orphita_testimonial_or_reviews_admin_input_text($id, $value, $name, $title) {
    ?>
    <div class="form-group">
        <label for="<?php echo $id; ?>"><?php echo $name; ?></label>
        <input type="text "class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo orphita_testimonial_or_reviews_admin_special_charecter($value); ?>">
        <small class="form-text text-muted"><?php echo $title; ?></small>
    </div>

    <?php
}

function orphita_testimonial_or_reviews_admin_input_text_area($id, $value, $name, $title) {
    ?>
    <div class="form-group">
        <label for="<?php echo $id; ?>"><?php echo $name; ?></label>
        <textarea class="form-control" rows="4" id="<?php echo $id; ?>" name="<?php echo $id; ?>"><?php echo orphita_testimonial_or_reviews_admin_special_charecter($value); ?></textarea>
        <small class="form-text text-muted"><?php echo $title; ?></small>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_number($id, $value, $step, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> </label>
        <div class="col-sm-6">
            <input class="form-control" type="number" step="<?php echo $step; ?>" value="<?php echo $value; ?>" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_number_double($frist_id, $first_value, $second_id, $second_value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $frist_id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> </label>
        <div class="col-sm-3">
            <input class="form-control" type="number"  min="0" value="<?php echo $first_value; ?>" id="<?php echo $frist_id; ?>" name="<?php echo $frist_id; ?>">
        </div>
        <div class="col-sm-3">
            <input class="form-control" type="number"  min="0" value="<?php echo $second_value; ?>" id="<?php echo $second_id; ?>" name="<?php echo $second_id; ?>">
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_color($id, $value, $type, $name, $title) {
    if ($type == 'rgba' || $type == 'RGBA') {
        $colortype = 'data-format="rgb" data-opacity="true"';
    } else {
        $colortype = '';
    }
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> <span class="orphita-pro-only">Pro Only</span></label>
        <div class="col-sm-6">
            <input type="text" <?php echo $colortype; ?> class="form-control orphita-color" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo $value; ?>">
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_font_family($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?>  <span class="orphita-pro-only">Pro Only</span></label>
        <div class="col-sm-6">
            <input class="form-control orphita-admin-font" type="text" value="<?php echo $value; ?>" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_true_false($id, $value, $fristname, $fristvalue, $Secondname, $Secondvalue, $name, $title) {
    ?>
    <div class="form-group row">
        <label class="col-sm-6 control-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>"><?php echo $name; ?></label>
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary <?php
                if ($fristvalue == $value) {
                    echo 'active';
                }
                ?>"> <input type="radio" <?php
                           if ($fristvalue == $value) {
                               echo 'checked';
                           }
                           ?> name="<?php echo $id; ?>" id="<?php echo $id; ?>-yes" autocomplete="off" value="<?php echo $fristvalue; ?>"><?php echo $fristname; ?></label>
                <label class="btn btn-primary <?php
                if ($Secondvalue == $value) {
                    echo 'active';
                }
                ?>"> <input type="radio" <?php
                           if ($Secondvalue == $value) {
                               echo 'checked';
                           }
                           ?> name="<?php echo $id; ?>" autocomplete="off" id="<?php echo $id; ?>-no" value="<?php echo $Secondvalue; ?>"><?php echo $Secondname; ?> </label>
            </div>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_font_weight($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> </label>
        <div class="col-sm-6">
            <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <option value="100" <?php
                if ($value == '100') {
                    echo 'selected';
                };
                ?>>100</option>
                <option value="200" <?php
                if ($value == '200') {
                    echo 'selected';
                };
                ?>>200</option>
                <option value="300" <?php
                if ($value == '300') {
                    echo 'selected';
                };
                ?>>300</option>
                <option value="400" <?php
                if ($value == '400') {
                    echo 'selected';
                };
                ?>>400</option>
                <option value="500" <?php
                if ($value == '500') {
                    echo 'selected';
                };
                ?>>500</option>
                <option value="600" <?php
                if ($value == '600') {
                    echo 'selected';
                };
                ?>>600</option>
                <option value="700" <?php
                if ($value == '700') {
                    echo 'selected';
                };
                ?>>700</option>
                <option value="800" <?php
                if ($value == '800') {
                    echo 'selected';
                };
                ?>>800</option>
                <option value="900" <?php
                if ($value == '900') {
                    echo 'selected';
                };
                ?>>900</option>
                <option value="normal" <?php
                if ($value == 'normal') {
                    echo 'selected';
                };
                ?>>Normal</option>
                <option value="bold" <?php
                if ($value == 'bold') {
                    echo 'selected';
                };
                ?>>Bold</option>
                <option value="lighter" <?php
                if ($value == 'lighter') {
                    echo 'selected';
                };
                ?>>Lighter</option>
                <option value="initial" <?php
                if ($value == 'initial') {
                    echo 'selected';
                };
                ?>>Initial</option>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_font_style($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> </label>
        <div class="col-sm-6">
            <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <option <?php
                if ($value == 'normal') {
                    echo 'selected';
                }
                ?> value="normal">Normal</option>
                <option <?php
                if ($value == 'italic') {
                    echo 'selected';
                }
                ?> value="italic">Italic</option>
                <option <?php
                if ($value == 'oblique') {
                    echo 'selected';
                }
                ?> value="oblique">Oblique</option>
                <option <?php
                if ($value == 'initial') {
                    echo 'selected';
                }
                ?> value="initial">Initial</option>
                <option <?php
                if ($value == 'inherit') {
                    echo 'selected';
                }
                ?> value="inherit">Inherit</option>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_text_align($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> </label>
        <div class="col-sm-6">
            <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <option value="left" <?php
                if ($value == 'left') {
                    echo 'selected';
                }
                ?>>Left</option>
                <option value="Center" <?php
                if ($value == 'Center') {
                    echo 'selected';
                }
                ?>>Center</option>
                <option value="Right" <?php
                if ($value == 'Right') {
                    echo 'selected';
                }
                ?>>Right</option>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_col_data($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>" ><?php echo $name; ?> </label>
        <div class="col-sm-6">
            <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <option value="orphita-testimonial-or-reviews-col-1" <?php
                if ($value == 'orphita-testimonial-or-reviews-col-1') {
                    echo 'selected';
                }
                ?>>Single Item</option>
                <option value="orphita-testimonial-or-reviews-col-2" <?php
                if ($value == 'orphita-testimonial-or-reviews-col-2') {
                    echo 'selected';
                }
                ?>>2 Items</option>
                <option value="orphita-testimonial-or-reviews-col-3" <?php
                if ($value == 'orphita-testimonial-or-reviews-col-3') {
                    echo 'selected';
                }
                ?>>3 Items</option>
                <option value="orphita-testimonial-or-reviews-col-4" <?php
                if ($value == 'orphita-testimonial-or-reviews-col-4') {
                    echo 'selected';
                }
                ?>>4 Items</option>
                <option value="orphita-testimonial-or-reviews-col-5" <?php
                if ($value == 'orphita-testimonial-or-reviews-col-5') {
                    echo 'selected';
                }
                ?>>5 Items</option>
                <option value="orphita-testimonial-or-reviews-col-6" <?php
                if ($value == 'orphita-testimonial-or-reviews-col-6') {
                    echo 'selected';
                }
                ?>>6 Items</option>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_animation_select($value) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="orphita-animation" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Select your Viewing Animation" >Animation  <span class="orphita-pro-only">Pro Only</span></label>
        <div class="col-sm-6">
            <select class="form-control" id="orphita-animation" name="orphita-animation">
                <optgroup label="No Animation">
                    <option value="" <?php
                    if ($value == '') {
                        echo 'selected';
                    }
                    ?>>No Animation</option>
                </optgroup>
                <optgroup label="Attention Seekers">
                    <option value="bounce" <?php
                    if ($value == 'bounce') {
                        echo 'selected';
                    }
                    ?>>bounce</option>
                    <option value="flash" <?php
                    if ($value == 'flash') {
                        echo 'selected';
                    }
                    ?>>flash</option>
                    <option value="pulse" <?php
                    if ($value == 'pulse') {
                        echo 'selected';
                    }
                    ?>>pulse</option>
                    <option value="rubberBand" <?php
                    if ($value == 'rubberBand') {
                        echo 'selected';
                    }
                    ?>>rubberBand</option>
                    <option value="shake" <?php
                    if ($value == 'shake') {
                        echo 'selected';
                    }
                    ?>>shake</option>
                    <option value="swing" <?php
                    if ($value == 'swing') {
                        echo 'selected';
                    }
                    ?>>swing</option>
                    <option value="tada" <?php
                    if ($value == 'tada') {
                        echo 'selected';
                    }
                    ?>>tada</option>
                    <option value="wobble" <?php
                    if ($value == 'wobble') {
                        echo 'selected';
                    }
                    ?>>wobble</option>
                    <option value="jello" <?php
                    if ($value == 'jello') {
                        echo 'selected';
                    }
                    ?>>jello</option>
                </optgroup>

                <optgroup label="Bouncing Entrances">
                    <option value="bounceIn" <?php
                    if ($value == 'bounceIn') {
                        echo 'selected';
                    }
                    ?>>bounceIn</option>
                    <option value="bounceInDown" <?php
                    if ($value == 'bounceInDown') {
                        echo 'selected';
                    }
                    ?>>bounceInDown</option>
                    <option value="bounceInLeft" <?php
                    if ($value == 'bounceInLeft') {
                        echo 'selected';
                    }
                    ?>>bounceInLeft</option>
                    <option value="bounceInRight" <?php
                    if ($value == 'bounceInRight') {
                        echo 'selected';
                    }
                    ?>>bounceInRight</option>
                    <option value="bounceInUp" <?php
                    if ($value == 'bounceInUp') {
                        echo 'selected';
                    }
                    ?>>bounceInUp</option>
                </optgroup>
                <optgroup label="Fading Entrances">
                    <option value="fadeIn" <?php
                    if ($value == 'fadeIn') {
                        echo 'selected';
                    }
                    ?>>fadeIn</option>
                    <option value="fadeInDown" <?php
                    if ($value == 'fadeInDown') {
                        echo 'selected';
                    }
                    ?>>fadeInDown</option>
                    <option value="fadeInDownBig" <?php
                    if ($value == 'fadeInDownBig') {
                        echo 'selected';
                    }
                    ?>>fadeInDownBig</option>
                    <option value="fadeInLeft" <?php
                    if ($value == 'fadeInLeft') {
                        echo 'selected';
                    }
                    ?>>fadeInLeft</option>
                    <option value="fadeInLeftBig" <?php
                    if ($value == 'fadeInLeftBig') {
                        echo 'selected';
                    }
                    ?>>fadeInLeftBig</option>
                    <option value="fadeInRight" <?php
                    if ($value == 'fadeInRight') {
                        echo 'selected';
                    }
                    ?>>fadeInRight</option>
                    <option value="fadeInRightBig" <?php
                    if ($value == 'fadeInRightBig') {
                        echo 'selected';
                    }
                    ?>>fadeInRightBig</option>
                    <option value="fadeInUp" <?php
                    if ($value == 'fadeInUp') {
                        echo 'selected';
                    }
                    ?>>fadeInUp</option>
                    <option value="fadeInUpBig" <?php
                    if ($value == 'fadeInUpBig') {
                        echo 'selected';
                    }
                    ?>>fadeInUpBig</option>
                </optgroup>

                <optgroup label="Fading Exits">
                    <option value="fadeOut" <?php
                    if ($value == 'fadeOut') {
                        echo 'selected';
                    }
                    ?>>fadeOut</option>
                    <option value="fadeOutDown" <?php
                    if ($value == 'fadeOutDown') {
                        echo 'selected';
                    }
                    ?>>fadeOutDown</option>
                    <option value="fadeOutDownBig" <?php
                    if ($value == 'fadeOutDownBig') {
                        echo 'selected';
                    }
                    ?>>fadeOutDownBig</option>
                    <option value="fadeOutLeft" <?php
                    if ($value == 'fadeOutLeft') {
                        echo 'selected';
                    }
                    ?>>fadeOutLeft</option>
                    <option value="fadeOutLeftBig" <?php
                    if ($value == 'fadeOutLeftBig') {
                        echo 'selected';
                    }
                    ?>>fadeOutLeftBig</option>
                    <option value="fadeOutRight" <?php
                    if ($value == 'fadeOutRight') {
                        echo 'selected';
                    }
                    ?>>fadeOutRight</option>
                    <option value="fadeOutRightBig" <?php
                    if ($value == 'fadeOutRightBig') {
                        echo 'selected';
                    }
                    ?>>fadeOutRightBig</option>
                    <option value="fadeOutUp" <?php
                    if ($value == 'fadeOutUp') {
                        echo 'selected';
                    }
                    ?>>fadeOutUp</option>
                    <option value="fadeOutUpBig" <?php
                    if ($value == 'fadeOutUpBig') {
                        echo 'selected';
                    }
                    ?>>fadeOutUpBig</option>
                </optgroup>

                <optgroup label="Flippers">
                    <option value="flip" <?php
                    if ($value == 'flip') {
                        echo 'selected';
                    }
                    ?>>flip</option>
                    <option value="flipInX" <?php
                    if ($value == 'flipInX') {
                        echo 'selected';
                    }
                    ?>>flipInX</option>
                    <option value="flipInY" <?php
                    if ($value == 'flipInY') {
                        echo 'selected';
                    }
                    ?>>flipInY</option>
                    <option value="flipOutX" <?php
                    if ($value == 'flipOutX') {
                        echo 'selected';
                    }
                    ?>>flipOutX</option>
                    <option value="flipOutY" <?php
                    if ($value == 'flipOutY') {
                        echo 'selected';
                    }
                    ?>>flipOutY</option>
                </optgroup>

                <optgroup label="Lightspeed">
                    <option value="lightSpeedIn" <?php
                    if ($value == 'lightSpeedIn') {
                        echo 'selected';
                    }
                    ?>>lightSpeedIn</option>
                    <option value="lightSpeedOut" <?php
                    if ($value == 'lightSpeedOut') {
                        echo 'selected';
                    }
                    ?>>lightSpeedOut</option>
                </optgroup>

                <optgroup label="Rotating Entrances">
                    <option value="rotateIn" <?php
                    if ($value == 'rotateIn') {
                        echo 'selected';
                    }
                    ?>>rotateIn</option>
                    <option value="rotateInDownLeft" <?php
                    if ($value == 'rotateInDownLeft') {
                        echo 'selected';
                    }
                    ?>>rotateInDownLeft</option>
                    <option value="rotateInDownRight" <?php
                    if ($value == 'rotateInDownRight') {
                        echo 'selected';
                    }
                    ?>>rotateInDownRight</option>
                    <option value="rotateInUpLeft" <?php
                    if ($value == 'rotateInUpLeft') {
                        echo 'selected';
                    }
                    ?>>rotateInUpLeft</option>
                    <option value="rotateInUpRight" <?php
                    if ($value == 'rotateInUpRight') {
                        echo 'selected';
                    }
                    ?>>rotateInUpRight</option>
                </optgroup>
                <optgroup label="Sliding Entrances">
                    <option value="slideInUp" <?php
                    if ($value == 'slideInUp') {
                        echo 'selected';
                    }
                    ?>>slideInUp</option>
                    <option value="slideInDown" <?php
                    if ($value == 'slideInDown') {
                        echo 'selected';
                    }
                    ?>>slideInDown</option>
                    <option value="slideInLeft" <?php
                    if ($value == 'slideInLeft') {
                        echo 'selected';
                    }
                    ?>>slideInLeft</option>
                    <option value="slideInRight" <?php
                    if ($value == 'slideInRight') {
                        echo 'selected';
                    }
                    ?>>slideInRight</option>
                </optgroup> 
                <optgroup label="Zoom Entrances">
                    <option value="zoomIn" <?php
                    if ($value == 'zoomIn') {
                        echo 'selected';
                    }
                    ?>>zoomIn</option>
                    <option value="zoomInDown" <?php
                    if ($value == 'zoomInDown') {
                        echo 'selected';
                    }
                    ?>>zoomInDown</option>
                    <option value="zoomInLeft" <?php
                    if ($value == 'zoomInLeft') {
                        echo 'selected';
                    }
                    ?>>zoomInLeft</option>
                    <option value="zoomInRight" <?php
                    if ($value == 'zoomInRight') {
                        echo 'selected';
                    }
                    ?>>zoomInRight</option>
                    <option value="zoomInUp" <?php
                    if ($value == 'zoomInUp') {
                        echo 'selected';
                    }
                    ?>>zoomInUp</option>
                </optgroup>
                <optgroup label="Specials">
                    <option value="hinge" <?php
                    if ($value == 'hinge') {
                        echo 'selected';
                    }
                    ?>>hinge</option>
                    <option value="jackInTheBox" <?php
                    if ($value == 'jackInTheBox') {
                        echo 'selected';
                    }
                    ?>>jackInTheBox</option>
                    <option value="rollIn" <?php
                    if ($value == 'rollIn') {
                        echo 'selected';
                    }
                    ?>>rollIn</option>
                </optgroup>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_navigation($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>"><?php echo $name; ?></label>
        <div class="col-sm-6">
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-arrow-left fa-arrow-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-arrow-left"></span> <span class="fa fa-arrow-right"></span></div>
                <input <?php
                if ($value == 'fa-arrow-left fa-arrow-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-arrow-left fa-arrow-right'>
            </div>
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-angle-double-left fa-angle-double-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-angle-double-left"></span> <span class="fa fa-angle-double-right"></span></div>
                <input <?php
                if ($value == 'fa-angle-double-left fa-angle-double-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-angle-double-left fa-angle-double-right'>
            </div>
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-angle-left fa-angle-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-angle-left"></span> <span class="fa fa-angle-right"></span></div>
                <input <?php
                if ($value == 'fa-angle-left fa-angle-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-angle-left fa-angle-right'>
            </div>  
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-arrow-circle-left fa-arrow-circle-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-arrow-circle-left"></span> <span class="fa fa-arrow-circle-right"></span></div>
                <input <?php
                if ($value == 'fa-arrow-circle-left fa-arrow-circle-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-arrow-circle-left fa-arrow-circle-right'>
            </div> 
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-caret-left fa-caret-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-caret-left"></span> <span class="fa fa-caret-right"></span></div>
                <input <?php
                if ($value == 'fa-caret-left fa-caret-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-caret-left fa-caret-right'>
            </div>
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-caret-square-o-left fa-caret-square-o-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-caret-square-o-left"></span> <span class="fa fa-caret-square-o-right"></span></div>
                <input <?php
                if ($value == 'fa-caret-square-o-left fa-caret-square-o-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-caret-square-o-left fa-caret-square-o-right'>
            </div>
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-chevron-circle-left fa-chevron-circle-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-chevron-circle-left"></span> <span class="fa fa-chevron-circle-right"></span></div>
                <input <?php
                if ($value == 'fa-chevron-circle-left fa-chevron-circle-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-chevron-circle-left fa-chevron-circle-right'>
            </div>
            <div class="col-xs-4" style="margin-bottom: 5px;">
                <div  <?php
                if ($value == 'fa-chevron-left fa-chevron-right') {
                    echo 'style="color: #E00086"';
                }
                ?> class="orphita-carousel-nev-style"><span class="fa fa-chevron-left"></span> <span class="fa fa-chevron-right" ></span></div>
                <input <?php
                if ($value == 'fa-chevron-left fa-chevron-right') {
                    echo 'checked';
                }
                ?> type="radio" name="<?php echo $id; ?>" class="hidden <?php echo $id; ?>" value='fa-chevron-left fa-chevron-right'>
            </div>
        </div>        
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_pagination($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>"><?php echo $name; ?></label>
        <div class="col-sm-6">
            <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <option <?php
                if ($value == 'top left') {
                    echo 'selected';
                }
                ?> value="top left">Top Left</option>
                <option <?php
                if ($value == 'top center') {
                    echo 'selected';
                }
                ?> value="top center">Top Middle</option>
                <option <?php
                if ($value == 'top right') {
                    echo 'selected';
                }
                ?> value="top right">Top Right</option>
                <option <?php
                if ($value == 'bottom left') {
                    echo 'selected';
                }
                ?> value="bottom left">Bottom Left</option>
                <option <?php
                if ($value == 'bottom center') {
                    echo 'selected';
                }
                ?> value="bottom center">Bottom Middle</option>
                <option <?php
                if ($value == 'bottom right') {
                    echo 'selected';
                }
                ?> value="bottom right">Bottom Right</option>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_testimonial_position($id, $value, $name, $title) {
    ?>
    <div class="form-group row form-group-sm">
        <label for="<?php echo $id; ?>" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="<?php echo $title; ?>"><?php echo $name; ?></label>
        <div class="col-sm-6">
            <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <option <?php
                if ($value == '') {
                    echo 'selected';
                }
                ?> value="">Left</option>
                <option <?php
                if ($value == 'orphita-testimonials-center') {
                    echo 'selected';
                }
                ?> value="orphita-testimonials-center">Center</option>
                <option <?php
                if ($value == 'orphita-testimonials-right') {
                    echo 'selected';
                }
                ?> value="orphita-testimonials-right">Right</option>
            </select>
        </div>
    </div>
    <?php
}

function orphita_testimonial_or_reviews_admin_shortcode($id) {
    ?>
    <div class="orphita-admin-style-panel-right">
        <div class="orphita-admin-item-panel">
            <div class="orphita-admin-add-new-headding">
                Add New
            </div>
            <div class="orphita-admin-add-new-item" id="orphita-admin-add-new-item">
                <span>
                    <i class="fa fa-plus-circle"></i>
                    Add new Testimonial
                </span>
            </div>
        </div>
        <div class="orphita-shortcode">
            <div class="orphita-shortcode-heading">
                Shortcodes
            </div>
            <div class="orphita-shortcode-body">
                <em>Shortcode for posts/pages/plugins</em>
                <p>Copy &amp; paste the shortcode directly into any WordPress post or page.</p>
                <input type="text" class="form-control" onclick="this.setSelectionRange(0, this.value.length)" value="[orphita_testimonial_or_reviews id=&quot;<?php echo $id; ?>&quot;]">
                <span></span>
                <em>Shortcode for templates/themes</em>
                <p>Copy &amp; paste this code into a template file to include the slideshow within your theme.</p>
                <input type="text" class="form-control" onclick="this.setSelectionRange(0, this.value.length)" value="&lt;?php echo do_shortcode(&#039;[orphita_testimonial_or_reviews  id=&quot;<?php echo $id; ?>&quot;]&#039;); ?&gt;">
                <span></span>
                <em>Apply on Visual Composer</em>
                <p>Go on Visual Composer and get Our element on Content bar as Image Hover Ultimate</p>
            </div>
        </div>
    </div>    
    <?php
}
