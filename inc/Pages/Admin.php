<?php

require_once PLUGIN_PATH . 'inc/Api/SettingsApi.php';

class Admin extends BaseController {
	public SettingsApi $settings;
	public array $pages;

	public function __construct() {
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'Alecadd Plugin',
				'menu_title' => 'Alecadd',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_plugin',
				'callback' => function () { echo '<h1>Plugin</h1>'; },
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	/**
     * Register new pages onto WordPress administration page.
     * 
     * @return void
     */
    public function register() {
    	$this->settings->addPages($this->pages)->register();
    }
}