<?php

require_once PLUGIN_PATH . 'inc/Api/SettingsApi.php';

class Admin extends BaseController {
	public SettingsApi $settings;
	public array $pages;
	public array $subpages;

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

		$this->subpages = array(
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title' => 'Custom Post Type',
				'menu_title' => 'CPT Manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_cpt',
				'callback' => function () { echo '<h1>Custom Post Type</h1>'; }
			),
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title' => 'Custom Taxonomy',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_taxonomy',
				'callback' => function () { echo '<h1>Taxonomies Manager</h1>'; }
			),
			array(
				'parent_slug' => 'alecadd_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'alecadd_widget',
				'callback' => function () { echo '<h1>Widgets Manager</h1>'; }
			)
		);
	}

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