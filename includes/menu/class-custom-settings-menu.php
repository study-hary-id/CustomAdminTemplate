<?php
/**
 * @package CustomAdmin
 */

require_once PLUGIN_PATH . 'includes/api/class-settings.php';
require_once PLUGIN_PATH . 'includes/api/class-admin-pages.php';
require_once PLUGIN_PATH . 'includes/api/callbacks/class-custom-callbacks.php';
require_once PLUGIN_PATH . 'includes/api/callbacks/class-general-callbacks.php';

class Custom_Settings_Menu extends Base_Controller
{
	private $page;
	private $settings;
	private $general_callbacks;

	/**
	 * Register dependencies and private data.
	 *
	 * @return void
	 */
	public function register() {
		// Order is matters here, don't try reordering.
		$this->general_callbacks = new General_Callbacks();

		$this->settings = new Settings();
		$this->set_page_settings();
		$this->set_page_fields();
		$this->set_page_sections();
		$this->settings->register();

		$this->set_page();
		$admin_page = new Admin_Pages();
		$admin_page->set_admin_page(
			$this->page['page_title'],
			$this->page['menu_title'],
			$this->page['capability'],
			$this->page['menu_slug'],
			$this->page['callback'],
			$this->page['icon_url'],
			$this->page['position']
		)->register();
	}

	/**
	 * Set the metadata of this admin page.
	 *
	 * @return void
	 */
	private function set_page()
	{
		$custom_callbacks = new Custom_Callbacks();
		$this->page       = array(
			'page_title' => 'Custom General Settings',
			'menu_title' => 'Custom Settings',
			'capability' => 'manage_options',
			'menu_slug'  => 'custom_admin_settings_general',
			'callback'   => array( $custom_callbacks, 'custom_settings' ),
			'icon_url'   => 'dashicons-admin-settings',
			'position'   => 110
		);
	}

	/**
	 * Set the settings of this admin page.
	 *
	 * @return void
	 */
	private function set_page_settings()
	{
		$args = array(
			array(
				'option_group' => 'custom_admin_settings',
				'option_name'  => 'custom_admin',
				'callback'     => array( $this->general_callbacks, 'sanitize_checkbox' )
			)
		);
		$this->settings->set_settings( $args );
	}

	/**
	 * Set the sections of this admin page.
	 *
	 * @return void
	 */
	public function set_page_sections()
	{
		$args = array(
			array(
				'id'       => 'custom_settings_manager',
				'title'    => 'Settings Manager',
				'callback' => array( $this->general_callbacks, 'section_description' ),
				'page'     => 'custom_admin_settings_general'
			)
		);
		$this->settings->set_sections( $args );
	}

	/**
	 * Set the fields of this admin page.
	 *
	 * @return void
	 */
	public function set_page_fields()
	{
		$args = array();
		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'id'       => $key,
				'title'    => $value,
				'callback' => array( $this->general_callbacks, 'fields_checkbox' ),
				'page'     => 'custom_admin_settings_general',
				'section'  => 'custom_settings_manager',
				'args'     => array(
					'option_name' => 'custom_admin',
					'label_for'   => $key
				)
			);
		}
		$this->settings->set_fields( $args );
	}
}
