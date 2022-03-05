<?php

class Enqueue extends BaseController {
    /**
     * Register all actions and filters to WordPress hooks.
     * 
     * @return void
     */
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_plugin'));
    }

    /**
     * Enqueue stylesheet and javascript files.
     * 
     * @return void
     */
    public function enqueue_plugin() {
        wp_enqueue_style('customadminstyle', $this->plugin_url . 'assets/css/style.css');
        wp_enqueue_script('customadminstyle', $this->plugin_url . 'assets/js/script.js');
    }
}