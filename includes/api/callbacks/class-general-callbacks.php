<?php
/**
 * @package CustomAdmin
 */

/**
 * Class General_Callbacks contains all callbacks of custom general settings.
 */
class General_Callbacks extends Base_Controller
{
	/**
	 * Sanitizes checked checkbox element.
	 *
	 * Loop through registered managers (settings),
	 * check if there are available values then set each value to $output.
	 *
	 * @param  array $input
	 *
	 * @return array
	 */
	public function sanitize_checkbox( $input )
	{
		$output = array();
		foreach ( $this->managers as $key => $value ) {
			$output[ $key ] = isset( $input[ $key ] );
		}
		return $output;
	}

	public function section_description()
	{
		echo 'Manage the sections and features of this plugin by activating the checkboxes from the following list.';
	}

	/**
	 * Display checkbox to each field within section.
	 *
	 * @param array $args
	 *
	 * @return void
	 */
	public function fields_checkbox( $args )
	{
		$option_name = $args['option_name'];
		$id = $args['label_for'];
		$checkbox = get_option( $option_name );
		$checked = isset( $checkbox[ $id ]) ? ($checkbox[ $id ] ? 'checked' : '') : '';
		echo '<input 
			id="' . $id . '" 
			name="' . $option_name . '[' . $id . ']" 
			type="checkbox" 
			value="1"
			' . $checked . '
		>';
	}
}
