<?php
/**
 * @package CustomAdmin
 */

require_once PLUGIN_PATH . 'includes/Base/BaseController.php';

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

	public function alecaddOptionGroup( $input )
	{
		return $input;
	}
}
