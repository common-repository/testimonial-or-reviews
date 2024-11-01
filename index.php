<?php
/*
  Plugin Name: Testimonial or Reviews
  Plugin URI: https://www.oxilab.org/testimonial-or-reviews
  Description: Testimonial or Reviews to Display your testimonial or reviews into Your Site. Display you Testimonial  with clean, responsive and professional way.
  Author: Biplob Adhikari
  Author URI: https://www.oxilab.org
  Version: 1.0
 */
if (!defined('ABSPATH'))
    exit;

$oxi_div_database = '1.0';
define('orphita_testimonial_or_reviews_url', plugin_dir_path(__FILE__));
define('ORPHITA_TESTIMONIAL_OR_REVIEWS_HOME', 'https://www.oxilab.org'); // you should use your own CONSTANT name, and be sure to replace it throughout this file
// the name of your product. This should match the download name in EDD exactly
define('ORPHITA_TESTIMONIAL_OR_REVIEWS', 'Testimonial or Reviews'); // you should use your own CONSTANT name, and be sure to replace it throughout this file
// the name of the settings page for the license input to be displayed
define('ORPHITA_TESTIMONIAL_OR_REVIEWS_LICENSE_PAGE', 'orphita-testimonial-or-reviews-license');

include orphita_testimonial_or_reviews_url . 'public.php';
add_shortcode('orphita_testimonial_or_reviews', 'orphita_testimonial_or_reviews_shortcode');

function orphita_testimonial_or_reviews_shortcode($atts) {
    extract(shortcode_atts(array('id' => ' ',), $atts));
    $styleid = $atts['id'];
    ob_start();
    orphita_testimonial_or_reviews_shortcode_function($styleid, 'user');
    return ob_get_clean();
}

add_action('vc_before_init', 'orphita_testimonial_or_reviews_VC_extension');
add_shortcode('orphita_testimonial_or_reviews_VC', 'orphita_testimonial_or_reviews_VC_shortcode');

function orphita_testimonial_or_reviews_VC_shortcode($atts) {
    extract(shortcode_atts(array(
        'id' => ''
                    ), $atts));
    $styleid = $atts['id'];
    ob_start();
    orphita_testimonial_or_reviews_shortcode_function($styleid, 'user');
    return ob_get_clean();
}

function orphita_testimonial_or_reviews_VC_extension() {
    vc_map(array(
        "name" => __("Testimonial or Reviews"),
        "base" => "orphita_testimonial_or_reviews_VC",
        "category" => __("Content"),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("ID"),
                "param_name" => "id",
                "description" => __("Input your Testimonial ID in input box")
            ),
        )
    ));
}

function orphita_testimonial_or_reviews_user_capabilities() {
    $user_role = get_option('orphita_testimonial_or_reviews_user_role_key');
    $role_object = get_role($user_role);
    $first_key = '';
    if (isset($role_object->capabilities) && is_array($role_object->capabilities)) {
        reset($role_object->capabilities);
        $first_key = key($role_object->capabilities);
    } else {
        $first_key = 'manage_options';
    }
    if (!current_user_can($first_key)) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
}

add_action('admin_menu', 'orphita_testimonial_or_reviews_menu');

function orphita_testimonial_or_reviews_menu() {
    $user_role = get_option('orphita_testimonial_or_reviews_user_role_key');
    $role_object = get_role($user_role);
    $first_key = '';
    if (isset($role_object->capabilities) && is_array($role_object->capabilities)) {
        reset($role_object->capabilities);
        $first_key = key($role_object->capabilities);
    } else {
        $first_key = 'manage_options';
    }
    add_menu_page('Testimonial or Reviews', 'Testimonial or Reviews', $first_key, 'orphita-testimonial-or-reviews-admin', 'orphita_testimonial_or_reviews_home');
    add_submenu_page('orphita-testimonial-or-reviews-admin', 'Testimonial or Reviews ', 'Testimonial or Reviews', $first_key, 'orphita-testimonial-or-reviews-admin', 'orphita_testimonial_or_reviews_home');
    add_submenu_page('orphita-testimonial-or-reviews-admin', 'Create New', 'Create New', $first_key, 'orphita-testimonial-or-reviews-admin-new', 'orphita_testimonial_or_reviews_new');
    add_submenu_page('orphita-testimonial-or-reviews-admin', 'Import Templates', 'Import Templates', $first_key, 'orphita-testimonial-or-reviews-admin-import', 'orphita_testimonial_or_reviews_import');
    add_submenu_page('orphita-testimonial-or-reviews-admin', 'Settings', 'Settings', 'manage_options', ORPHITA_TESTIMONIAL_OR_REVIEWS_LICENSE_PAGE, 'orphita_testimonial_or_reviews_license_page');
}

