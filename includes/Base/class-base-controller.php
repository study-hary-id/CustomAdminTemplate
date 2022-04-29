<?php
/**
 * @package CustomAdmin
 */

/**
 * Base_Controller is an abstraction of Base Class and Pages.
 */
class Base_Controller
{
	public $plugin_path;
	public $plugin_url;
	public $plugin;
	public $managers;

	public function __construct()
	{
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url  = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin      = plugin_basename( dirname( __FILE__, 3 ) ) . '/custom-admin.php';

		$this->managers = array(
			'cpt_settings'      => 'Activate Custom Post Type',
			'taxonomy_settings' => 'Activate Taxonomies',
			'widget_settings'   => 'Activate Widgets'
		);
	}
}
