<?php
/**
 * @package CustomAdmin
 */

require_once PLUGIN_PATH . 'includes/base/class-base-controller.php';

final class InitCustomAdmin
{
	/**
	 * Initialize a class.
	 *
	 * @param  $class
	 *
	 * @return mixed
	 */
	private static function instantiate($class)
	{
		return new $class;
	}

	/**
	 * Return all available services.
	 *
	 * @return array Array containing a list of services.
	 */
	public static function get_services()
	{
		require_once PLUGIN_PATH . 'includes/menu/class-custom-settings-menu.php';
		return array( Custom_Settings_Menu::class );
	}

	/**
	 * Register all available services.
	 *
	 * Loop through the list of services, initialize them,
	 * and call the register() method if it exists.
	 *
	 * @return void
	 */
	public static function register_services()
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}
}
