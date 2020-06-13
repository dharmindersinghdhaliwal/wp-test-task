<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wp_Test
 * @subpackage Wp_Test/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Test
 * @subpackage Wp_Test/public
 * @author     Dharminder Singh <dhaliwal.dharminder@yahoo.com>
 */
class Wp_Test_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Wp_Test    The ID of this plugin.
	 */
	private $Wp_Test;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Wp_Test       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Wp_Test, $version ) {

		$this->Wp_Test = $Wp_Test;
		$this->version = $version;
		add_shortcode('diaplay_users',array($this,'get_users'));
	}	

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->Wp_Test, plugin_dir_url( __FILE__ ) . 'css/wp-test-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		
		wp_enqueue_script( $this->Wp_Test, plugin_dir_url( __FILE__ ) . 'js/wp-test-public.js', array( 'jquery' ), $this->version, false );

	}
}