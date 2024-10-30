<?php 

/* Enhance WordPress customizer */

function jsl_enhance_customizer( $wp_customize ) {

	// Create customizer section.
	$wp_customize->add_section(
		'jsl_section',
		array(
			'title'    => esc_html__( 'Exit intent popup', 'jsl-exit-intent-popup' ),
			'priority' => 1,
			//'panel'    => '',
		)
	);

	// Enable Exit Intent Popup.
	$wp_customize->add_setting(
		'jsl_enable_popup',
		array(
			'default' => true,
			'type'    => 'option',
			'sanitize_callback' => 'jsl_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'jsl_enable_popup',
		array(
			'label'   => esc_html__( 'Enable popup', 'jsl-exit-intent-popup' ),
			'section' => 'jsl_section',
			'type'    => 'checkbox',			
		)
	);

	// Cookies exspiration.
	$wp_customize->add_setting(
		'jsl_cookies',
		array(
			'default' => 1,
			'type'    => 'option',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'jsl_cookies',
		array(
			'label'   => esc_html__( 'Cookies exspiration', 'jsl-exit-intent-popup' ),
			'section' => 'jsl_section',
			'type'    => 'number',			
		)
	);

	// Height of the box.
	$wp_customize->add_setting(
		'jsl_box_height',
		array(
			'default' => 200,
			'type'    => 'option',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'jsl_box_height',
		array(
			'label'   => esc_html__( 'Height of the pop-up box', 'jsl-exit-intent-popup' ),
			'section' => 'jsl_section',
			'type'    => 'number',			
		)
	);

	// Width of the box.
	$wp_customize->add_setting(
		'jsl_box_width',
		array(
			'default' => 200,
			'type'    => 'option',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'jsl_box_width',
		array(
			'label'   => esc_html__( 'Width of the pop-up box', 'jsl-exit-intent-popup' ),
			'section' => 'jsl_section',
			'type'    => 'number',			
		)
	);

	// Message of the EIP.
	$wp_customize->add_setting(
		'jsl_message',
		array(
			'default' => 'Here comes the text of the pop-up',
			'type'    => 'option',
		)
	);
	$wp_customize->add_control(
		'jsl_message',
		array(
			'label'   => esc_html__( 'HTML for the pop-up', 'jsl-exit-intent-popup' ),
			'section' => 'jsl_section',
			'type'    => 'textarea',
		)
	);
	
	// CSS for EIP. ".
	$wp_customize->add_setting(
		'jsl_css',
		array(
			'default' => 'The popup element you wish to use must have an id of bio_ep.',
			'type'    => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);
	$wp_customize->add_control(
		'jsl_css',
		array(
			'label'   => esc_html__( 'CSS for the popup. Must have the id of #bio_ep', 'jsl-exit-intent-popup' ),
			'section' => 'jsl_section',
			'type'    => 'textarea',
		)
	); 

	//checkbox sanitization function
	function jsl_sanitize_checkbox( $input ){
              
		//returns true if checkbox is checked
		return ( isset( $input ) ? true : false );
	} 

}
add_action( 'customize_register', 'jsl_enhance_customizer' );
?>