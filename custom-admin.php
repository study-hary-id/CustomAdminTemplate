<?php
/**
 * @package CustomAdmin
 */
/**
 * Plugin Name:       Custom Admin
 * Plugin URI:        https://github.com/study-hary-id/CustomAdminTemplate
 * Description:       Plugin that customize WordPress administration page and make it modular.
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      5.6
 * Author:            Muhammad Haryansyah
 * Author URI:        https://study-hary-id.github.io
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-admin
 */
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

if ( ! defined('ABSPATH' ) ) {
	die( '-1' );
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once PLUGIN_PATH . 'includes/Init.php';
require_once PLUGIN_PATH . 'includes/Base/Activation.php';
require_once PLUGIN_PATH . 'includes/Base/Deactivation.php';

/**
 * Handle activations of the plugin.
 */
function activate_custom_admin() {
    Activation::activate();
}
register_activation_hook( __FILE__, 'activate_custom_admin' );

/**
 * Handle deactivations of the plugin.
 */
function deactivate_custom_admin() {
    Deactivation::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_custom_admin' );

/**
 * Initialize and register all of the services.
 */
if ( class_exists( 'Init' ) ) {
    Init::register_services();
}
