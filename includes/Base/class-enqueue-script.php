<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Enqueue include stylesheet and javascript files.
 */
class Enqueue_Script extends Base_Controller
{
    /**
     * Register methods to WordPress hooks.
     * 
     * @return void
     */
    public function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );
    }

    /**
     * Enqueue stylesheet and javascript files.
     * 
     * @return void
     */
    public function enqueue() {
        wp_enqueue_style('custom_admin_style', $this->plugin_url . 'assets/css/style.css');
        wp_enqueue_script('custom_admin_script', $this->plugin_url . 'assets/js/script.js');
    }
}