//Update To Pro
include orphita_testimonial_or_reviews_url . 'update.php';

function orphita_testimonial_or_reviews_home() {
    orphita_testimonial_or_reviews_user_capabilities();
    include orphita_testimonial_or_reviews_url . 'helper/helper.php';
    orphita_testimonial_or_reviews_home_ADMIN_CSS_JS();
    add_action('admin_enqueue_scripts', 'orphita_testimonial_or_reviews_home_ADMIN_CSS_JS');
    include orphita_testimonial_or_reviews_url . 'home.php';
}

function orphita_testimonial_or_reviews_home_ADMIN_CSS_JS() {
    wp_enqueue_script('jQuery');
    wp_enqueue_script('orphita-bootstrap-js', plugins_url('helper/bootstrap.min.js', __FILE__));
    wp_enqueue_style('orphita-bootstrap', plugins_url('helper/bootstrap.min.css', __FILE__));
    wp_enqueue_style('orphita-style', plugins_url('helper/admin.css', __FILE__));
    wp_enqueue_style('font-awesome', plugins_url('helper/font-awesome.min.css', __FILE__));
    wp_enqueue_script('orphita-vendor', plugins_url('helper/vendor.js', __FILE__));
}

function orphita_testimonial_or_reviews_new() {
    orphita_testimonial_or_reviews_user_capabilities();
    include orphita_testimonial_or_reviews_url . 'helper/helper.php';
    if (!empty($_GET['styleid']) && is_numeric($_GET['styleid'])) {
        $id = $_GET['styleid'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'oxi_div_style';
        $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $id), ARRAY_A);
        if (empty($styledata)) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
        orphita_testimonial_or_reviews_new_style_ADMIN_CSS_JS();
        add_action('admin_enqueue_scripts', 'orphita_testimonial_or_reviews_new_style_ADMIN_CSS_JS');
        orphita_testimonial_or_reviews_media_scripts();
        wp_enqueue_script('orphita-' . $styledata['style_name'] . '', plugins_url('admin-jquery/' . $styledata['style_name'] . '.js', __FILE__));
        include orphita_testimonial_or_reviews_url . 'admin/' . $styledata['style_name'] . '.php';
        orphita_testimonial_drag_drop_ajax();
        add_action('wp_print_scripts', 'orphita_testimonial_drag_drop_ajax');
    } else {
        orphita_testimonial_or_reviews_new_ADMIN_CSS_JS();
        add_action('admin_enqueue_scripts', 'orphita_testimonial_or_reviews_new_ADMIN_CSS_JS');
        include orphita_testimonial_or_reviews_url . 'layouts/index.php';
    }
}

