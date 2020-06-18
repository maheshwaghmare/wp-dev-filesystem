<?php
/**
 * WP Dev Files
 *
 * How to use?
 *
 * // Works
 * wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\test.txt', 'Hello World' );
 * wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\new-directory\test.txt', 'Hello World' );
 * 
 * // Not works.
 * wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\dir1\dir2\test.txt', 'Hello World' );
 * wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\dir1\dir2\dir3\test.txt', 'Hello World' );
 *
 * @package WP Dev File System
 * @since 1.0.0
 */

if ( ! class_exists( 'WP_Dev_FileSystem' ) ) :

	/**
	 * File System
	 *
	 * @since 1.0.0
	 */
	class WP_Dev_FileSystem {

		/**
		 * Instance
		 *
		 * @var instance Class Instance.
		 * @access private
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {}

		/**
		 * Generate file
		 *
		 * @since  1.0.0
		 * 
		 * @param  string $file    Genearte the file.
		 * @param  string $content File contents.
		 * @return void
		 */
		public function generate_file( $file = '', $content = '' ) {
			if ( empty( $file ) || empty( $content ) ) {
				return;
			}

			if( false === $this->get_filesystem()->is_dir( $file ) ) {
				$this->get_filesystem()->mkdir( dirname( $file ) );
			}

			$this->get_filesystem()->put_contents( $file, $content );
		}

		/**
		 * Get an instance of WP_Filesystem_Direct.
		 *
		 * @since 1.0.0
		 * @return object A WP_Filesystem_Direct instance.
		 */
		public function get_filesystem() {
			global $wp_filesystem;

			require_once ABSPATH . '/wp-admin/includes/file.php';

			WP_Filesystem();

			return $wp_filesystem;
		}

		/**
		 * Get content
		 *
		 * @since  1.0.0
		 * 
		 * @param  string $file    Genearte the file.
		 * @return mixed
		 */
		public function get_contents( $file = '' ) {
			if ( empty( $file ) ) {
				return;
			}

			return $this->get_filesystem()->get_contents( $file );
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	WP_Dev_FileSystem::get_instance();

endif;

if( ! function_exists( 'wp_dev_fs_create_file' ) ) {
	/**
	 * Generate file
	 * 
	 * @since  1.0.0
	 * 
	 * @param  string $file    Genearte the file.
	 * @param  string $content File contents.
	 * @return void
	 */
	function wp_dev_fs_create_file( $file = '', $content = '' ) {
		WP_Dev_FileSystem::get_instance()->generate_file( $file, $content );
	}
}

if( ! function_exists( 'wp_dev_fs_get_content' ) ) {
	/**
	 * Generate file
	 * 
	 * @since  1.0.0
	 * 
	 * @param  string $file    Genearte the file.
	 * @param  string $content File contents.
	 * @return void
	 */
	function wp_dev_fs_get_content( $file = '' ) {
		WP_Dev_FileSystem::get_instance()->get_contents( $file );
	}
}
