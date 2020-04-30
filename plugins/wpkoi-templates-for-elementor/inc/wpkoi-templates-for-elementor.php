<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPKoi_Elementor_Lite_Templates_Manager' ) ) {

	/**
	 * Define WPKoi_Elementor_Lite_Templates_Manager class
	 */
	class WPKoi_Elementor_Lite_Templates_Manager {

		/**
		 * A reference to an instance of this class.
		 *
		 */
		private static $instance = null;

		/**
		 * Template option name
		 */
		protected $option = 'wpkoi_elementor_categories';

		/**
		 * Constructor for the class
		 */
		public function init() {

			// Register wpkoi-templates source
			add_action( 'elementor/init', array( $this, 'register_templates_source' ) );

			if ( defined( 'Elementor\Api::LIBRARY_OPTION_KEY' ) ) {
				// Add WPKoi templates to Elementor templates list
				add_filter( 'option_' . Elementor\Api::LIBRARY_OPTION_KEY, array( $this, 'prepend_categories' ) );
			}

			// Process template request
			if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.2.8', '>' ) ) {
				add_action( 'elementor/ajax/register_actions', array( $this, 'register_ajax_actions' ), 20 );
			} else {
				add_action( 'wp_ajax_elementor_get_template_data', array( $this, 'force_wpkoi_template_source' ), 0 );
			}
		}

		/**
		 * Register
		 */
		public function register_templates_source() {

			require WPKOI_TEMPLATES_FOR_ELEMENTOR_DIRECTORY . 'inc/wpkoi-templates-for-elementor-source.php';

			$elementor = Elementor\Plugin::instance();
			$elementor->templates_manager->register_source( 'WPKoi_Elementor_Lite_Templates_Source' );

		}

		/**
		 * Return transient key
		 */
		public function transient_key() {
			return $this->option . '_' . WPKOI_TEMPLATES_FOR_ELEMENTOR_VERSION;
		}

		/**
		 * Retrieves categories list
		 */
		public function get_categories() {

			$categories = get_transient( $this->transient_key() );

			if ( ! $categories ) {
				$categories = $this->remote_get_categories();
				set_transient( $this->transient_key(), $categories, WEEK_IN_SECONDS );
			}

			return $categories;
		}

		/**
		 * Get categories
		 */
		public function remote_get_categories() {

			$url      = WPKOI_TEMPLATES_FOR_ELEMENTOR_URL . 'json/categories.json';
			$response = wp_remote_get( $url, array( 'timeout' => 60 ) );
			$body     = wp_remote_retrieve_body( $response );
			$body     = json_decode( $body, true );

			return ! empty( $body['data'] ) ? $body['data'] : array();

		}

		/**
		 * Add templates to Elementor templates list
		 */
		public function prepend_categories( $library_data ) {

			$categories = $this->get_categories();

			if ( ! empty( $categories ) ) {

				if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.3.9', '>' ) ) {
					$library_data['types_data']['block']['categories'] = array_merge( $categories, $library_data['types_data']['block']['categories'] );
				} else {
					$library_data['categories'] = array_merge( $categories, $library_data['categories'] );
				}

				return $library_data;

			} else {
				return $library_data;
			}

		}

		/**
		 * Register AJAX actions
		 */
		public function register_ajax_actions( $ajax ) {
			if ( ! isset( $_REQUEST['actions'] ) ) {
				return;
			}

			$actions = json_decode( stripslashes( $_REQUEST['actions'] ), true );
			$data    = false;

			foreach ( $actions as $id => $action_data ) {
				if ( ! isset( $action_data['get_template_data'] ) ) {
					$data = $action_data;
				}
			}

			if ( ! $data ) {
				return;
			}

			if ( ! isset( $data['data'] ) ) {
				return;
			}

			$data = $data['data'];

			if ( empty( $data['template_id'] ) ) {
				return;
			}

			if ( false === strpos( $data['template_id'], 'wpkoi_' ) ) {
				return;
			}

			$ajax->register_ajax_action( 'get_template_data', array( $this, 'get_wpkoi_template_data' ) );
		}

		/**
		 * Get template data.
		 */
		public function get_wpkoi_template_data( $args ) {

			$source = Elementor\Plugin::instance()->templates_manager->get_source( 'wpkoi-templates' );

			$data = $source->get_data( $args );

			return $data;
		}

		/**
		 * Return template data insted of elementor template.
		 */
		public function force_wpkoi_template_source() {

			if ( empty( $_REQUEST['template_id'] ) ) {
				return;
			}

			if ( false === strpos( $_REQUEST['template_id'], 'wpkoi_' ) ) {
				return;
			}

			$_REQUEST['source'] = 'wpkoi-templates';

		}

		/**
		 * Returns the instance.
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}

}

/**
 * Returns instance of WPKoi_Elementor_Lite_Templates_Manager
 *
 * @return object
 */
function wpkoi_templates_for_elementor_manager_init() {
	return WPKoi_Elementor_Lite_Templates_Manager::get_instance();
}
wpkoi_templates_for_elementor_manager_init()->init();