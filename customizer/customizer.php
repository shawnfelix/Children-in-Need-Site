<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package GivingPress Lite
 * @since GivingPress Lite 1.0
 */

/**
 * Begin the customizer functions.
 *
 * @param array $wp_customize Returns classes and sanitized inputs.
 */
function givingpress_lite_theme_customizer( $wp_customize ) {

	// Category Dropdown Control.
	class GivingPress_Lite_Category_Dropdown_Control extends WP_Customize_Control {

		public $type = 'dropdown-categories';

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'givingpress-lite' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}

	// Numerical Control.
	class GivingPress_Lite_Customizer_Number_Control extends WP_Customize_Control {

		public $type = 'number';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
			<?php
		}
	}

	/**
	 * Sanitize Categories.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_categories( $input ) {

		$categories = get_terms( 'category', array( 'fields' => 'ids', 'get' => 'all' ) );

		if ( in_array( $input, $categories, true ) ) {
			return $input;
		} else {
			return '';
		}
	}

	/**
	 * Sanitize Alignment.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_align( $input ) {
		$valid = array(
			'left' 		=> esc_html__( 'Left Align', 'givingpress-lite' ),
			'center' 		=> esc_html__( 'Center Align', 'givingpress-lite' ),
			'right' 	=> esc_html__( 'Right Align', 'givingpress-lite' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

	/**
	 * Sanitize Checkboxes.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_checkbox( $input ) {
		if ( 1 == $input ) {
			return 1;
		} else {
			return '';
		}
	}

	/**
	 * Sanitize Text Input.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}

	/**
	 * Sanitize Integer Input.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_integer( $input ) {
		return absint( $input );
	}

	/**
	 * Sanitize URL Input.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_url( $input ) {
		return esc_url_raw( $input );
	}

	/**
	 * Sanitize Colors.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function givingpress_lite_sanitize_color( $input ) {
		if ( preg_match( '/^#[a-f0-9]{6}$/i', $input ) ) {
			return $input;
		} else {
			return '';
		}
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since GivingPress Lite 1.0
	 * @see givingpress_lite_customize_register()
	 *
	 * @return void
	 */
	function givingpress_lite_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since GivingPress Lite 1.0
	 * @see givingpress_lite_customize_register()
	 *
	 * @return void
	 */
	function givingpress_lite_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Set site title color to be previewed in real-time.
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'givingpress_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'givingpress_lite_customize_partial_blogdescription',
		) );
	}

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

	$wp_customize->add_section( 'title_tagline' , array(
		'title'       => esc_html__( 'Site Identity', 'givingpress-lite' ),
		'priority'    => 1,
	) );

		// Logo Align.
		$wp_customize->add_setting( 'givingpress_lite_logo_align', array(
			'default' 			=> 'left',
			'sanitize_callback' => 'givingpress_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_logo_align', array(
			'type'		=> 'radio',
			'label' 	=> esc_html__( 'Logo Alignment', 'givingpress-lite' ),
			'section' 	=> 'title_tagline',
			'choices' 	=> array(
				'left' 		=> esc_html__( 'Left Align', 'givingpress-lite' ),
				'center' 	=> esc_html__( 'Center Align', 'givingpress-lite' ),
				'right' 	=> esc_html__( 'Right Align', 'givingpress-lite' ),
			),
			'priority' => 45,
		) ) );

		// Site Title Align.
		$wp_customize->add_setting( 'givingpress_lite_description_align', array(
		    'default' 			=> 'left',
		    'sanitize_callback' => 'givingpress_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_description_align', array(
		    'type' 		=> 'radio',
		    'label' 	=> esc_html__( 'Site Description Alignment', 'givingpress-lite' ),
		    'section' 	=> 'title_tagline',
		    'choices' 	=> array(
		        'left' 		=> esc_html__( 'Left Align', 'givingpress-lite' ),
		        'center' 	=> esc_html__( 'Center Align', 'givingpress-lite' ),
		        'right' 	=> esc_html__( 'Right Align', 'givingpress-lite' ),
		    ),
		    'priority' => 50,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel( 'givingpress_lite_theme_options', array(
			'priority' 			=> 1,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> esc_html__( 'Theme Options', 'givingpress-lite' ),
			'description' 		=> esc_html__( 'This panel allows you to customize specific areas of the GivingPress Lite Theme.', 'givingpress-lite' ),
		) );

		/*
		-------------------------------------------------------------------------------------------------------
			Contact Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'givingpress_lite_contact_section' , array(
			'title'     => esc_html__( 'Contact Info Bar', 'givingpress-lite' ),
			'priority'  => 100,
			'panel' 	=> 'givingpress_lite_theme_options',
		) );

		// Contact Address.
		$wp_customize->add_setting( 'givingpress_lite_contact_address', array(
			'default' => esc_html__( '231 Front Street, Lahaina, HI 96761', 'givingpress-lite' ),
			'sanitize_callback' => 'givingpress_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_contact_address', array(
			'label'		=> esc_html__( 'Company Address', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_contact_section',
			'settings'	=> 'givingpress_lite_contact_address',
			'type'		=> 'text',
			'priority' 	=> 20,
		) ) );

		// Contact Email.
		$wp_customize->add_setting( 'givingpress_lite_contact_email', array(
			'default' => esc_html__( 'info@givingpress.com', 'givingpress-lite' ),
			'sanitize_callback' => 'sanitize_email',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_contact_email', array(
			'label'		=> esc_html__( 'Company Email Address', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_contact_section',
			'settings'	=> 'givingpress_lite_contact_email',
			'type'		=> 'text',
			'priority' 	=> 40,
		) ) );

		// Contact Phone.
		$wp_customize->add_setting( 'givingpress_lite_contact_phone', array(
			'default' => esc_html__( '808.123.4567', 'givingpress-lite' ),
			'sanitize_callback' => 'givingpress_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_contact_phone', array(
			'label'			=> esc_html__( 'Company Phone Number', 'givingpress-lite' ),
			'section'		=> 'givingpress_lite_contact_section',
			'settings'	=> 'givingpress_lite_contact_phone',
			'type'			=> 'text',
			'priority' 	=> 60,
		) ) );

		// Header Search Field.
		$wp_customize->add_setting( 'givingpress_lite_display_header_search', array(
			'default' => 1,
			'sanitize_callback' => 'givingpress_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_display_header_search', array(
			'label'			=> esc_html__( 'Display Search Field?', 'givingpress-lite' ),
			'section'		=> 'givingpress_lite_contact_section',
			'settings'	=> 'givingpress_lite_display_header_search',
			'type'			=> 'checkbox',
			'priority' 	=> 80,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Home Page Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'givingpress_lite_home_section' , array(
			'title'       => esc_html__( 'Home Page Options', 'givingpress-lite' ),
			'priority'    => 102,
			'panel' => 'givingpress_lite_theme_options',
		) );

		// Donation Tagline.
		$wp_customize->add_setting( 'givingpress_lite_donation_tagline', array(
			'default' => esc_html__( 'Donations Are Welcome', 'givingpress-lite' ),
			'sanitize_callback' => 'givingpress_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_donation_tagline', array(
			'label'		=> esc_html__( 'Donation Tagline', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_donation_tagline',
			'type'		=> 'text',
			'priority' => 10,
		) ) );

		// Donation Description.
		$wp_customize->add_setting( 'givingpress_lite_donation_description', array(
			'default' => esc_html__( 'Enter a brief message about accepting donations for your cause. Edit the content in this section within the WordPress Customizer.', 'givingpress-lite' ),
			'sanitize_callback' => 'givingpress_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_donation_description', array(
			'label'		=> esc_html__( 'Donation Description', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_donation_description',
			'type'		=> 'textarea',
			'priority' => 20,
		) ) );

		// Featured Link.
		$wp_customize->add_setting( 'givingpress_lite_donation_link', array(
			'default' => esc_html__( '#', 'givingpress-lite' ),
			'sanitize_callback' => 'givingpress_lite_sanitize_url',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_donation_link', array(
			'label'		=> esc_html__( 'Donation Link', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_donation_link',
			'type'		=> 'text',
			'priority' => 30,
		) ) );

		// Featured Link Text.
		$wp_customize->add_setting( 'givingpress_lite_donation_link_text', array(
			'default' => esc_html__( 'Donate', 'givingpress-lite' ),
			'sanitize_callback' => 'givingpress_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_donation_link_text', array(
			'label'		=> esc_html__( 'Donation Link Text', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_donation_link_text',
			'type'		=> 'text',
			'priority' => 40,
		) ) );

		// Featured Page Left.
		$wp_customize->add_setting( 'givingpress_lite_page_one', array(
			'default' => '0',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_page_one', array(
			'label'		=> esc_html__( 'Featured Page Left', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_page_one',
			'type'		=> 'dropdown-pages',
			'priority' => 50,
		) ) );

		// Featured Page Middle.
		$wp_customize->add_setting( 'givingpress_lite_page_two', array(
			'default' => '0',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_page_two', array(
			'label'		=> esc_html__( 'Featured Page Middle', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_page_two',
			'type'		=> 'dropdown-pages',
			'priority' => 60,
		) ) );

		// Featured Page Right.
		$wp_customize->add_setting( 'givingpress_lite_page_three', array(
			'default' => '0',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_page_three', array(
			'label'		=> esc_html__( 'Featured Page Right', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_page_three',
			'type'		=> 'dropdown-pages',
			'priority' => 80,
		) ) );

		// Featured Page Bottom.
		$wp_customize->add_setting( 'givingpress_lite_page_four', array(
			'default' => '0',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'givingpress_lite_page_four', array(
			'label'		=> esc_html__( 'Featured Page Bottom', 'givingpress-lite' ),
			'section'	=> 'givingpress_lite_home_section',
			'settings'	=> 'givingpress_lite_page_four',
			'type'		=> 'dropdown-pages',
			'priority' => 100,
		) ) );

}
add_action( 'customize_register', 'givingpress_lite_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function givingpress_lite_customize_preview_js() {
	wp_enqueue_script( 'giving-customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'givingpress_lite_customize_preview_js' );

/**
 * Logo Resizer
 */
require get_template_directory() . '/customizer/logo-resizer.php';
