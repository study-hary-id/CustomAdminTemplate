<?php

/*
Plugin Name:    Custom Admin
Plugin URI:     http://URI_Of_Page_Describing_Plugin_and_Updates
Description:    Plugin that customize WordPress administration page.
Version:        1.0
Author:         Muhammad Haryansyah
Author URI:     http://URI_Of_The_Plugin_Author
License:        GPLv2
Text Domain:    custom-admin
*/

if (!defined('ABSPATH')) {
    die('-1');
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once PLUGIN_PATH . 'inc/Init.php';
require_once PLUGIN_PATH . 'inc/Base/Activation.php';
require_once PLUGIN_PATH . 'inc/Base/Deactivation.php';

/**
 * Handle activations of the plugin.
 */
function activate_custom_admin() {
    Activation::activate();
}
register_activation_hook(__FILE__, 'activate_custom_admin');

/**
 * Handle deactivations of the plugin.
 */
function deactivate_custom_admin() {
    Deactivation::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_custom_admin');

/**
 * Initiliaze and register all of the services.
 */
if (class_exists('Init')) {
    Init::register_services();
}
