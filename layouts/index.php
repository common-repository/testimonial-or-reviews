<?php
if (!defined('ABSPATH'))
    exit;
orphita_testimonial_or_reviews_user_capabilities();
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_import = $wpdb->prefix . 'oxi_div_import';
$oxitype = 'testimonial';
if (!empty($_POST['submit']) && $_POST['submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_new_style_select')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $orphita_testimonial_or_reviews_style = sanitize_text_field($_POST['orphita-testimonial-or-reviews-style']);
        $orphita_testimonial_or_reviews_name = sanitize_text_field($_POST['style-name']);
        $orphita_testimonial_or_reviews_data = sanitize_text_field($_POST['orphita-testimonial-or-reviews-data']);
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_name} (name, type, style_name, css) VALUES ( %s, %s, %s, %s )", array($orphita_testimonial_or_reviews_name, $oxitype, $orphita_testimonial_or_reviews_style, $orphita_testimonial_or_reviews_data)));
        $redirect_id = $wpdb->insert_id;
        if ($redirect_id == 0) {
            $url = admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-new");
        }
        if ($redirect_id != 0) {
            $url = admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-new&styleid=$redirect_id");
        }
        echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
        exit;
    }
}

if (!empty($_POST['orphita-testimonial-or-reviews-import']) && $_POST['orphita-testimonial-or-reviews-import'] != '') {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_new_style_deactive')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxitabsimport = sanitize_text_field($_POST['orphita-testimonial-or-reviews-import']);
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_import} WHERE name = %d and type = %s", $oxitabsimport, $oxitype));
    }
}
$importdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_import WHERE type = %s ORDER by name ASC", $oxitype), ARRAY_A);
?>
<div class="wrap">
     <?php echo orphita_testimonial_or_reviews_admin_head(); ?> 
    <div class="orphita-admin-wrapper">
        <div class="orphita-admin-row">
            <h1> Select Layouts</h1>
            <p> View our layouts and select from button with name</p>
        </div>
        <div class="orphita-admin-row">
            <?php
            foreach ($importdata as $value) {
                $stylesrtid = $value['name'];
                echo '<div class="orphita-admin-style-preview" id="style' . $value['name'] . '">
                        <div class="orphita-admin-style-preview-top">';
                include orphita_testimonial_or_reviews_url . 'layouts/style' . $value['name'] . '.php';
                echo '</div>';
                echo '<div class="orphita-admin-style-preview-bottom">
                        <div class="orphita-admin-style-preview-bottom-left">
                            Template ' . $stylesrtid . '
                        </div>        
                        <div class="orphita-admin-style-preview-bottom-right">
                              <button type="button" class="btn btn-warning" id="orphita-testimonial-or-reviews-style-deactive-' . $stylesrtid . '">Deactive</button>
                              <button type="button" class="btn btn-success" id="orphita-testimonial-or-reviews-style-' . $stylesrtid . '" data-toggle="modal" data-target="#orphita-testimonial-or-reviews-style-model">Create New</button>
                        </div>
                     </div>';
                echo ' </div>';               
                 wp_add_inline_script('orphita-bootstrap', 'jQuery("#orphita-testimonial-or-reviews-style-deactive-' . $stylesrtid . '").click(function () {
                                                                    var status = confirm("Do you Want to Deactive?");
                                                                    if (status == false) {
                                                                        return false;
                                                                    } else {
                                                                        jQuery("#orphita-testimonial-or-reviews-import").val("' . $stylesrtid . '");
                                                                        jQuery("form#orphita-testimonial-or-reviews-import-data").submit();
                                                                    }                                
                                                            });
                                                            jQuery("#orphita-testimonial-or-reviews-style-' . $stylesrtid . '").on("click", function () {
                                                                 jQuery("#orphita-testimonial-or-reviews-style").val("");
                                                                 jQuery("#orphita-testimonial-or-reviews-data").val("");
                                                                 jQuery("#style-name").val("");
                                                                 jQuery("#orphita-testimonial-or-reviews-data").val(jQuery("#orphita-testimonial-or-reviews-data-' . $stylesrtid . '").val());
                                                                 jQuery("#orphita-testimonial-or-reviews-style").val("style' . $stylesrtid . '");                 
                                                             });');
            }
            ?>
            <div class="orphita-admin-style-preview">
                <div class="orphita-admin-style-preview-top">
                    <a href="<?php echo admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-import"); ?>">
                        <div class="orphita-admin-add-new-item">
                            <span>
                                <i class="fa fa-plus-circle"></i>
                                Add More Templates
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>   
    <form method="post" id="orphita-testimonial-or-reviews-import-data">
        <input type="hidden" name="orphita-testimonial-or-reviews-import" id="orphita-testimonial-or-reviews-import" value="">
        <?php wp_nonce_field("orphita_testimonial_or_reviews_new_style_deactive") ?>
    </form>
    <div class="modal fade" id="orphita-testimonial-or-reviews-style-model" >
        <form method="post">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Team Settings</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row form-group-sm">
                            <label for="style" class="col-sm-6 col-form-label"  data-toggle="tooltip" class="tooltipLink" data-original-title="Give Your Template Name">Name</label>
                            <div class="col-sm-6 nopadding">
                                <input class="form-control" type="text" value="" id='style-name'  name="style-name">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="orphita-testimonial-or-reviews-style" id="orphita-testimonial-or-reviews-style" value="">
                        <input type="hidden" name="orphita-testimonial-or-reviews-data" id="orphita-testimonial-or-reviews-data" value="">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Save">
                        <?php wp_nonce_field("orphita_testimonial_or_reviews_new_style_select") ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>