function orphita_testimonial_drag_drop_ajax() {
    wp_enqueue_script('orphita-testimonial-drap-drop', plugins_url('helper/drag-drop.js', __FILE__));
    wp_localize_script('orphita-testimonial-drap-drop', 'orphita_testimonial_drag_drop_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}

function orphita_testimonial_or_reviews_new_ADMIN_CSS_JS() {
    wp_enqueue_script('jQuery');
    wp_enqueue_style('Open+Sans', 'https://fonts.googleapis.com/css?family=Open+Sans');
    wp_enqueue_style('orphita-admin', plugins_url('helper/admin.css', __FILE__));
    wp_enqueue_style('orphita-bootstrap', plugins_url('helper/bootstrap.min.css', __FILE__));
    wp_enqueue_style('font-awesome', plugins_url('helper/font-awesome.min.css', __FILE__));
    wp_enqueue_style('orphita-testimonial-or-reviews', plugins_url('public/style.css', __FILE__));
    wp_enqueue_script('jQuery');
    wp_enqueue_script('orphita-bootstrap', plugins_url('helper/bootstrap.min.js', __FILE__));
    wp_enqueue_script('orphita-vendor', plugins_url('helper/vendor.js', __FILE__));
}

function orphita_testimonial_or_reviews_new_style_ADMIN_CSS_JS() {
    wp_enqueue_script('jQuery');
    wp_enqueue_style('Open+Sans', 'https://fonts.googleapis.com/css?family=Open+Sans');
    wp_enqueue_style('orphita-admin', plugins_url('helper/admin.css', __FILE__));
    wp_enqueue_style('orphita-bootstrap', plugins_url('helper/bootstrap.min.css', __FILE__));
    wp_enqueue_style('font-awesome', plugins_url('helper/font-awesome.min.css', __FILE__));
    wp_enqueue_style('orphita-testimonial-or-reviews', plugins_url('public/style.css', __FILE__));
    wp_enqueue_script('jQuery');
    wp_enqueue_script('orphita-bootstrap', plugins_url('helper/bootstrap.min.js', __FILE__));
    wp_enqueue_script('orphita-color', plugins_url('helper/minicolors.js', __FILE__));
    wp_enqueue_style('orphita-color', plugins_url('helper/minicolors.css', __FILE__));
    wp_enqueue_script('orphita-font-select', plugins_url('helper/font-select.js', __FILE__));
    wp_enqueue_script('orphita-vendor', plugins_url('helper/vendor.js', __FILE__));
    wp_enqueue_script('orphita-bootstrap-growl', plugins_url('helper/jquery.bootstrap-growl.js', __FILE__));
    wp_enqueue_script('orphita-carousel-data', plugins_url('helper/carousel.js', __FILE__));
}

function orphita_testimonial_or_reviews_media_scripts() {
    wp_enqueue_media();
    wp_register_script('orphita_testimonial_or_reviews_media_scripts', plugins_url('helper/media-uploader.js', __FILE__));
    wp_enqueue_script('orphita_testimonial_or_reviews_media_scripts');
}

function orphita_testimonial_or_reviews_import() {
    orphita_testimonial_or_reviews_user_capabilities();
    include orphita_testimonial_or_reviews_url . 'helper/helper.php';
    orphita_testimonial_or_reviews_import_ADMIN_CSS_JS();
    add_action('admin_enqueue_scripts', 'orphita_testimonial_or_reviews_import_ADMIN_CSS_JS');
    include orphita_testimonial_or_reviews_url . 'layouts/import-style.php';
}

function orphita_testimonial_or_reviews_import_ADMIN_CSS_JS() {
    wp_enqueue_style('Open+Sans', 'https://fonts.googleapis.com/css?family=Open+Sans');
    wp_enqueue_style('orphita-admin', plugins_url('helper/admin.css', __FILE__));
    wp_enqueue_style('orphita-bootstrap', plugins_url('helper/bootstrap.min.css', __FILE__));
    wp_enqueue_style('orphita-font-awesome', plugins_url('helper/font-awesome.min.css', __FILE__));
    wp_enqueue_style('oxi-accordions-show', plugins_url('public/style.css', __FILE__));
    wp_enqueue_script('jQuery');
    wp_enqueue_script('orphita-bootstrap', plugins_url('helper/bootstrap.min.js', __FILE__));
    wp_enqueue_script('orphita-vendor', plugins_url('helper/vendor.js', __FILE__));
}

function orphita_testimonial_admin_ajax_data() {
    check_ajax_referer('orphita_testimonials_ajax_data', 'security');
    $list_order = sanitize_text_field($_POST['list_order']);
    $list = explode(',', $list_order);
    global $wpdb;
    $table_list = $wpdb->prefix . 'oxi_div_list';
    foreach ($list as $value) {
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $value), ARRAY_A);
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files, css) VALUES (%d, %s, %s, %s)", array($data['styleid'], $data['type'], $data['files'], $data['css'])));
        $redirect_id = $wpdb->insert_id;
        if ($redirect_id == 0) {
            die();
        }
        if ($redirect_id != 0) {
            $wpdb->query($wpdb->prepare("DELETE FROM $table_list WHERE id = %d", $value));
        }
    }
    die();
}

add_action('wp_ajax_orphita_testimonial_admin_ajax_data', 'orphita_testimonial_admin_ajax_data');

