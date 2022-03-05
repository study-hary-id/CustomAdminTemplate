<?php

require_once PLUGIN_PATH . 'inc/Api/SettingsApi.php';

class Admin extends BaseController {
	public SettingsApi $settings;
	public array $pages;
	public array $subpages;

	/**
     * Register new pages onto WordPress administration page.
     * 
     * @return void
     */
    public function register() {
		$this->settings
		    ->addPages($this->pages)
		    ->withSubPage('Dashboard')
		    ->addSubPages($this->subpages)
		    ->register();
    }
}