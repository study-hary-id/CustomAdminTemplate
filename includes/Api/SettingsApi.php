<?php
/**
 * @package CustomAdmin
 */

/**
 * Class SettingsApi is used to add admin menu pages to WordPress.
 */
class SettingsApi
{
	public $admin_pages;
	public $admin_subpages = array(); // Need to assign as empty array because it needs to merge the array.

	/**
	 * Register all actions and filters on this class to WordPress hooks.
	 *
	 * @return void
	 */
	public function register()
	{
		if ( ! empty( $this->admin_pages ) ) {
			add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
		}
	}

	/**
	 * Register $admin_pages by executing add_menu_page and add_menu_subpage.
	 *
	 * @return void
	 */
	public function addAdminMenu()
	{
		foreach ( $this->admin_pages as $page ) {
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

		foreach ( $this->admin_subpages as $page ) {
			add_submenu_page(
				$page['parent_slug'],
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback']
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
	public function addPages( $pages )
	{
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
	public function addSubPages( $pages )
	{
		$this->admin_subpages = array_merge( $this->admin_subpages, $pages );

		return $this;
	}

	/**
	 * Add subpage to main custom admin menu.
	 *
	 * @param string|null $title
	 *
	 * @return $this
	 */
	public function withSubPage( $title = null )
	{
		if ( empty( $this->admin_pages ) ) {
			return $this;
		}

		$admin_page = $this->admin_pages[0];

		$subpage = array(
			array(
				'parent_slug' => $admin_page['menu_slug'],
				'page_title'  => $admin_page['page_title'],
				'menu_title'  => $title ? $title : $admin_page['menu_title'],
				'capability'  => $admin_page['capability'],
				'menu_slug'   => $admin_page['menu_slug'],
				'callback'    => $admin_page['callback']
			)
		);

		$this->admin_subpages = $subpage;

		return $this;
	}
}
