<?php

require_once PLUGIN_PATH . 'inc/Base/BaseController.php';

class AdminCallbacks extends BaseController {
	public function adminDashboard() {
		return require_once "$this->plugin_path/templates/admin.php";
	}
}