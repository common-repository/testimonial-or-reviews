<?php
if (!defined('ABSPATH'))
    exit;
orphita_testimonial_or_reviews_user_capabilities();
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
global $wpdb;
$table_import = $wpdb->prefix . 'oxi_div_import';
$oxitype = 'testimonial';
if (!empty($_POST['orphita-testimonial-or-reviews-import']) && $_POST['orphita-testimonial-or-reviews-import'] != '') {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_new_style_active')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $orphita_testimonial_or_reviews_import = sanitize_text_field($_POST['orphita-testimonial-or-reviews-import']);
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (name, type) VALUES ( %d, %s)", array($orphita_testimonial_or_reviews_import, $oxitype)));
        $redirect_id = $wpdb->insert_id;
        if ($redirect_id == 0) {
            $url = admin_url("admin.php?page=content-tabs-ultimate-import");
        } elseif ($redirect_id != 0) {
            $url = admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-new#style$orphita_testimonial_or_reviews_import");
        }
        echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
        exit;
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
            $directory = orphita_testimonial_or_reviews_url . '/layouts/';
            $filecount = 0;
            $files = glob($directory . "*.{php}", GLOB_BRACE);
            if ($files) {
                $filecount = count($files);
            }
            $filecount = $filecount - 2;
            for ($i = 1; $i <= $filecount; $i++) {
                $importname = $i;
                $importstatus = '';
                foreach ($importdata as $value) {
                    if ($importname == $value['name']) {
                        $importstatus = 'true';
                    }
                }
                if ($i <= 10) {
                    if ($importstatus != 'true') {
                        echo '<div class="orphita-admin-style-preview">
                        <div class="orphita-admin-style-preview-top">';
                        include orphita_testimonial_or_reviews_url . 'layouts/style' . $i . '.php';
                        echo '</div>';
                        echo '<div class="orphita-admin-style-preview-bottom">
                        <div class="orphita-admin-style-preview-bottom-left-import">
                            Template ' . $i . '
                        </div>        
                        <div class="orphita-admin-style-preview-bottom-right-import">
                              <input type="hidden" value="" id="orphita-testimonial-or-reviews-data-' . $i . '">
                              <button type="button" class="btn btn-success" id="orphita-testimonial-or-reviews-style-active-' . $i . '">Active</button>
                        </div>
                     </div>';
                        echo ' </div>';
                        wp_add_inline_script('orphita-bootstrap', 'jQuery("#orphita-testimonial-or-reviews-style-active-' . $i . '").click(function () {
                                        jQuery("#orphita-testimonial-or-reviews-import").val("' . $i . '");
                                        jQuery("form#orphita-testimonial-or-reviews-import-data").submit();
                                    });');
                    }
                } else {
                    if ($importstatus != 'true') {
                        echo '<div class="orphita-admin-style-preview">
                        <div class="orphita-admin-style-preview-top">';
                        include orphita_testimonial_or_reviews_url . 'layouts/style' . $i . '.php';
                        echo '</div>';
                        echo '<div class="orphita-admin-style-preview-bottom">
                        <div class="orphita-admin-style-preview-bottom-left-import">
                            Template ' . $i . '
                        </div>        
                        <div class="orphita-admin-style-preview-bottom-right-import">
                              <button type="button" class="btn btn-danger">Pro Only</button>
                        </div>
                     </div>';
                        echo ' </div>';
                    }
                }
            }
            ?>
        </div>
    </div>
    <form method="post" id="orphita-testimonial-or-reviews-import-data">
        <input type="hidden" name="orphita-testimonial-or-reviews-import" id="orphita-testimonial-or-reviews-import" value="">
        <?php wp_nonce_field("orphita_testimonial_or_reviews_new_style_active") ?>
    </form>
</div>