<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Settings provides settings utilities.
 *
 * This used to setup any settings, sections, and
 * fields of each menu page and submenu page.
 */
class Settings
{
	private $settings;
	private $sections;

	// Custom fields is an options, they will insert the data to database.
	private $fields;

	/**
	 * Register methods to WordPress hooks.
	 *
	 * Executes methods on particular WordPress actions and filters.
	 *
	 * @return void
	 */
	public function register()
	{
		if ( ! empty( $this->settings ) ) {
			add_action( 'admin_init', array( $this, 'register_settings' ) );
		}
	}

	/**
	 * Register settings, sections, and fields.
	 *
	 * @return void
	 */
	public function register_settings()
	{
		foreach ( $this->settings as $setting ) {
			$callback = isset( $setting['callback'] ) ? $setting['callback'] : array();
			register_setting(
				$setting['option_group'],
				$setting['option_name'],
				$callback
			);
		}

		foreach ( $this->sections as $section ) {
			$callback = isset( $section['callback'] ) ? $section['callback'] : array();
			add_settings_section(
				$section['id'],
				$section['title'],
				$callback,
				$section['page']
			);
		}

		foreach ( $this->fields as $field ) {
			$callback = isset( $field['callback'] ) ? $field['callback'] : array();
			$args = isset( $field['args'] ) ? $field['args'] : array();
			add_settings_field(
				$field['id'],
				$field['title'],
				$callback,
				$field['page'],
				$field['section'],
				$args
			);
		}
	}

	/**
	 * Set settings property.
	 *
	 * @param $settings
	 *
	 * @return $this
	 */
	public function set_settings( $settings )
	{
		$this->settings = $settings;

		return $this;
	}

	/**
	 * Set sections property.
	 *
	 * @param $sections
	 *
	 * @return $this
	 */
	public function set_sections( $sections )
	{
		$this->sections = $sections;

		return $this;
	}

	/**
	 * Set fields property.
	 *
	 * @param $fields
	 *
	 * @return $this
	 */
	public function set_fields( $fields )
	{
		$this->fields = $fields;

		return $this;
	}
}
