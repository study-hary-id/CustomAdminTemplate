<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Admin_Pages handles creation of admin menu,
 * submenu, and it's pages.
 */
class Admin_Pages
{
	private $admin_page;
	private $admin_subpages = array(); // Need to assign as an empty array because it needs to merge the array.

	/**
	 * Register all actions and filters to WordPress hooks.
	 *
	 * @return void
	 */
	public function register()
	{
		if ( ! empty( $this->admin_page ) ) {
			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		}
	}

	/**
	 * Add menu page and menu subpage.
	 *
	 * Add the main menu page and iterate $admin_subpages
	 * as it's submenu page.
	 *
	 * @return void
	 */
	public function add_admin_menu()
	{
		add_menu_page(
			$this->admin_page['page_title'],
			$this->admin_page['menu_title'],
			$this->admin_page['capability'],
			$this->admin_page['menu_slug'],
			$this->admin_page['callback'],
			$this->admin_page['icon_url'],
			$this->admin_page['position']
		);

		foreach ( $this->admin_subpages as $subpage ) {
			add_submenu_page(
				$subpage['parent_slug'],
				$subpage['page_title'],
				$subpage['menu_title'],
				$subpage['capability'],
				$subpage['menu_slug'],
				$subpage['callback']
			);
		}
	}

	/**
	 * Set admin page, as custom main menu page.
	 *
	 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
	 * @param string   $menu_title The text to be used for the menu.
	 * @param string   $capability The capability required for this menu to be displayed to the user.
	 * @param string   $menu_slug  The slug name to refer to this menu by. Should be unique for this menu page and only
	 *                             include lowercase alphanumeric, dashes, and underscores characters to be compatible
	 *                             with sanitize_key().
	 * @param callable $callback   Optional. The function to be called to output the content for this page.
	 * @param string   $icon_url   Optional. The URL to the icon to be used for this menu.
	 *                             * Pass a base64-encoded SVG using a data URI, which will be colored to match
	 *                               the color scheme. This should begin with 'data:image/svg+xml;base64,'.
	 *                             * Pass the name of a Dashicons helper class to use a font icon,
	 *                               e.g. 'dashicons-chart-pie'.
	 *                             * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
	 * @param int      $position   Optional. The position in the menu order this item should appear.
	 * @return $this
	 */
	public function set_admin_page(
		$page_title,
		$menu_title,
		$capability,
		$menu_slug,
		$callback = '',
		$icon_url = '',
		$position = null
	)
	{
		$this->admin_page = array(
			'page_title' => $page_title,
			'menu_title' => $menu_title,
			'capability' => $capability,
			'menu_slug'  => $menu_slug,
			'callback'   => $callback,
			'icon_url'   => $icon_url,
			'position'   => $position
		);

		return $this;
	}

	/**
	 * Set admin subpages, as a submenu of main menu page.
	 *
	 * The parameter is a multidimensional associative array and
	 * it will be merge if there are previous admin subpages.
	 *
	 * @param  array $pages
	 *
	 * @return $this
	 */
	public function set_sub_pages( $pages )
	{
		$this->admin_subpages = array_merge( $this->admin_subpages, $pages );

		return $this;
	}

	/**
	 * Set menu title of main sub page.
	 *
	 * @param string|null $menu_title
	 *
	 * @return $this
	 */
	public function with_sub_page( $menu_title = null )
	{
		if ( empty( $this->admin_page ) ) {
			return $this;
		}

		$title = $menu_title ?: $this->admin_page['menu_title'];
		$subpage = array(
			array(
				'parent_slug' => $this->admin_page['menu_slug'],
				'page_title'  => $this->admin_page['page_title'],
				'menu_title'  => $title,
				'capability'  => $this->admin_page['capability'],
				'menu_slug'   => $this->admin_page['menu_slug'],
				'callback'    => $this->admin_page['callback']
			)
		);
		$this->admin_subpages = array_merge( $subpage, $this->admin_subpages );
		return $this;
	}
}
