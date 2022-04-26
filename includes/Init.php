<?php
/**
 * @package CustomAdmin
 */

require_once PLUGIN_PATH . 'includes/Base/BaseController.php';

final class Init
{
	/**
	 * Initialize a class.
	 *
	 * @param class  $class     Class from the services array.
	 * @return class instance   New instance of a given class.
	 */
	private static function instantiate($class)
	{
		$service = new $class;
		return $service;
	}

	/**
	 * Return all available services.
	 *
	 * @return array Array containing a list of services.
	 */
	public static function get_services()
	{
		require_once PLUGIN_PATH . 'includes/Pages/Admin.php';
//		require_once PLUGIN_PATH . 'includes/Base/Enqueue.php';
//		require_once PLUGIN_PATH . 'includes/Base/SettingsLinks.php';
		return [
			Admin::class,
//			Enqueue::class,
//			SettingsLinks::class
		];
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
