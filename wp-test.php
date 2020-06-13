<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Wp_Test
 *
 * @wordpress-plugin
 * Plugin Name:       WP Test Task
 * Plugin URI:        #
 * Description:       A wp test task by inpsyde.
 * Version:           1.0.0
 * Author:            Dharminder Singh
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//define constants
define('API_URL','https://jsonplaceholder.typicode.com');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-test-activator.php
 */
function activate_Wp_Test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-test-activator.php';
	Wp_Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-test-deactivator.php
 */
function deactivate_Wp_Test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-test-deactivator.php';
	Wp_Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Wp_Test' );
register_deactivation_hook( __FILE__, 'deactivate_Wp_Test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Wp_Test() {

	$plugin = new Wp_Test();
	$plugin->run();

}
run_Wp_Test();