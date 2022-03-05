<?php

/**
 * Class SettingsApi is used to add admin menu pages to WordPress.
 */
class SettingsApi {
	public array $admin_pages = array();

	/**
	 * Register all actions and filters on this class to WordPress hooks.
	 *
	 * @return void
	 */
	public function register() {
		if (!empty($this->admin_pages)) {
			add_action('admin_menu', array($this, 'addAdminMenu'));
		}
	}

	/**
	 * Register $admin_pages in to WordPress admin menu.
	 *
	 * @return void
	 */
	public function addAdminMenu() {
		foreach($this->admin_pages as $page) {
			add_menu_page(
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback'],
				$page['icon_url'],
				$page['position']
			);
		}
	}

	/**
	 * Add new pages to WordPress administration page.
	 *
	 * @param array $pages
	 *
	 * @return $this
	 */
	public function addPages(array $pages): SettingsApi {
		$this->admin_pages = $pages;
		return $this;
	}
}