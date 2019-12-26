<?php


namespace Api_Get_Movies_Core\Customize_Register;

class Customize_Register {

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'register_api_get_movies_menu' ] );
		add_action( 'admin_init', [ $this, 'register_api_get_movies_setting' ] );
	}

	public function register_api_get_movies_menu() {
		add_menu_page(
			"Api Get Movies",
			"Api Get Movies",
			"manage_options",
			"api-get-movies-settings-menu",
			[ $this, 'api_get_movies_settings' ]
		);
	}

	public function register_api_get_movies_setting() {

		add_settings_section(
			'api_options_section',
			'API settings',
			'',
			'api-get-movies-settings-menu'
		);
		add_settings_field(
			'api_key_setting',
			'Your API key',
			[$this, 'field_setting_callback'],
			'api-get-movies-settings-menu',
			'api_options_section'
		);
		register_setting(
			'api-get-movies-settings-menu',
			'api_key_setting',
			[ 'sanitize_callback' => [ $this, 'sanitize_callback' ] ]
		);
	}

	public function sanitize_callback($opt) {
		$opt = htmlspecialchars_decode( trim( $opt ) );
		if (strlen($opt) != 8) {
			add_settings_error( 'api_key_setting', '', 'API key not valid', 'error' );
			return get_option( 'api_key_setting');
		} else {
			add_settings_error( 'api_key_setting', '', 'Setting saved', 'success' );
		}
		return $opt;
	}

	function field_setting_callback() {
		echo '<input 
		name="api_key_setting" 
		type="text" value='. get_option( 'api_key_setting' ) .' />';
	}

	public function api_get_movies_settings() {
		settings_errors('api_key_setting');
		?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>

            <form action="options.php" method="POST">
				<?php
				settings_fields( "api-get-movies-settings-menu" );
				do_settings_sections( "api-get-movies-settings-menu" );
				submit_button();
				?>
            </form>
        </div>
		<?php

	}
}