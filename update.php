<?php

function orphita_testimonial_or_reviews_plugin_updater() {
    $license_key = trim(get_option('orphita_testimonial_or_reviews_license_key'));
    // retrieve our license key from the DB
    // setup the updater
    $orphita_testimonial_or_reviews_updater = new ORPHITA_TESTIMONIAL_OR_REVIEWS_Plugin_Updater(ORPHITA_TESTIMONIAL_OR_REVIEWS_HOME, __FILE__, array(
        'version' => '1.0', // current version number
        'license' => $license_key, // license key (used get_option above to retrieve from DB)
        'item_name' => ORPHITA_TESTIMONIAL_OR_REVIEWS, // name of this plugin
        'author' => 'Biplob Adhikari', // author of this plugin
        'beta' => false
            )
    );
}

$status = get_option('orphita_testimonial_or_reviews_license_status');
if ($status == 'valid') {
    include( dirname(__FILE__) . '/Plugin_Updater.php' );
    add_action('admin_init', 'orphita_testimonial_or_reviews_plugin_updater', 0);
    add_action('admin_notices', 'orphita_testimonial_or_reviews_update_admin_notice');
}

function orphita_testimonial_or_reviews_license_page() {
    $license = get_option('orphita_testimonial_or_reviews_license_key');
    $status = get_option('orphita_testimonial_or_reviews_license_status');
    global $wp_roles;
    $roles = $wp_roles->get_names();
    $saved_role = get_option('orphita_testimonial_or_reviews_user_role_key');
    ?>
    <div class="wrap">
        <?php if ($status !== false && $status == 'valid') { ?>
            <div class="updated">
                <p>Thank you to Active our Plugins. Kindly wait 2-3 minute to get update notification if you using free or older version. Once you get notification please update.</p>
            </div>
        <?php }
        ?>
        <h2><?php _e('User Role'); ?></h2>
        <p>Select User Role Who Can Save Edit and Delete Testimonial or Reviews Data.</p>
        <form method="post" action="options.php">
            <table class="form-table">
                <?php settings_fields('orphita_testimonial_or_reviews_user_role'); ?>
                <tbody>
                    <tr valign="top">
                        <th scope="row" valign="top">
                            <?php _e('Who Can Edit?'); ?>
                        </th>
                        <td>
                            <select class="widefat" name="orphita_testimonial_or_reviews_user_role_key">
                                <?php foreach ($roles as $key => $role) { ?>
                                    <option value="<?php echo $key; ?>" <?php selected($saved_role, $key); ?>><?php echo $role; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>                           
                            <label class="description" for="orphita_testimonial_or_reviews_user_role"><?php _e('Select the Role who can manage Testimonial or Reviews.'); ?>
                                <a target="_blank" href="https://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table">Help</a></label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php submit_button(); ?>
        </form>
        <br>
        <br>       
        <br>
        <h2><?php _e('Product License Activation'); ?></h2>
        <p>Activate your copy to get direct plugin updates and official support.</p>
        <form method="post" action="options.php">

            <?php settings_fields('orphita_testimonial_or_reviews_license'); ?>

            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" valign="top">
                            <?php _e('License Key'); ?>
                        </th>
                        <td>
                            <input id="orphita_testimonial_or_reviews_license_key" name="orphita_testimonial_or_reviews_license_key" type="text" class="regular-text" value="<?php esc_attr_e($license); ?>" />
                            <label class="description" for="orphita_testimonial_or_reviews_license_key"><?php _e('Enter your license key'); ?></label>
                        </td>
                    </tr>
                    <?php if (!empty($license)) { ?>
                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php _e('Activate License'); ?>
                            </th>
                            <td>
                                <?php if ($status !== false && $status == 'valid') { ?>
                                    <span style="color:green;"><?php _e('active'); ?></span>
                                    <?php wp_nonce_field('orphita_testimonial_or_reviews_nonce', 'orphita_testimonial_or_reviews_nonce'); ?>
                                    <input type="submit" class="button-secondary" name="orphita_testimonial_or_reviews_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
                                    <?php
                                } else {
                                    wp_nonce_field('orphita_testimonial_or_reviews_nonce', 'orphita_testimonial_or_reviews_nonce');
                                    ?>
                                    <input type="submit" class="button-secondary" name="orphita_testimonial_or_reviews_license_activate" value="<?php _e('Activate License'); ?>"/>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php submit_button(); ?>

        </form>
        <?php
    }

    function orphita_testimonial_or_reviews_user_role_option() {
        // creates our settings in the options table
        register_setting('orphita_testimonial_or_reviews_user_role', 'orphita_testimonial_or_reviews_user_role_key');
    }

    add_action('admin_init', 'orphita_testimonial_or_reviews_user_role_option');

    function orphita_testimonial_or_reviews_register_option() {
        // creates our settings in the options table
        register_setting('orphita_testimonial_or_reviews_license', 'orphita_testimonial_or_reviews_license_key', 'orphita_testimonial_or_reviews_sanitize_license');
    }

    add_action('admin_init', 'orphita_testimonial_or_reviews_register_option');

    function orphita_testimonial_or_reviews_sanitize_license($new) {
        $old = get_option('orphita_testimonial_or_reviews_license_key');
        if ($old && $old != $new) {
            delete_option('orphita_testimonial_or_reviews_license_status'); // new license has been entered, so must reactivate
        }
        return $new;
    }

    /*     * **********************************
     * this illustrates how to activate
     * a license key
     * *********************************** */

    function orphita_testimonial_or_reviews_activate_license() {

        // listen for our activate button to be clicked
        if (isset($_POST['orphita_testimonial_or_reviews_license_activate'])) {

            // run a quick security check
            if (!check_admin_referer('orphita_testimonial_or_reviews_nonce', 'orphita_testimonial_or_reviews_nonce'))
                return; // get out if we didn't click the Activate button
// retrieve the license from the database
            $license = trim(get_option('orphita_testimonial_or_reviews_license_key'));


            // data to send in our API request
            $api_params = array(
                'edd_action' => 'activate_license',
                'license' => $license,
                'item_name' => urlencode(ORPHITA_TESTIMONIAL_OR_REVIEWS), // the name of our product in EDD
                'url' => home_url()
            );

            // Call the custom API.
            $response = wp_remote_post(ORPHITA_TESTIMONIAL_OR_REVIEWS_HOME, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));

            // make sure the response came back okay
            if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {

                if (is_wp_error($response)) {
                    $message = $response->get_error_message();
                } else {
                    $message = __('An error occurred, please try again.');
                }
            } else {

                $license_data = json_decode(wp_remote_retrieve_body($response));

                if (false === $license_data->success) {

                    switch ($license_data->error) {

                        case 'expired' :

                            $message = sprintf(
                                    __('Your license key expired on %s.'), date_i18n(get_option('date_format'), strtotime($license_data->expires, current_time('timestamp')))
                            );
                            break;

                        case 'revoked' :

                            $message = __('Your license key has been disabled.');
                            break;

                        case 'missing' :

                            $message = __('Invalid license.');
                            break;

                        case 'invalid' :
                        case 'site_inactive' :

                            $message = __('Your license is not active for this URL.');
                            break;

                        case 'item_name_mismatch' :

                            $message = sprintf(__('This appears to be an invalid license key for %s.'), ORPHITA_TESTIMONIAL_OR_REVIEWS);
                            break;

                        case 'no_activations_left':

                            $message = __('Your license key has reached its activation limit.');
                            break;

                        default :
                            $message = __('An error occurred, please try again.');
                            break;
                    }
                }
            }
            // Check if anything passed on a message constituting a failure
            if (!empty($message)) {
                $base_url = admin_url('admin.php?page=' . ORPHITA_TESTIMONIAL_OR_REVIEWS_LICENSE_PAGE);
                $redirect = add_query_arg(array('sl_activation' => 'false', 'message' => urlencode($message)), $base_url);
                wp_redirect($redirect);
                exit();
            }
            // $license_data->license will be either "valid" or "invalid"
            update_option('orphita_testimonial_or_reviews_license_status', $license_data->license);
            wp_redirect(admin_url('admin.php?page=' . ORPHITA_TESTIMONIAL_OR_REVIEWS_LICENSE_PAGE));
            exit();
        }
    }

    add_action('admin_init', 'orphita_testimonial_or_reviews_activate_license');
    /*     * *********************************************
     * Illustrates how to deactivate a license key.
     * This will decrease the site count
     * ********************************************* */

    function orphita_testimonial_or_reviews_deactivate_license() {
        // listen for our activate button to be clicked
        if (isset($_POST['orphita_testimonial_or_reviews_license_deactivate'])) {
            // run a quick security check
            if (!check_admin_referer('orphita_testimonial_or_reviews_nonce', 'orphita_testimonial_or_reviews_nonce'))
                return; // get out if we didn't click the Activate button
// retrieve the license from the database
            $license = trim(get_option('orphita_testimonial_or_reviews_license_key'));
            // data to send in our API request
            $api_params = array(
                'edd_action' => 'deactivate_license',
                'license' => $license,
                'item_name' => urlencode(ORPHITA_TESTIMONIAL_OR_REVIEWS), // the name of our product in EDD
                'url' => home_url()
            );
            // Call the custom API.
            $response = wp_remote_post(ORPHITA_TESTIMONIAL_OR_REVIEWS_HOME, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));
            // make sure the response came back okay
            if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
                if (is_wp_error($response)) {
                    $message = $response->get_error_message();
                } else {
                    $message = __('An error occurred, please try again.');
                }
                $base_url = admin_url('admin.php?page=' . ORPHITA_TESTIMONIAL_OR_REVIEWS_LICENSE_PAGE);
                $redirect = add_query_arg(array('sl_activation' => 'false', 'message' => urlencode($message)), $base_url);
                wp_redirect($redirect);
                exit();
            }
            // decode the license data
            $license_data = json_decode(wp_remote_retrieve_body($response));
            // $license_data->license will be either "deactivated" or "failed"
            if ($license_data->license == 'deactivated') {
                delete_option('orphita_testimonial_or_reviews_license_status');
            }
            wp_redirect(admin_url('admin.php?page=' . ORPHITA_TESTIMONIAL_OR_REVIEWS_LICENSE_PAGE));
            exit();
        }
    }

    add_action('admin_init', 'orphita_testimonial_or_reviews_deactivate_license');
    /*     * **********************************
     * this illustrates how to check if
     * a license key is still valid
     * the updater does this for you,
     * so this is only needed if you
     * want to do something custom
     * *********************************** */

    function orphita_testimonial_or_reviews_check_license() {
        global $wp_version;
        $license = trim(get_option('orphita_testimonial_or_reviews_license_key'));
        $api_params = array(
            'edd_action' => 'check_license',
            'license' => $license,
            'item_name' => urlencode(ORPHITA_TESTIMONIAL_OR_REVIEWS),
            'url' => home_url()
        );
        // Call the custom API.
        $response = wp_remote_post(ORPHITA_TESTIMONIAL_OR_REVIEWS_HOME, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));
        if (is_wp_error($response))
            return false;
        $license_data = json_decode(wp_remote_retrieve_body($response));
        if ($license_data->license == 'valid') {
            echo 'valid';
            exit;
            // this license is still valid
        } else {
            echo 'invalid';
            exit;
            // this license is no longer valid
        }
    }

    /**
     * This is a means of catching errors from the activation method above and displaying it to the customer
     */
    function orphita_testimonial_or_reviews_admin_notices() {
        if (isset($_GET['sl_activation']) && !empty($_GET['message'])) {

            switch ($_GET['sl_activation']) {

                case 'false':
                    $message = urldecode($_GET['message']);
                    ?>
                    <div class="error">
                        <p><?php echo $message; ?></p>
                    </div>
                    <?php
                    break;

                case 'true':
                default:
                    // Developers can put a custom success message here for when activation is successful if they way.
                    break;
            }
        }
    }

    add_action('admin_notices', 'orphita_testimonial_or_reviews_admin_notices');

    function orphita_testimonial_or_reviews_update_admin_notice() {

        // Review URL - Change to the URL of your plugin on WordPress.org      
        $pluginpage = get_admin_url() . '/plugins.php';
        $Oxilab = 'https://www.oxilab.org/contact-us/';
        echo '<div class="updated">';
        echo '<p></p>';

        printf(__('<p>Hey, Thank you for using <strong>Testimonials or Reviews </strong>! There are an Important update for You as our Premium Customer. Kindly Check Into Your <a href=%s><strong>Plugins Menu</strong></a>. If not get kindly wait 3-10 minute and check again hope you will get update notifiction. later any trouble to Update or anythings more kindly Contact via <a href=%s><strong>Oxilab Support</strong></a>.
                     </p>
                    <p>Thank You</p>'), $pluginpage, $Oxilab);
        echo '<p></p>';
        echo "</div>";
    }
    