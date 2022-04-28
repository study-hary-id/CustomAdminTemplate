<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Custom_Callbacks is general custom admin callbacks.
 *
 * The Custom_ name is from custom-admin name, this class
 * provide default templates for Custom_Settings_Menu.
 *
 */
class Custom_Callbacks extends Base_Controller
{
	public function custom_settings()
	{
		require_once $this->plugin_path . 'templates/custom-general-settings.php';
	}

	public function custom_post_type()
	{
		require_once $this->plugin_path . 'templates/cpt-settings.php';
	}

	public function taxonomies()
	{
		require_once $this->plugin_path . 'templates/taxonomies-settings.php';
	}

	public function widgets()
	{
		require_once $this->plugin_path . 'templates/widget-settings.php';
	}
}
