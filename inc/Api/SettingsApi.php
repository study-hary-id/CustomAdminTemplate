<?php

/**
 * Class SettingsApi is used to add admin menu pages to WordPress.
 */
class SettingsApi {
	public array $admin_pages;
	public array $admin_subpages = array(); // Need to assign as empty array because it needs to merge the array.

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

	/**
	 * Add new subpages to WordPress administration menu.
	 *
	 * @param array $pages
	 *
	 * @return $this
	 */
	public function addSubPages(array $pages): SettingsApi {
		$this->admin_subpages = array_merge($this->admin_subpages, $pages);
		return $this;
	}

	/**
	 * Add subpage to main custom admin menu.
	 *
	 * @param string|null $title
	 *
	 * @return $this
	 */
	public function withSubPage(string $title = null): SettingsApi {
		if (empty($this->admin_pages)) {
			return $this;
		}

		$admin_page = $this->admin_pages[0];

		$subpage = array(
			array(
				'parent_slug' => $admin_page['menu_slug'],
				'page_title' => $admin_page['page_title'],
				'menu_title' => $title ? $title : $admin_page['menu_title'],
				'capability' => $admin_page['capability'],
				'menu_slug' => $admin_page['menu_slug'],
				'callback' => $admin_page['callback']
			)
		);

		$this->admin_subpages = $subpage;
		return $this;
	}
}