function orphita_testimonial_or_reviews_special_charecter($data) {
    $data = str_replace("\'", "'", $data);
    $data = str_replace('\"', '"', $data);
    $data = do_shortcode($data, $ignore_html = false);
    return $data;
}

function orphita_testimonial_or_reviews_admin_special_charecter($data) {
    $data = str_replace("\'", "'", $data);
    $data = str_replace('\"', '"', $data);
    return $data;
}

function orphita_testimonial_or_reviews_font_familly_charecter($data) {
    $data = str_replace('+', ' ', $data);
    $data = explode(':', $data);
    return $data[0];
}

function orphita_testimonial_or_reviews_custom_post_type_icon() {
    ?>
    <style type='text/css' media='screen'>
        #adminmenu #toplevel_page_orphita-testimonial-or-reviews-admin  div.wp-menu-image:before {
            content: "\f203";
        }
    </style>
    <?php
}

add_action('admin_head', 'orphita_testimonial_or_reviews_custom_post_type_icon');
register_activation_hook(__FILE__, 'orphita_testimonial_or_reviews_install');

function orphita_testimonial_or_reviews_install() {
    global $wpdb;
    global $oxi_div_database;

    $table_name = $wpdb->prefix . 'oxi_div_style';
    $table_list = $wpdb->prefix . 'oxi_div_list';
    $table_import = $wpdb->prefix . 'oxi_div_import';
    $charset_collate = $wpdb->get_charset_collate();

    $sql1 = "CREATE TABLE $table_name (
		id mediumint(5) NOT NULL AUTO_INCREMENT,
                name varchar(50) NOT NULL,
                type varchar(50) NOT NULL,
                style_name varchar(40) NOT NULL,
                css text,
		PRIMARY KEY  (id)
	) $charset_collate;";

    $sql2 = "CREATE TABLE $table_list (
		id mediumint(5) NOT NULL AUTO_INCREMENT,
                styleid mediumint(6) NOT NULL,
                type varchar(50),
                files text,
                css text,
		PRIMARY KEY  (id)
	) $charset_collate;";
    $sql3 = "CREATE TABLE $table_import (
		id mediumint(5) NOT NULL AUTO_INCREMENT,
                type varchar(50) NOT NULL,
                name mediumint(5) NOT NULL,                
		PRIMARY KEY  (id),
                UNIQUE unique_index (type, name)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);
    $wpdb->query("INSERT INTO {$table_import} (name, type) VALUES
        (1, 'testimonial'),
        (2, 'testimonial'),
        (3, 'testimonial')");
    add_option('oxi_div_database', $oxi_div_database);
    set_transient('_Orphita_testimonial_or_reviews_welcome_activation_redirect', true, 30);
}

add_action('admin_init', 'Orphita_testimonial_or_reviews_welcome_activation_redirect');

function Orphita_testimonial_or_reviews_welcome_activation_redirect() {
    if (!get_transient('_Orphita_testimonial_or_reviews_welcome_activation_redirect')) {
        return;
    }
    delete_transient('_Orphita_testimonial_or_reviews_welcome_activation_redirect');
    if (is_network_admin() || isset($_GET['activate-multi'])) {
        return;
    }
    wp_safe_redirect(add_query_arg(array('page' => 'orphita-testimonial-or-reviews-welcome'), admin_url('index.php')));
}

add_action('admin_menu', 'Orphita_testimonial_or_reviews_welcome_pages');

function Orphita_testimonial_or_reviews_welcome_pages() {
    add_dashboard_page(
            'Welcome To Accordions or FAQs', 'Welcome To Accordions or FAQs', 'read', 'orphita-testimonial-or-reviews-welcome', 'orphita_testimonial_or_reviews_welcome'
    );
}

