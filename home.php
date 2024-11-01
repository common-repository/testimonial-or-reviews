<?php
if (!defined('ABSPATH'))
    exit;
orphita_testimonial_or_reviews_user_capabilities();
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$oxitype = 'testimonial';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['delete']) && is_numeric($_POST['id'])) {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_home_delete')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        global $wpdb;
        $id = (int) $_POST['id'];
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %d", $id));
    }
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'Clone' && is_numeric($_POST['orphita-style-id'])) {
    if (!wp_verify_nonce($nonce, 'orphita_testimonial_or_reviews_home_clone')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        global $wpdb;
        $id = (int) $_POST['orphita-style-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $id), ARRAY_A);
        $name = sanitize_text_field($_POST['style-name']);
        $style_name = $data['style_name'];
        $css = $data['css'];
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_name} (name, type,  style_name, css) VALUES ( %s, %s, %s, %s )", array($name, $oxitype, $style_name, $css)));
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
$data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
?>
<div class="wrap">
    <?php echo orphita_testimonial_or_reviews_admin_head(); ?> 
    <h1>Testimonial or Reviews <a href="<?php echo admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-new"); ?>" class="btn btn-primary"> Add New</a></h1>
    <div class="orphita-admin-wrapper table-responsive" style="margin-top: 20px; margin-bottom: 20px;">
        <?php
        if (count($data) == 0) {
            ?>
            <div class="orphita-admin-style-preview">
                <div class="orphita-admin-style-preview-top">
                    <a href="<?php echo admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-new"); ?>">
                        <div class="orphita-admin-add-new-item">
                            <span>
                                <i class="fa fa-plus-circle"></i>
                                Create Your First Flip
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <?php
        } else {
            ?>
            <table class="table table-hover widefat " style="background-color: #fff; border: 1px solid #ccc">
                <thead>
                    <tr>
                        <th style="width: 11%">ID</th>
                        <th style="width: 10%">Name</th>
                        <th style="width: 13%">Template</th>
                        <th style="width: 52%">Shortcode</th>
                        <th style="width: 15%">Edit Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $value) {
                        $id = $value['id'];
                        echo ' <tr>';
                        echo ' <td>' . $id . '</td>';
                        echo '  <td >' . $value['name'] . '</td>';
                        echo ' <td >' . ucfirst(chunk_split($value['style_name'], 5, " ")) . '</td>';
                        echo '<td ><span>Shortcode <input type="text" onclick="this.setSelectionRange(0, this.value.length)" value="[orphita_testimonial_or_reviews id=&quot;' . $id . '&quot;]"></span>'
                        . '<span>Php Code <input type="text" onclick="this.setSelectionRange(0, this.value.length)" value="&lt;?php echo do_shortcode(&#039;[orphita_testimonial_or_reviews  id=&quot;' . $id . '&quot;]&#039;); ?&gt;"></span></td>';
                        echo '<td >
                                   <button type="button" class="btn btn-success orphita-style-clone"  style="float:left" data-toggle="modal" data-target="#orphita-style-model" dataid="' . $id . '"><i class="fa fa-clone" aria-hidden="true"></i></button>
                                    <a href="' . admin_url("admin.php?page=orphita-testimonial-or-reviews-admin-new&styleid=$id") . '"  title="Edit"  class="btn btn-info" style="float:left; margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <form method="post" class="orphita-style-delete">
                                            ' . wp_nonce_field("orphita_testimonial_or_reviews_home_delete") . '
                                            <input type="hidden" name="id" value="' . $id . '">
                                            <button class="btn btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>  
                                    </form>
                                   
                             </td>';
                        echo ' </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>            
<div class="modal fade" id="orphita-style-model" >
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Flip Settings</h4>
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
                    <input type="hidden" name="orphita-style-id" id="orphita-style-id" value="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Clone">
                    <?php wp_nonce_field("orphita_testimonial_or_reviews_home_clone") ?>
                </div>
            </div>
        </div>
    </form>
</div>

