<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Settings_Links creates custom links.
 */
class Settings_Links extends Base_Controller {
    /**
     * Register methods to WordPress hooks.
     * 
     * @return void
     */
    public function register() {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    /**
     * Add custom link onto plugin list.
     * 
     * @param  array $links List of necessary links.
     * @return array        Return list after added a new link element.
     */
    public function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=custom_admin_settings_general">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}
