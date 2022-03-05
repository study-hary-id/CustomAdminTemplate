<?php

class SettingsLinks extends BaseController {
    /**
     * Register all actions and filters to WordPress hooks.
     * 
     * @return void
     */
    public function register() {
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    /**
     * Add custom link onto plugin list.
     * 
     * @param array $links  List of necessary links.
     * @return array        Return list after added a new link element.
     */
    public function settings_link(array $links): array {
        $settings_link = '<a href="admin.php?page=alecadd_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}