function orphita_testimonial_or_reviews_welcome() {
    wp_enqueue_style('orphita-testimonial-or-reviews-welcome', plugins_url('helper/admin-welcome.css', __FILE__));
    ?>
    <div class="wrap about-wrap">
        <h1>Welcome to Testimonial or Reviews</h1>
        <div class="about-text">
            Thank you for choosing Testimonial or Reviews - the most friendly WordPress Testimonial or Reviews Plugins. Here's how to get started.
        </div>
        <h2 class="nav-tab-wrapper">
            <a class="nav-tab nav-tab-active">
                Getting Started		
            </a>
        </h2>
        <p class="about-description">
            Use the tips below to get started using Testimonial or Reviews. You will be up and running in no time.	
        </p>  
        <div class="feature-section">
            <h3>Creating Your Testimonials</h3>
            <p>Testimonial or Reviews makes it easy to create Testimonials in WordPress. You can follow the video tutorial on the right or read our how to 
                <a href="https://www.oxilab.org/docs/testimonial-or-reviews/getting-started/installing-for-the-first-time/" target="_blank" rel="noopener">Create your Testimonials guide</a>.					</p>
            <p>But in reality, the process is so intuitive that you can just start by going to <a href="<?php echo admin_url(); ?>admin.php?page=orphita-testimonial-or-reviews-admin-new">New Testimonials</a>.				</p>
            </br>
            </br>
        </div>
        <div class="feature-section">
            <h3>See all Testimonial or Reviews Features</h3>
            <p>Testimonial or Reviews is both easy to use and extremely powerful. We have tons of helpful features that allows us to give you everything you need on Testimonial or Reviews.</p>
            <p>1. Awesome Live Preview Panel</p>
            <p>1. Can Customize with Our Settings</p>
            <p>1. Easy to USE & Builtin Integration for popular Page Builder</p>
            <p><a href="https://www.oxilab.org/downloads/testimonial-or-reviews/ ‎" target="_blank" rel="noopener" class="iheu-image-features-button button button-primary">See all Features</a></p>

        </div>

    </div>
    <?php
}

add_action('admin_head', 'orphita_testimonial_or_reviews_welcome_remove_menus');

function orphita_testimonial_or_reviews_welcome_remove_menus() {
    remove_submenu_page('index.php', 'orphita-testimonial-or-reviews-welcome');
}

add_filter('widget_text', 'do_shortcode');
include orphita_testimonial_or_reviews_url . 'widget.php';

function orphita_testimonial_or_reviews_review_status() {
    $nobug = "";
    if (isset($_GET['orphita_testimonial_or_reviews_review_data'])) {
        $nobug = esc_attr($_GET['orphita_testimonial_or_reviews_review_data']);
    }
    if ('already' == $nobug) {
        add_option('orphita_review_data', $nobug);
    } elseif ('later' == $nobug) {
        $now = strtotime("now");
        update_option('orphita_review_data_active', $now);
    }
}

add_action('admin_init', 'orphita_testimonial_or_reviews_review_status');

function orphita_testimonial_or_reviews__installation_date() {
    $nobug = "";
    $nobug = get_option('orphita_review_data');
    if ($nobug != 'already') {
        $install_date = get_option('orphita_review_data_active');
        if (empty($install_date)) {
            $now = strtotime("now");
            add_option('orphita_review_data_active', $now);
        }
        $past_date = strtotime('-5 days');
        if ($past_date >= $install_date) {
            add_action('admin_notices', 'orphita_testimonial_or_reviews_review_admin_notice');
        }
    }
}

add_action('admin_init', 'orphita_testimonial_or_reviews__installation_date');

function orphita_testimonial_or_reviews_review_admin_notice() {

    // Review URL - Change to the URL of your plugin on WordPress.org
    $reviewurl = 'https://wordpress.org/plugins/testimonial-or-reviews/';

    $nobugurl = get_admin_url() . '?orphita_testimonial_or_reviews_review_data=later';
    $nobugurl2 = get_admin_url() . '?orphita_testimonial_or_reviews_review_data=already';

    echo '<div class="updated">';
    echo '<p></p>';

    printf(__('<p>Hey, You’ve using <strong>Testimonials or Reviews </strong> for more than 1 week – that’s awesome! Could you please do me a BIG favor and give it a 5-star rating on WordPress? Just to help me spread the word and boost my motivation.!
                     </p>
                    <p><a href=%s target="_blank"><strong>Ok, you deserve it</strong></a></p>
                    <p><a href=%s><strong>Nope, maybe later</strong></a> </p>
                    <p><a href=%s><strong>I already did</strong></a> </p>'), $reviewurl, $nobugurl, $nobugurl2);
    echo '<p></p>';
    echo "</div>";
}
