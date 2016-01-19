<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://heikomamerow.de
 * @since             1.0.0
 * @package           Url_List
 *
 * @wordpress-plugin
 * Plugin Name:       Url list
 * Plugin URI:        https://github.com/HeikoMamerow/url-list
 * Description:       This plugin creates a list of all pots & pages from this website in a txt file.
 * Version:           1.0.0
 * Author:            Heiko Mamerow
 * Author URI:        https://heikomamerow.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       url-list
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-url-list-activator.php
 */
function activate_url_list() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-url-list-activator.php';
    Url_List_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-url-list-deactivator.php
 */
function deactivate_url_list() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-url-list-deactivator.php';
    Url_List_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_url_list');
register_deactivation_hook(__FILE__, 'deactivate_url_list');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-url-list.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_url_list() {

    $plugin = new Url_List();
    $plugin->run();
}

run_url_list();
