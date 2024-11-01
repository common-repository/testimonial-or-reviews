<?php
if (!defined('ABSPATH'))
    exit;
orphita_testimonial_or_reviews_user_capabilities();
$styleid = (int) $_GET['styleid'];
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';
$oxitype = 'testimonial';
$editdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',);
$itemid = '';
$value = '';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
if (!empty($_POST['submit']) && $_POST['submit'] == 'submit') {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_new_data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = '{#}|{#}{#}|{#}'
                . 'testimonial-name {#}|{#}' . sanitize_text_field($_POST['testimonial-name']) . '{#}|{#}'
                . ' testimonial-designation {#}|{#}' . sanitize_text_field($_POST['testimonial-designation']) . '{#}|{#}'
                . ' testimonial-text {#}|{#}' . sanitize_text_field($_POST['testimonial-text']) . '{#}|{#}'
                . ' testimonial-url {#}|{#}' . sanitize_text_field($_POST['testimonial-url']) . '{#}|{#}'
                . ' oxi-testimonial-image-upload-url-01 {#}|{#}' . sanitize_text_field($_POST['oxi-testimonial-image-upload-url-01']) . '{#}|{#}';
        if ($_POST['item-id'] == '') {
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (type, styleid, files) VALUES (%s, %d, %s)", array($oxitype, $styleid, $data)));
        }
        if ($_POST['item-id'] != '' && is_numeric($_POST['item-id'])) {
            $item_id = (int) $_POST['item-id'];
            $data = $wpdb->update("$table_list", array("files" => $data), array('id' => $item_id), array('%s'), array('%d'));
        }
    }
}
if (!empty($_POST['edit']) && is_numeric($_POST['item-id'])) {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_edit_data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['item-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
        $editdata = explode('{#}|{#}', $data['files']);
        $categorydata = explode('|||', $editdata[1]);
        $itemid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#orphita-oxi-testimonial-add-new-data").modal("show")  }, 500); });</script>';
    }
}
if (!empty($_POST['delete']) && is_numeric($_POST['item-id'])) {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_delete_data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_style_css')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = ' orphita-carousel |' . sanitize_text_field($_POST['orphita-carousel']) . '|'
                . ' orphita-carousel-center-mode |' . sanitize_text_field($_POST['orphita-carousel-center-mode']) . '|'
                . ' orphita-carousel-autoplay |' . sanitize_text_field($_POST['orphita-carousel-autoplay']) . '|'
                . ' orphita-carousel-autoplay-time |' . sanitize_text_field($_POST['orphita-carousel-autoplay-time']) . '|'
                . ' orphita-carousel-navigation |' . sanitize_text_field($_POST['orphita-carousel-navigation']) . '|'
                . ' orphita-carousel-navigation-style |' . sanitize_text_field($_POST['orphita-carousel-navigation-style']) . '|'
                . ' orphita-carousel-navigation-size |' . sanitize_text_field($_POST['orphita-carousel-navigation-size']) . '|'
                . ' orphita-carousel-navigation-color |#6e6e6e|'
                . ' orphita-carousel-navigation-active-color |#ba00c7|'
                . ' orphita-carousel-navigation-posion |' . sanitize_text_field($_POST['orphita-carousel-navigation-posion']) . '|'
                . ' orphita-carousel-navigation-showing-type |' . sanitize_text_field($_POST['orphita-carousel-navigation-showing-type']) . '|'
                . ' orphita-carousel-pagination |' . sanitize_text_field($_POST['orphita-carousel-pagination']) . '|'
                . ' orphita-carousel-pagination-position |' . sanitize_text_field($_POST['orphita-carousel-pagination-position']) . '|'
                . ' orphita-carousel-pagination-color |#6e6e6e|'
                . ' orphita-carousel-pagination-active-color |#ba00c7|'
                . ' orphita-carousel-pagination-width |' . sanitize_text_field($_POST['orphita-carousel-pagination-width']) . '|'
                . ' orphita-carousel-pagination-height |' . sanitize_text_field($_POST['orphita-carousel-pagination-height']) . '|'
                . ' orphita-carousel-pagination-active-size |' . sanitize_text_field($_POST['orphita-carousel-pagination-active-size']) . '|'
                . ' orphita-carousel-pagination-margin-top |' . sanitize_text_field($_POST['orphita-carousel-pagination-margin-top']) . '|'
                . ' orphita-carousel-pagination-margin-left |' . sanitize_text_field($_POST['orphita-carousel-pagination-margin-left']) . '|'
                . ' orphita-carousel-pagination-radius |' . sanitize_text_field($_POST['orphita-carousel-pagination-radius']) . '|'
                . '||||||||||||||||||||||||||||||||||||||||testimonial-col |' . sanitize_text_field($_POST['testimonial-col']) . '|'
                . 'testimonial-width |' . sanitize_text_field($_POST['testimonial-width']) . '|'
                . 'background-color |rgba(250, 250, 250, 1)|'
                . 'padding-top |' . sanitize_text_field($_POST['padding-top']) . '|'
                . 'padding-left |' . sanitize_text_field($_POST['padding-left']) . '|'
                . 'margin-top |' . sanitize_text_field($_POST['margin-top']) . '|'
                . 'margin-left |' . sanitize_text_field($_POST['margin-left']) . '|'
                . 'open-tabs |' . sanitize_text_field($_POST['open-tabs']) . '|'
                . 'border-radius-top |' . sanitize_text_field($_POST['border-radius-top']) . '|'
                . 'border-radius-bottom|' . sanitize_text_field($_POST['border-radius-bottom']) . '|'
                . 'orphita-animation||'
                . 'animation-duration|' . sanitize_text_field($_POST['animation-duration']) . '|'
                . 'boxshow-color|rgba(192, 26, 217, 0.51)|'
                . 'boxshow-horizontal|' . sanitize_text_field($_POST['boxshow-horizontal']) . '|'
                . 'boxshow-vertical|' . sanitize_text_field($_POST['boxshow-vertical']) . '|'
                . 'boxshow-blur|' . sanitize_text_field($_POST['boxshow-blur']) . '|'
                . 'boxshow-spread|' . sanitize_text_field($_POST['boxshow-spread']) . '|'
                . 'typo-image-Width|' . sanitize_text_field($_POST['typo-image-Width']) . '|'
                . 'typo-image-height|' . sanitize_text_field($_POST['typo-image-height']) . '|'
                . '||'
                . '||'
                . 'typo-image-border-size|' . sanitize_text_field($_POST['typo-image-border-size']) . '|'
                . 'typo-image-border-color|#bd1cd9|'
                . 'typo-image-border-radius|' . sanitize_text_field($_POST['typo-image-border-radius']) . '|'
                . 'typo-info-size|' . sanitize_text_field($_POST['typo-info-size']) . '|'
                . 'typo-info-color|#87898b|'
                . 'typo-info-family|Open+Sans|'
                . 'typo-info-style|' . sanitize_text_field($_POST['typo-info-style']) . '|'
                . 'typo-info-weight|' . sanitize_text_field($_POST['typo-info-weight']) . '|'
                . 'typo-border-size|' . sanitize_text_field($_POST['typo-border-size']) . '|'
                . 'typo-border-color|#bd1cd9|'
                . 'typo-name-size|' . sanitize_text_field($_POST['typo-name-size']) . '|'
                . 'typo-name-color|#bd1cd9|'
                . 'testimonial-position|' . sanitize_text_field($_POST['testimonial-position']) . '|'
                . 'typo-name-hover-color|#f00303|'
                . '||'
                . 'typo-name-family|Open+Sans|'
                . 'typo-name-style|' . sanitize_text_field($_POST['typo-name-style']) . '|'
                . 'typo-name-weight|' . sanitize_text_field($_POST['typo-name-weight']) . '|'
                . 'typo-name-padding-top|' . sanitize_text_field($_POST['typo-name-padding-top']) . '|'
                . 'typo-name-padding-left|' . sanitize_text_field($_POST['typo-name-padding-left']) . '|'
                . '||'
                . 'typo-info-padding-top|' . sanitize_text_field($_POST['typo-info-padding-top']) . '|'
                . 'typo-info-padding-left|' . sanitize_text_field($_POST['typo-info-padding-left']) . '|'
                . 'typo-designation-size|' . sanitize_text_field($_POST['typo-designation-size']) . '|'
                . 'typo-designation-color|#356ea6|'
                . '||'
                . 'typo-designation-family|Open+Sans|'
                . 'typo-designation-style|' . sanitize_text_field($_POST['typo-designation-style']) . '|'
                . 'typo-designation-weight|' . sanitize_text_field($_POST['typo-designation-weight']) . '|'
                . 'typo-designation-padding-top|' . sanitize_text_field($_POST['typo-designation-padding-top']) . '|'
                . 'typo-name-designation-left|' . sanitize_text_field($_POST['typo-name-designation-left']) . '|'
                . 'custom-css||'
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $styleid));
    }
}
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id ASC ", $styleid), ARRAY_A);
$styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $styleid), ARRAY_A);
$styledata = $styledata['css'];
$styledata = explode('|', $styledata);
?>
<div class="wrap">
    <?php echo orphita_testimonial_or_reviews_admin_head(); ?>    
    <div class="orphita-admin-wrapper">
        <div class="orphita-admin-row">
            <div class="orphita-admin-style-panel-left">
                <div class="orphita-admin-style-panel-left-settings">
                    <div class="orphita-admin-style-panel-left-settings-row">
                        <form method="post">
                            <div class="orphita-tabs-wrapper">
                                <ul class="orphita-tabs-ul">
                                    <li ref="#orphita-tabs-id-5" class="">
                                        General
                                    </li>
                                    <li ref="#orphita-tabs-id-4" class="">
                                        Typography
                                    </li>
                                    <li ref="#orphita-tabs-id-6" class="">
                                        Slider
                                    </li>
                                    <li ref="#orphita-tabs-id-2" class="">
                                        Custom CSS
                                    </li>
                                    <li ref="#orphita-tabs-id-1">
                                        Support
                                    </li>
                                </ul>
                                <div class="orphita-tabs-content">
                                    <div class="orphita-tabs-content-tabs" id="orphita-tabs-id-5">
                                        <div class="orphita-tabs-content-div-half">
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    General Settings
                                                </div> 
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_col_data('testimonial-col', $styledata[83], 'Item per Rows', 'How many item shows in single Rows');
                                                echo orphita_testimonial_or_reviews_admin_number('testimonial-width', $styledata[85], '1', 'Width', 'Give your Filp Width');
                                                echo orphita_testimonial_or_reviews_admin_color('background-color', $styledata[87], 'rgba', 'Background Color', 'Set your Background Color');
                                                echo orphita_testimonial_or_reviews_admin_number('typo-border-size', $styledata[141], '1', 'Border Size', 'Give your Border Size around the Whole Description');
                                                echo orphita_testimonial_or_reviews_admin_color('typo-border-color', $styledata[143], '', 'Border Color', 'Set your Border Color');
                                                echo orphita_testimonial_or_reviews_admin_testimonial_position('testimonial-position', $styledata[149], 'Text Align', 'Set your Testimonial Text Position');
                                                ?>    
                                            </div> 
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Optional Settings
                                                </div>  
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_number_double('padding-top', $styledata[89], 'padding-left', $styledata[91], 'Padding', 'Set your Padding top bottom and left right');
                                                echo orphita_testimonial_or_reviews_admin_number_double('margin-top', $styledata[93], 'margin-left', $styledata[95], 'Margin', 'Set your Margin top bottom and left right');
                                                echo orphita_testimonial_or_reviews_admin_true_false('open-tabs', $styledata[97], 'New tabs', '_blank', 'Normal', '', 'Link Open', 'Dow you want to open link at same Tabs or new Windows');
                                                echo orphita_testimonial_or_reviews_admin_number_double('border-radius-top', $styledata[99], 'border-radius-bottom', $styledata[101], 'Border Radius', 'Set your Border Radius Top and Bottom');
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="orphita-tabs-content-div-half">
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Animation
                                                </div>
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_animation_select($styledata[103]);
                                                echo orphita_testimonial_or_reviews_admin_number('animation-duration', $styledata[105], '0.1', 'Animation Duration', 'Give your Animation Duration into Second');
                                                ?> 
                                            </div> 
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Box Shadow
                                                </div>
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_color('boxshow-color', $styledata[107], 'rgba', 'Color', 'Give your Box Shadow Color');
                                                echo orphita_testimonial_or_reviews_admin_number_double('boxshow-horizontal', $styledata[109], 'boxshow-vertical', $styledata[111], 'Shadow Length', 'Giveyour Box Shadow lenth as horizontal and vertical');
                                                echo orphita_testimonial_or_reviews_admin_number_double('boxshow-blur', $styledata[113], 'boxshow-spread', $styledata[115], 'Shadow Radius', 'Giveyour Box Shadow Radius as Blur and Spread');
                                                ?> 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="orphita-tabs-content-tabs" id="orphita-tabs-id-4">
                                        <div class="orphita-tabs-content-div-half">
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Profile Image
                                                </div> 
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_number('typo-image-Width', $styledata[117], '1', 'Image Width', 'Set your Front Image Width.');
                                                echo orphita_testimonial_or_reviews_admin_number('typo-image-height', $styledata[119], '1', 'Image Height', 'Set your Front Image Height.');
                                                echo orphita_testimonial_or_reviews_admin_number('typo-image-border-size', $styledata[125], '1', 'Border Size', 'Give your Border Size around the Profile Image');
                                                echo orphita_testimonial_or_reviews_admin_color('typo-image-border-color', $styledata[127], '', 'Border Color', 'Set your Border Color');
                                                echo orphita_testimonial_or_reviews_admin_number('typo-image-border-radius', $styledata[129], '1', 'Border Radius', 'Give your Border Radius around the Profile Image');
                                                ?>    
                                            </div> 
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Info Text
                                                </div>  
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_number('typo-info-size', $styledata[131], '1', 'Font Size', 'Set your Info Font Size');
                                                echo orphita_testimonial_or_reviews_admin_color('typo-info-color', $styledata[133], '', 'Color', 'Set your Info Color');
                                                echo orphita_testimonial_or_reviews_admin_font_family('typo-info-family', $styledata[135], 'Font Family', 'Give your Prepared Font from our Google Font List');
                                                echo orphita_testimonial_or_reviews_admin_font_style('typo-info-style', $styledata[137], 'Font Style', 'Set your Info Style');
                                                echo orphita_testimonial_or_reviews_admin_font_weight('typo-info-weight', $styledata[139], 'Font Weight', 'Give your Info Font Weight');
                                                echo orphita_testimonial_or_reviews_admin_number_double('typo-info-padding-top', $styledata[167], 'typo-info-padding-left', $styledata[169], 'Padding Top Bottom', 'Set your Padding top bottom and left right');
                                                ?> 
                                            </div>                                            
                                        </div>
                                        <div class="orphita-tabs-content-div-half">
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Name
                                                </div>
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_number('typo-name-size', $styledata[145], '1', 'Font Size', 'Set your Name Font Size');
                                                echo orphita_testimonial_or_reviews_admin_color('typo-name-color', $styledata[147], '', 'Color', 'Set your Name Color');
                                                echo orphita_testimonial_or_reviews_admin_color('typo-name-hover-color', $styledata[151], '', 'Hover Color', 'Set your Name Hover Color');
                                                echo orphita_testimonial_or_reviews_admin_font_family('typo-name-family', $styledata[155], 'Font Family', 'Give your Prepared Font from our Google Font List');
                                                echo orphita_testimonial_or_reviews_admin_font_style('typo-name-style', $styledata[157], 'Font Style', 'Set your Name Font Style');
                                                echo orphita_testimonial_or_reviews_admin_font_weight('typo-name-weight', $styledata[159], 'Font Weight', 'Give your Name Font Weight');
                                                echo orphita_testimonial_or_reviews_admin_number_double('typo-name-padding-top', $styledata[161], 'typo-name-padding-left', $styledata[163], 'Padding Top Bottom', 'Set Your Name  Padding Top Bottom');
                                                ?> 
                                            </div> 
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Designation 
                                                </div>
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_number('typo-designation-size', $styledata[171], '1', 'Font Size', 'Set your Font Size');
                                                echo orphita_testimonial_or_reviews_admin_color('typo-designation-color', $styledata[173], '', 'Color', 'Set your Designation Color');
                                                echo orphita_testimonial_or_reviews_admin_font_family('typo-designation-family', $styledata[177], 'Font Family', 'Give your Prepared Font from our Google Font List');
                                                echo orphita_testimonial_or_reviews_admin_font_style('typo-designation-style', $styledata[179], 'Font Style', 'Set your Name Font Style');
                                                echo orphita_testimonial_or_reviews_admin_font_weight('typo-designation-weight', $styledata[181], 'Font Weight', 'Give your Name Font Weight');
                                                echo orphita_testimonial_or_reviews_admin_number_double('typo-designation-padding-top', $styledata[183], 'typo-name-designation-left', $styledata[185], 'Padding Top Bottom', 'Set Your Name  Padding Top Bottom');
                                                ?> 
                                            </div> 
                                        </div>
                                    </div>                              
                                    <div class="orphita-tabs-content-tabs" id="orphita-tabs-id-6">
                                        <div class="orphita-tabs-content-div-half">
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    General Settings
                                                </div> 
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_true_false('orphita-carousel', $styledata[1], 'Active', 'yes', 'Normal', '', 'Active Slider', 'Want to Active Slider?');
                                                echo orphita_testimonial_or_reviews_admin_true_false('orphita-carousel-center-mode', $styledata[3], 'Active', 'true', 'No', 'false', 'Center Mode', 'Active Center Mode?');
                                                echo orphita_testimonial_or_reviews_admin_true_false('orphita-carousel-autoplay', $styledata[5], 'Active', 'true', 'No', 'false', 'Auto Play', 'Active AutoPlay?');
                                                echo orphita_testimonial_or_reviews_admin_number('orphita-carousel-autoplay-time', $styledata[7], '0.1', 'Autoplay Time', 'Set your Carouel Autoplay Time based on Seconds');
                                                ?>    
                                            </div> 
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Navigation Settings
                                                </div> 
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_true_false('orphita-carousel-navigation', $styledata[9], 'Active', 'true', 'No', 'false', 'Active Navigation', 'Want to Active Navigation?');
                                                echo orphita_testimonial_or_reviews_admin_navigation('orphita-carousel-navigation-style', $styledata[11], 'Navimation Style', 'Set your Navigation Style');
                                                echo orphita_testimonial_or_reviews_admin_number('orphita-carousel-navigation-size', $styledata[13], '1', 'Size', 'Set your Navigation Font Size');
                                                echo orphita_testimonial_or_reviews_admin_color('orphita-carousel-navigation-color', $styledata[15], '', 'Color', 'Set your Navigation Color');
                                                echo orphita_testimonial_or_reviews_admin_color('orphita-carousel-navigation-active-color', $styledata[17], '', 'Active Color', 'Set your Navigation Active Color');
                                                echo orphita_testimonial_or_reviews_admin_number('orphita-carousel-navigation-posion', $styledata[19], '1', 'Navimation Position', 'Set your Navigation Position as Inner or Outer');
                                                echo orphita_testimonial_or_reviews_admin_true_false('orphita-carousel-navigation-showing-type', $styledata[21], 'Always', '', 'On Hover', ':Hover', 'Showing Type', 'Select how your navigation will shown Always or at Hover?');
                                                ?>    
                                            </div> 
                                        </div>
                                        <div class="orphita-tabs-content-div-half">
                                            <div class="orphita-tabs-content-div">
                                                <div class="head-oxi">
                                                    Pagination Settings
                                                </div>
                                                <?php
                                                echo orphita_testimonial_or_reviews_admin_true_false('orphita-carousel-pagination', $styledata[23], 'Active', 'true', 'No', 'false', 'Pagination', 'Active Pagination?');
                                                echo orphita_testimonial_or_reviews_admin_pagination('orphita-carousel-pagination-position', $styledata[25], 'Position', 'Confirm Your Pagination Position');
                                                echo orphita_testimonial_or_reviews_admin_color('orphita-carousel-pagination-color', $styledata[27], '', 'Color', 'Set your Pagination Color');
                                                echo orphita_testimonial_or_reviews_admin_color('orphita-carousel-pagination-active-color', $styledata[29], '', 'Active Color', 'Set your Pagination Active Color');
                                                echo orphita_testimonial_or_reviews_admin_number_double('orphita-carousel-pagination-width', $styledata[31], 'orphita-carousel-pagination-height', $styledata[33], 'Width & Height', 'Give your Pagination Width and Height');
                                                echo orphita_testimonial_or_reviews_admin_number('orphita-carousel-pagination-active-size', $styledata[35], '0.01', 'Active Size', 'Set your pagination Active Size based on CSS3 Scale');
                                                echo orphita_testimonial_or_reviews_admin_number_double('orphita-carousel-pagination-margin-top', $styledata[37], 'orphita-carousel-pagination-margin-left', $styledata[39], 'Margin', 'Give your Pagination Margin Top bottom and Left Right');
                                                echo orphita_testimonial_or_reviews_admin_number('orphita-carousel-pagination-radius', $styledata[41], '1', 'Radius', 'Set your pagination Border Radius');
                                                ?> 
                                            </div>                                                                                       
                                        </div>
                                    </div>
                                    <div class="orphita-tabs-content-tabs" id="orphita-tabs-id-2">
                                        <br>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="custom-css">Custom CSS:</label>
                                                <textarea class="form-control" rows="4" id="custom-css" name="custom-css"><?php echo $styledata[187]; ?></textarea>
                                                <small class="form-text text-muted">Add Your Custom CSS Unless make it blank.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orphita-tabs-content-tabs" id="orphita-tabs-id-1">
                                        <?php
                                        echo orphita_testimonial_or_reviews_admin_support();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class = "orphita-setting-save">
                                <button type = "button" class = "btn btn-danger" data-dismiss = "modal">Close</button>
                                <input type="hidden" name="orphita-styleid" id="orphita-styleid" value="<?php echo $styleid; ?>"/>
                                <input type = "submit" class = "btn btn-primary" name = "data-submit" value = "Save">
                                <?php wp_nonce_field("orphita_testimonial_or_reviews_style_css")
                                ?>
                            </div>
                        </form>                           
                    </div>
                </div>
                <div class="orphita-admin-style-panel-left-preview">
                    <div class="orphita-admin-style-panel-left-preview-heading">
                        <div class="orphita-admin-style-panel-left-preview-heading-left">
                            Preview
                        </div>
                        <div class="orphita-admin-style-panel-left-preview-heading-right">
                            <input type="text" class="form-control orphita-color"  data-format="rgb" data-opacity="true"  id="orphita-preview-data-background" value="rgba(255, 255, 255, 1)">
                        </div>
                    </div>
                    <div class="orphita-preview-data" id="orphita-preview-data">
                        <?php orphita_testimonial_or_reviews_shortcode_function($styleid, 'admin') ?>
                    </div>
                </div>
            </div>
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
                        <input type="text" class="form-control" onclick="this.setSelectionRange(0, this.value.length)" value="[orphita_testimonial_or_reviews id=&quot;<?php echo $styleid; ?>&quot;]">
                        <span></span>
                        <em>Shortcode for templates/themes</em>
                        <p>Copy &amp; paste this code into a template file to include the slideshow within your theme.</p>
                        <input type="text" class="form-control" onclick="this.setSelectionRange(0, this.value.length)" value="&lt;?php echo do_shortcode(&#039;[orphita_testimonial_or_reviews  id=&quot;<?php echo $styleid; ?>&quot;]&#039;); ?&gt;">
                        <span></span>
                        <em>Apply on Visual Composer</em>
                        <p>Go on Visual Composer and get Our element on Content bar as Image Hover Ultimate</p>
                    </div>
                </div>
                <div class="orphita-admin-item-panel">
                    <div class="orphita-admin-add-new-headding">
                        Testimonials Rearrange
                    </div>
                    <div class="orphita-admin-add-new-item" id="orphita-drag-and-drop">
                        <span>
                            <i class="fa fa-cogs"></i>
                        </span>
                    </div>
                </div>
                <div id="orphita-drag-and-drop-data" class="modal fade bd-example-modal-sm" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <form id="orphita-drag-submit">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Rearrange Testimonials</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="alert text-center" id="orphita-drag-saving">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </div>
                                    <?php
                                    echo ' <ul class="list-group" id="orphita-drag-drop">';
                                    foreach ($listdata as $value) {
                                        $drag = explode('{#}|{#}', $value['files']);
                                        echo '<li class="list-group-item" id ="' . $value['id'] . '">'.$drag[3].'</li>';
                                    }
                                    echo '</ul>';
                                    ?>
                                </div>
                                <div class="modal-footer">    
                                    <input type="hidden" name="orphita-testimonials-ajax-nonce" id="orphita-testimonials-ajax-nonce" value="<?php echo wp_create_nonce("orphita_testimonials_ajax_data"); ?>"/>
                                    <button type="button" id="orphita-drag-and-drop-data-close" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <input type="submit" id="orphita-drag-and-drop-data-submit" class="btn btn-primary" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>  
            <div id="orphita-oxi-testimonial-add-new-data" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <form method="POST">
                        <div class="modal-content">                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Testimonial Add or Edit Form</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                echo orphita_testimonial_or_reviews_admin_input_text('testimonial-name', $editdata[3], 'Writer Name', 'Add Writer Name.');
                                echo orphita_testimonial_or_reviews_admin_input_text('testimonial-designation', $editdata[5], 'Writer Designation', 'Add Writer Designation.');
                                echo orphita_testimonial_or_reviews_admin_input_text_area('testimonial-text', $editdata[7], 'Given Text:', 'Write Your Testimonial Text here.');
                                echo orphita_testimonial_or_reviews_admin_input_text('testimonial-url', $editdata[9], 'Writer Url', 'Give your writer url unless make it blank');
                                ?>
                                <div class="form-group">
                                    <label for="oxi-testimonial-image-upload-url-01"> User Image</label>
                                    <div class="col-xs-12-div">
                                        <div class="col-md-8 col-xs-6" style="padding-left: 0px;">
                                            <input type="text "class="form-control" name="oxi-testimonial-image-upload-url-01" id="oxi-testimonial-image-upload-url-01"  value="<?php echo $editdata[11]; ?>">
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <button type="button" id="oxi-testimonial-image-upload-button-01" class="btn btn-default">Upload Image</button>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Add or modify your User image.</small>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="item-id" name="item-id" value="<?php echo $itemid ?>">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" id="item-submit" name="submit" value="submit">
                            </div>
                        </div>
                        <?php wp_nonce_field("orphita_testimonial_or_reviews_new_data") ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>