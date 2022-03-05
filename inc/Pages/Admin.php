<?php

class Admin extends BaseController {
    /**
     * Register all actions and filters to WordPress hooks.
     * 
     * @return void
     */
    public function register() {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    /**
     * Add/register new menu on admin side-bar.
     * 
     * @return void
     */
    public function add_admin_pages() {
        add_menu_page(
            'Custom Admin',
            'Custom Admin',
            'manage_options',
            'custom_admin',
            array($this, 'admin_index'),
            'dashicons-store',
            110
        );
    }

    /**
     * Import template as a view on admin page.
     * 
     * @return void
     */
    public function admin_index() {
        require_once $this->plugin_path . 'templates/admin.php';
    }
}