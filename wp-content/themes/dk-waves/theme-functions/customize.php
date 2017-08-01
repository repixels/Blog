<?php

/* Theme Customizer setup. 
 * This hook allows you define new Theme Customizer sections, settings, and controls.
 *
 */

add_action( 'customize_register', 'waves_customize_register' );

function waves_customize_register( $wp_customize ) {

	/* Enable live preview for WordPress theme features. */
	$wp_customize->get_setting( 'blogname' )->transport = 'refresh';
	
	/* Logo */	
	$wp_customize->add_setting( 'waves_logo_size', array(
			'default' => '32px',
			'sanitize_callback' => 'sanitize_text_field',
			'description' => esc_html__( 'Maximum logo height in px', 'dk_waves' )
		)
	);
	$wp_customize->add_control( 'waves_logo_size', array(
			'label' => esc_html__( 'Logo Size', 'dk_waves' ),
			'section' => 'title_tagline',
			'settings' => 'waves_logo_size',
			'type' => 'text'
        )
	);

	$wp_customize->add_setting( 'waves_loading_image', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'waves_loading_image', array(
		'label'    => esc_html__( 'Loading Image', 'dk_waves' ),
		'section'  => 'title_tagline',
		'settings' => 'waves_loading_image',
		'extensions' => array( 'png', 'svg', 'gif' ),
		'description'  => esc_html__( 'Image shown on initial load', 'dk_waves' )
	) ) );

	/* Font Customizer */
	// SECTION
	$wp_customize->add_section( 'waves_font' , array(
		'title'      => esc_html__( 'Font', 'dk_waves' ),
		'priority'   => 30,
		'description' => esc_html__( 'Choose your fonts from google.com/fonts', 'dk_waves' )
	) );
	
	
	/* Font family dropdown */
	// SETTING
	$wp_customize->add_setting( 'typekit_font', array(
			'default' => 'Futura PT',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'typekit_embed_id', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'google_font', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'google_font_weights', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'google_fonts_subset', array(
			'default' => 'latin',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	// CONTROLS
	$wp_customize->add_control( 'typekit_font', array(
			'label' => esc_html__( 'Typekit Font', 'dk_waves' ),
			'section' => 'waves_font',
			'settings' => 'typekit_font',
			'type' => 'text'
        )
	);
	$wp_customize->add_control( 'typekit_embed_id', array(
			'label' => esc_html__( 'Typekit Embed ID', 'dk_waves' ),
			'section' => 'waves_font',
			'settings' => 'typekit_embed_id',
			'type' => 'text',
			'description'  => esc_html__( 'Paste the generated embed ID here.', 'dk_waves' )
        )
	);
	$wp_customize->add_control( 'google_font', array(
			'label' => esc_html__( 'Google Font', 'dk_waves' ),
			'section' => 'waves_font',
			'settings' => 'google_font',
			'type' => 'text'
        )
	);
	$wp_customize->add_control( 'google_font_weights', array(
			'label' => esc_html__( 'Google Font Weights', 'dk_waves' ),
			'section' => 'waves_font',
			'settings' => 'google_font_weights',
			'type' => 'text'
        )
	);
	$wp_customize->add_control( 'google_fonts_subset', array(
			'label' => esc_html__( 'Character Subset', 'dk_waves' ),
			'section' => 'waves_font',
			'settings' => 'google_fonts_subset',
			'type' => 'select',
			'choices' => array(
		            'latin' => 'Latin (latin)',
		            'latin-ext' => 'Latin Extended (latin-ext)',
		            'greek' => 'Greek (greek)',
		            'greek-ext' => 'Greek Extended (greek-ext)',
		            'vietnamese' => 'Vietnamese (vietnamese)',
		            'cyrillic-ext' => 'Cyrillic Extended (cyrillic-ext)',
		            'cyrillic' => 'Cyrillic (cyrillic)'
		        )
		)
	);
	
	/* Style */
	// SECTION
	$wp_customize->add_section( 'waves_style' , array(
		'title'      => esc_html__( 'Style', 'dk_waves' ),
		'priority'   => 100,
	) );
	// SETTING
	$wp_customize->add_setting( 'waves_wrapper', array(
			'default' => 'full',
			'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_setting( 'waves_load_more_text', array( 
			'sanitize_callback' => 'sanitize_text_field', 
			'default' => 'Load More Articles' )
	);
	$wp_customize->add_setting( 'waves_login_button_text', array( 
			'sanitize_callback' => 'sanitize_text_field', 
			'default' => 'Write' )
	);
	// CONTROLS
	$wp_customize->add_control( 'waves_wrapper', array(
			'label' => esc_html__( 'Wrapper', 'dk_waves' ),
			'section' => 'waves_style',
			'settings' => 'waves_wrapper',
			'type' => 'select',
			'choices' => array(
		            'full' => esc_html__( 'Full-width', 'dk_waves' ),
		            'boxed' => esc_html__( 'Boxed', 'dk_waves' )
		        )
		)
	);
	$wp_customize->add_control( 'waves_load_more_text', array(
			'label' => esc_html__( 'Loading Button Text', 'dk_waves' ),
			'section' => 'waves_style',
			'settings' => 'waves_load_more_text',
			'type' => 'text'
        )
	);
	$wp_customize->add_control( 'waves_login_button_text', array(
			'label' => esc_html__( 'Login Button Text', 'dk_waves' ),
			'section' => 'waves_style',
			'settings' => 'waves_login_button_text',
			'type' => 'text'
        )
	);
	
	/* Footer */
	// SECTION
	$wp_customize->add_section( 'waves_footer' , array(
		'title'      => esc_html__( 'Footer', 'dk_waves' ),
		'priority'   => 100,
	) );
	// SETTING
	$wp_customize->add_setting( 'waves_footer_text', array( 'sanitize_callback' => 'balanceTags' ));
	$wp_customize->add_setting( 'waves_footer_text2', array( 
		'sanitize_callback' => 'balanceTags', 
		'default' => esc_html__( 'With a commitment to quality content for our community.', 'dk_waves' ) ));
	$wp_customize->add_setting( 'waves_facebook_api' , array( 'sanitize_callback' => 'esc_attr' ));
	
	$wp_customize->add_setting( 'waves_facebook' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_twitter' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_linkedin' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_youtube' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_flickr' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_skype' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_tumblr' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_dribbble' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_pinterest' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_gplus' , array( 'sanitize_callback' => 'esc_url' ));
	$wp_customize->add_setting( 'waves_instagram' , array( 'sanitize_callback' => 'esc_url' ));
	// CONTROLS
	$wp_customize->add_control( 'waves_footer_text', array(
			'label' => esc_html__( 'Copyright line', 'dk_waves' ),
			'section' => 'waves_footer',
			'settings' => 'waves_footer_text',
			'type' => 'textarea',
			'description'  => esc_html__( 'Some HTML is allowed', 'dk_waves' )
     ) );
     $wp_customize->add_control( 'waves_footer_text2', array(
			'label' => esc_html__( 'Bottom line', 'dk_waves' ),
			'section' => 'waves_footer',
			'settings' => 'waves_footer_text2',
			'type' => 'textarea',
			'description'  => esc_html__( 'Some HTML is allowed', 'dk_waves' )
     ) );
	$wp_customize->add_control( 'waves_facebook_api', array(
		'label'    => esc_html__( 'Facebook APP ID', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_facebook_api',
		'description'  => esc_html__( 'For sharing. Get yours at https://developers.facebook.com/apps/', 'dk_waves' )
	) );
	
	$wp_customize->add_control( 'waves_facebook', array(
		'label'    => esc_html__( 'URL for Facebook Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_facebook'
	) );
	$wp_customize->add_control( 'waves_twitter', array(
		'label'    => esc_html__( 'URL for Twitter Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_twitter'
	) );
	$wp_customize->add_control( 'waves_linkedin', array(
		'label'    => esc_html__( 'URL for LinkedIn Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_linkedin'
	) );
	
	$wp_customize->add_control( 'waves_skype', array(
		'label'    => esc_html__( 'URL for Skype Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_skype'
	) );
	$wp_customize->add_control( 'waves_youtube', array(
		'label'    => esc_html__( 'URL for Youtube Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_youtube'
	) );
	
	$wp_customize->add_control( 'waves_flickr', array(
		'label'    => esc_html__( 'URL for Flickr Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_flickr'
	) );
	
	$wp_customize->add_control( 'waves_tumblr', array(
		'label'    => esc_html__( 'URL for Tumblr Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_tumblr'
	) );
	$wp_customize->add_control( 'waves_dribbble', array(
		'label'    => esc_html__( 'URL for Dribbble Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_dribbble'
	) );
	
	$wp_customize->add_control( 'waves_pinterest', array(
		'label'    => esc_html__( 'URL for Pinterest Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_pinterest'
	) );
	$wp_customize->add_control( 'waves_gplus', array(
		'label'    => esc_html__( 'URL for Google+ Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_gplus'
	) );
	$wp_customize->add_control( 'waves_instagram', array(
		'label'    => esc_html__( 'URL for Instagram Button', 'dk_waves' ),
		'type' 	=> 'text',
		'section'  => 'waves_footer',
		'settings' => 'waves_instagram'
	) );
	
	
	/* Color Schemer */
	$colors = array();
	$colors[] = array(
		'slug'=>'bg_color', 
		'default' => '#f9faf9',
		'label' => esc_html__('Background Color', 'dk_waves')
	);
	$colors[] = array(
		'slug'=>'text_color', 
		'default' => '#000000',
		'label' => esc_html__('Text Color', 'dk_waves')
	);
	$colors[] = array(
		'slug'=>'widgets_bg_color', 
		'default' => '#fefefe',
		'label' => esc_html__('Widgets and Excerpts Background', 'dk_waves')
	);
	$colors[] = array(
		'slug'=>'logo_color', 
		'default' => '#1b80c9',
		'label' => esc_html__('Logo Color', 'dk_waves')
	);
	$colors[] = array(
		'slug'=>'accent_color', 
		'default' => '#4dc76f',
		'label' => esc_html__('Color on Buttons', 'dk_waves')
	);
	$colors[] = array(
		'slug'=>'accent_alt_color', 
		'default' => '#28bd7c',
		'label' => esc_html__('Second Color on Buttons', 'dk_waves')
	);
	foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array(
					'label' => $color['label'], 
					'section' => 'colors',
					'settings' => $color['slug']
				)
			)
		);
	}
	
	
	
}

/**
 * Output settings CSS into the head.
 * 
 */
function waves_customize_css()
{	
	$bg_color = get_option('bg_color','#f3f3f3');
	$widgets_bg_color = get_option('widgets_bg_color','#ffffff');
	$accent_color = get_option('accent_color','#4dc76f');
	$logo_color = get_option('logo_color','#1b80c9');
	$accent_alt_color = get_option('accent_alt_color','#28bd7c');
	$text_color = get_option('text_color','#000000');
	$logo_size = get_option('waves_logo_size','32px');

	if ( get_theme_mod('typekit_embed_id') ) {
		$font = str_replace(' ', '-', strtolower(get_theme_mod('typekit_font','soleil')));
	} 
	elseif ( get_theme_mod('google_font') ) {
		$font = get_theme_mod('google_font','Prompt');
	}
	else {
		$font = 'Prompt';
	}
	
	$waves_custom_css = "
	/* Font */
	html, body, input, textarea, select, button { font-family: '{$font}', sans-serif; }
	
	/* Background  */
	body, #loadscreen { background-color: {$bg_color}; }
	#sidebar .widget { background-color: {$widgets_bg_color}; }
	body.layout-list-1 .excerpt, body.layout-list-2 .excerpt .entry-header { background-color: {$widgets_bg_color}; }
	
	/* Logo */
	#logo a { color: {$logo_color}; }
	#logo img { height: {$logo_size}; }
	
	/* Links and Buttons */
	p a, li a { background-image: linear-gradient(to bottom,{$accent_color} 50%,rgba(0,0,0,0) 50%); }
	p a:hover, li a:hover, .tagcloud a:hover, a.accent { color: {$accent_color}; }
	#menu ul.sub-menu li a:hover, #menu ul.children li a:hover { color: {$accent_color}; }
	
	input[type=submit], input[type=button], button, .button { background: linear-gradient(-30deg, {$accent_color} 0%, {$accent_alt_color} 100%); }
	
	input[type=text]:hover, input[type=number]:hover, input[type=email]:hover, input[type=password]:hover,
	input[type=text]:focus, input[type=number]:focus, input[type=email]:focus, input[type=password]:focus,
	input[type=submit]:hover, input[type=button]:hover, button:hover, .button:hover,
	input[type=submit]:focus, input[type=button]:focus, button:focus, .button:focus
	{ border-color: {$accent_alt_color}; }
	
	.like-heart.voted path, .entry-social a:hover path { fill: {$accent_color}; }
	.entry-tags a:hover { background: {$accent_alt_color}; }
	.lazyload-wrapper::after { background: {$accent_color}; }
	
	/* Text */
	body { color: {$text_color}; }
	
	";
	
	wp_add_inline_style( 'hybrid-style', $waves_custom_css );
}

/**
 * Enqueue fonts.
 *
 */
function waves_fonts() {
	/* typekit fonts */
	if ( get_theme_mod('typekit_embed_id') ) {
		wp_enqueue_script( 'waves-typekit', 'https://use.typekit.net/'. get_theme_mod('typekit_embed_id') .'.js', array(), '1.0' );
		wp_add_inline_script( 'waves-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
	}
	/* google fonts */
	if ( get_theme_mod('google_font') ) {
		$googlefonts_args = array(
			'family' => str_replace(' ', '+', get_theme_mod('google_font')).':'.get_theme_mod('google_font_weights'),
			'subset' => get_theme_mod('google_fonts_subset')
		);
		wp_register_style( 'waves-google-fonts', add_query_arg( $googlefonts_args, "//fonts.googleapis.com/css" ), array(), null );
		wp_enqueue_style( 'waves-google-fonts' );
	}
}

/* Output settings CSS into the head. */
add_action( 'wp_enqueue_scripts', 'waves_customize_css', 30);

/* Enqueue Google or Typekit fonts */
add_action( 'wp_enqueue_scripts', 'waves_fonts' );
