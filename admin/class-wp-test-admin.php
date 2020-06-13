<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wp_Test
 * @subpackage Wp_Test/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Test
 * @subpackage Wp_Test/admin
 * @author     Dharminder Singh <dhaliwal.dharminder@yahoo.com>
 */
class Wp_Test_Admin {

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
	 * @param      string    $Wp_Test       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Wp_Test, $version ) {

		$this->Wp_Test = $Wp_Test;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {		

		wp_enqueue_style( $this->Wp_Test, plugin_dir_url( __FILE__ ) . 'css/wp-test-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'data-tables', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'sweet-alert-styles', plugin_dir_url( __FILE__ ) . 'css/sweetalert2.min.css', array(), '9.14.3', 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {		

		wp_enqueue_script( $this->Wp_Test, plugin_dir_url( __FILE__ ) . 'js/wp-test-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'tables-script', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'sweetalert-script', plugin_dir_url( __FILE__ ) . 'js/sweetalert2.all.min.js', array( 'jquery' ), '9.14.3', false );

	}

	/**
	 * Create new menu item in admin
	 * @since 1.0.0
	 * @author Dharminder SIngh
	 */
	public function registerTestTaskMenu(){
		add_menu_page( 
			__( 'Test Task','wp-test' ),
			'Test Task',
			'manage_options',
			'test-task',
			array($this,'pageHtml'),
			'dashicons-media-spreadsheet',
			6
		); 
	}

	/**
	 * Menu Item page html 
	 * @since 1.0.0
	 * @author Dharminder SIngh
	 */
	public function pageHtml(){
		$response = wp_remote_get( API_URL.'/users' );
		$users	  = array();
		
		if($response['body']){
			
			$users = json_decode($response['body']);
			include(plugin_dir_path(__FILE__).'template-parts/Users.php');
		}else{
			echo '<h2>User List Empty</h2>';
		}
	}

}