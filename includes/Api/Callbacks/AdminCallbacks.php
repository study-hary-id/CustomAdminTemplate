<?php
/**
 * @package CustomAdmin
 */

require_once PLUGIN_PATH . 'includes/Base/class-base-controller.php';

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once "$this->plugin_path/templates/admin.php";
	}

	public function adminCustomPostType()
	{
		return require_once "$this->plugin_path/templates/cpt-manager.php";
	}

	public function adminTaxonomy()
	{
		return require_once "$this->plugin_path/templates/taxonomy.php";
	}

	public function adminWidget()
	{
		return require_once "$this->plugin_path/templates/widget.php";
	}

	public function alecaddOptionsGroup( $input )
	{
		return $input;
	}

	public function alecaddAdminSection()
	{
		echo 'Hello, there. This is settings.';
	}

	public function alecaddTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input 
			type="text" 
			name="text_example" 
			value="' . $value . '" 
			placeholder="Write something here" 
			class="regular-text">';
	}

	public function alecaddFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input 
			type="text" 
			name="first_name" 
			value="' . $value . '" 
			placeholder="Enter your first name" 
			class="regular-text">';
	}
}
