<?php
/**
 * @package CustomAdmin
 */

require_once PLUGIN_PATH . 'includes/Api/SettingsApi.php';
require_once PLUGIN_PATH . 'includes/Api/Callbacks/AdminCallbacks.php';

/**
 * Class Admin is used to control custom modular administration page.
 */
class Admin extends BaseController
{
	public $settings;
	public $pages;
	public $subpages;
	public $callbacks;

	/**
	 * Register new pages onto WordPress administration page.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->settings
			->addPages( $this->pages )
			->withSubPage( 'Dashboard' )
			->addSubPages( $this->subpages )
			->register();
	}

	/**
	 * Set the main pages of the plugin.
	 *
	 * @return void
	 */
	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Alecadd Plugin',
				'menu_title' => 'Alecadd',
				'capability' => 'manage_options',
				'menu_slug'  => 'alecadd_plugin',
				'callback'   => array( $this->callbacks, 'adminDashboard' ),
				'icon_url'   => 'dashicons-store',
				'position'   => 110
			)
		);
	}

	/**
	 * Set the submenu of the main pages within the plugin.
	 *
	 * @return void
	 */
	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title'  => 'Custom Post Type',
				'menu_title'  => 'CPT Manager',
				'capability'  => 'manage_options',
				'menu_slug'   => 'alecadd_cpt',
				'callback'    => function () {
					echo '<h1>Custom Post Type</h1>';
				}
			),
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title'  => 'Custom Taxonomy',
				'menu_title'  => 'Taxonomies',
				'capability'  => 'manage_options',
				'menu_slug'   => 'alecadd_taxonomy',
				'callback'    => function () {
					echo '<h1>Taxonomies Manager</h1>';
				}
			),
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title'  => 'Custom Widgets',
				'menu_title'  => 'Widgets',
				'capability'  => 'manage_options',
				'menu_slug'   => 'alecadd_widget',
				'callback'    => function () {
					echo '<h1>Widgets Manager</h1>';
				}
			)
		);
	}
}
