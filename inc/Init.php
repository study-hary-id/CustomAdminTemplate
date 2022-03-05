<?php

require_once PLUGIN_PATH . 'inc/Base/BaseController.php';

final class Init {
    /**
     * Initialize a class.
     * 
     * @param class $class      Class from the services array.
     * @return class instance   New instance of a class.
     */
    private static function instantiate($class) {
	    return new $class;
    }

    /**
     * Store all the classes inside an array.
     * 
     * @return array Full list of classes.
     */
    public static function get_services() {
        require_once PLUGIN_PATH . 'inc/Pages/Admin.php';
        require_once PLUGIN_PATH . 'inc/Base/Enqueue.php';
        require_once PLUGIN_PATH . 'inc/Base/SettingsLinks.php';
        return [
            Admin::class,
            Enqueue::class,
            SettingsLinks::class
        ];
    }

    /**
     * Summary.
     * 
     * Loop through the classes, initialize them,
     * and call the register() method if it exists.
     * 
     * @return void
     */
    public static function register_services() {
        foreach(self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
}