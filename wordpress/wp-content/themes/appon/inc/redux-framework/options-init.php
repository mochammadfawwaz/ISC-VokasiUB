<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package appon
 */

// Check if Redux installed.
if ( ! class_exists( 'Redux' ) ) {
	return;
}
// This is your option name where all the Redux data is stored.
$opt_name = 'appon_theme_option';

/**
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args  = array(
	// TYPICAL -> Change these values as you need/desire.
	'opt_name'             => $opt_name,
	'disable_tracking'     => true,
	'display_name'         => $theme->get( 'Name' ),
	'display_version'      => esc_html__( 'Powered By: RadiantThemes Customizer', 'appon' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'appon' ),
	'page_title'           => esc_html__( 'Theme Options', 'appon' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-hammer',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 61,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-hammer',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'footer_credit'        => $theme->get( 'Name' ),
	'show_import_export'   => true,
	'show_options_object'  => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
	'ajax_save'            => true,
	'hints'                => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
);
Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

/**
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START Basic Fields.
Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'General', 'appon' ),
		'icon'  => 'el el-cog',
		'id'    => 'theme-general',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Layout', 'appon' ),
		'icon'       => 'el el-screen',
		'id'         => 'layout',
		'subsection' => true,
		'fields'     => array(

			// Layout Info.
			array(
				'id'    => 'info_layout',
				'type'  => 'info',
				'title' => esc_html__( 'Layout Options', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Layout Type.
			array(
				'id'       => 'layout_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Layout Type', 'appon' ),
				'subtitle' => esc_html__( 'Select layout type. (Please Note: Please set "Row stretch" to "Default" from WPBakery Page Builder "Row Settings"/"Section Settings" for "Boxed" layout.)', 'appon' ),
				'options'  => array(
					'full-width' => 'Full Width',
					'boxed'      => 'Boxed',
				),
				'default'  => 'full-width',
			),

			// Layout Type Boxed Width.
			array(
				'id'            => 'layout_type_boxed_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Boxed Width', 'appon' ),
				'subtitle'      => esc_html__( 'Select Boxed width. Min is 1000px, Max is 1400px and Default is 1200px.', 'appon' ),
				'min'           => 1000,
				'step'          => 10,
				'max'           => 1400,
				'default'       => 1200,
				'display_value' => 'text',
				'required' => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Boxed Background Color.
			array(
				'id'       => 'layout_type_boxed_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Boxed Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for Boxed layout. (Please Note: This can be overright by setting section background color.)', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-website-layout',
				),
				'required' => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Body Background.
			array(
				'id'       => 'layout_type_body_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Body Background', 'appon' ),
				'subtitle' => esc_html__( 'Choose a background for the theme. (Please Note: This can be overright by setting section background color.)', 'appon' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Color', 'appon' ),
		'icon'       => 'el el-brush',
		'id'         => 'color',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_color_scheme',
				'type'  => 'info',
				'title' => esc_html__( 'Color Options', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Color Scheme Type.
			array(
				'id'       => 'color_scheme_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Color Scheme Type', 'appon' ),
				'subtitle' => esc_html__( 'Select color scheme type', 'appon' ),
				'options'  => array(
					'predefined-color' => 'Predefined Color',
					'custom-color'     => 'Custom Color',
				),
				'default'  => 'predefined-color',
			),

			// Color Scheme Type Predefined.
			array(
                'id'       => 'color_scheme_type_predefined',
                'type'     => 'palette',
                'title'    => esc_html__( 'Select Theme Color', 'appon' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'appon' ),
                'palettes' => array(
                    '#253cac'     => array(
                        '#253cac',
                    ),
                    '#1d4fce'     => array(
                        '#1d4fce',
                    ),
                    '#0992c9'     => array(
                        '#0992c9',
                    ),
                    '#556df4'     => array(
                        '#556df4',
                    ),
                    '#0b88ee'     => array(
                        '#0b88ee',
                    ),
                    '#3367d6'     => array(
                        '#3367d6',
                    ),
                    '#0a88ee'     => array(
                        '#0a88ee',
                    ),
                    '#0a88ee'     => array(
                        '#0a88ee',
                    ),
                    '#3367d6'     => array(
                        '#3367d6',
                    ),
                    '#ff1053'     => array(
                        '#ff1053',
                    ),

                    '#556df4'     => array(
                        '#556df4',
                    ),
                    '#fe002f'     => array(
                        '#fe002f',
                    ),
                    '#ff0f27'     => array(
                        '#ff0f27',
                    ),
                    '#ff8522'     => array(
                        '#ff8522',
                    ),
                    '#fec00a'     => array(
                        '#fec00a',
                    ),
                    '#ef173b'     => array(
                        '#ef173b',
                    ),
                    '#ea0026'     => array(
                        '#ea0026',
                    ),
                    '#bf9e58'     => array(
                        '#bf9e58',
                    ),
                    '#ee363f'     => array(
                        '#ee363f',
                    ),
                    '#ef403b'     => array(
                        '#ef403b',
                    ),
                    '#27ae60'     => array(
                        '#27ae60',
                    ),
                    '#25c16f'     => array(
                        '#25c16f',
                    ),
                    '#2cb66a'     => array(
                        '#2cb66a',
                    ),
                    '#00c57c'     => array(
                        '#00c57c',
                    ),
                    '#0abc5f'     => array(
                        '#0abc5f',
                    ),
                    '#6760bc'     => array(
                        '#6760bc',
                    ),
                ),
                'default'  => '#ff0f27',
                'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'predefined-color',
					),
				),
            ),

			// Color Scheme Type Custom.
			array(
				'id'       => 'color_scheme_type_custom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Select Theme Color', 'appon' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'appon' ),
				'desc'     => esc_html__( 'Select alpha value if you want to use alpha in selected areas.', 'appon' ),
				'default'  => array(
					'color'  => '#2b65eb',
					'alpha'  => 0.85,
				),
				'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'custom-color',
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'  => esc_html__( 'Favicon', 'appon' ),
		'id'     => 'favicon',
		'icon'   => 'el el-bookmark-empty',
		'subsection' => true,
		'fields' => array(

			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'title'    => esc_html__( 'Favicon', 'appon' ),
				'subtitle' => esc_html__( 'You can upload Favicon on your website. (.ico 32x32 pixels)', 'appon' ),
				'default'  => array(
					'url'  => get_template_directory_uri() . '/assets/images/Favicon-Default.ico',
				),
			),

			array(
				'id'       => 'apple-icon',
				'type'     => 'media',
				'title'    => esc_html__( 'Apple Touch Icon', 'appon' ),
				'subtitle' => esc_html__( 'apple-touch-icon.png 192x192 pixels', 'appon' ),
				'default'  => array(
					'url'  => get_template_directory_uri() . '/assets/images/Apple-Touch-Icon-192x192-Default.png',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Fonts', 'appon' ),
		'id'      => 'basic-settings',
		'icon'    => 'el el-fontsize',
		'subsection' => true,
		'fields'  => array(
			array(
				'id'             => 'general_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'General', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'output'         => array( 'body' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#212127',
					'line-height' => '24px',
				),
			),

			array(
				'id'             => 'h1_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H1', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H1 tags of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h1' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '40px',
					'color'          => '#181818',
					'line-height'    => '48px',
					'letter-spacing' => '-1px',
				),
			),

			array(
				'id'             => 'h2_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H2', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H2 tags of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h2' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '36px',
					'color'          => '#181818',
					'line-height'    => '44px',
					'letter-spacing' => '-1px',
				),
			),

			array(
				'id'             => 'h3_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H3', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H3 tags of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h3' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '32px',
					'color'          => '#181818',
					'line-height'    => '40px',
					'letter-spacing' => '-1px',
				),
			),

			array(
				'id'             => 'h4_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H4', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H4 tags of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h4' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '30px',
					'color'          => '#181818',
					'line-height'    => '35px',
				),
			),

			array(
				'id'             => 'h5_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H5', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H5 tags of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h5' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '18px',
					'color'          => '#181818',
					'line-height'    => '26px',
				),
			),

			array(
				'id'             => 'h6_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H6', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H6 tags of your website.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h6' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '15px',
					'color'          => '#181818',
					'line-height'    => '26px',
				),
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Custom Slug', 'appon' ),
		'icon'       => 'el el-folder-open',
		'id'    	 => 'custom_slug',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_change_slug',
				'type'  => 'info',
				'title' => esc_html__( 'Change Custom Post Type Slug', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),
			array(
				'id'       => 'change_slug_portfolio',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio', 'appon' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'appon' ),
				'validate' => 'no_special_chars',
				'default'  => 'project',
			),
			array(
				'id'       => 'change_slug_team',
				'type'     => 'text',
				'title'    => esc_html__( 'Team', 'appon' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'appon' ),
				'validate' => 'no_special_chars',
				'default'  => 'team',
			),
			array(
				'id'       => 'change_slug_casestudies',
				'type'     => 'text',
				'title'    => esc_html__( 'Case Study', 'appon' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'appon' ),
				'validate' => 'no_special_chars',
				'default'  => 'case-studies',
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Preloader', 'appon' ),
		'icon'       => 'el el-hourglass',
		'id'    	 => 'preloader',
		'subsection' => true,
		'fields'     => array(

			// Preloader Info.
			array(
				'id'    => 'info_preloader',
				'type'  => 'info',
				'title' => esc_html__( 'Preloader Options', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Preloader Switch.
			array(
				'id'       => 'preloader_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Preloader', 'appon' ),
				'subtitle' => esc_html__( 'Choose if want to activate Preloader or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Preloader Style.
			array(
				'id'       => 'preloader_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Preloader Style', 'appon' ),
				'subtitle' => esc_html__( 'Select Style of the Preloader. (Powered By: "SpinKit")', 'appon' ),
				'options'  => array(
					'rotating-plane'  => 'Rotating Plane',
					'double-bounce'   => 'Double Bounce',
					'wave'            => 'Wave',
					'wandering-cubes' => 'Wandering Cubes',
					'pulse'           => 'Pulse',
					'chasing-dots'    => 'Chasing Dots',
					'three-bounce'    => 'Three Bounce',
					'circle'          => 'Circle',
					'cube-grid'       => 'Cube Grid',
					'fading-circle'   => 'Fading Circle',
					'folding-cube'    => 'Folding Cube',
				),
				'default'  => 'wave',
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),
			
			// Preloader Background Color.
			array(
				'id'       => 'preloader_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a background color for the Preloader.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.preloader',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Color.
			array(
				'id'       => 'preloader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a color for the Preloader.', 'appon' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-circle .sk-child:before, .sk-circle .sk-child:before, .sk-cube-grid .sk-cube, .sk-fading-circle .sk-circle:before, .sk-folding-cube .sk-cube:before',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Timeout.
			array(
				'id'            => 'preloader_timeout',
				'type'          => 'slider',
				'title'         => esc_html__( 'Preloader Timeout', 'appon' ),
				'subtitle'      => esc_html__( 'Select preloader timeout after successful page load. Min is 100ms, Max is 3000ms and Default is 500ms.', 'appon' ),
				'min'           => 100,
				'step'          => 100,
				'max'           => 3000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Page Transition', 'appon' ),
		'icon'       => 'el el-magic',
		'id'    	 => 'page_transition',
		'subsection' => true,
		'fields'     => array(

			// Page Transition Info.
			array(
				'id'    => 'info_page_transition',
				'type'  => 'info',
				'title' => esc_html__( 'Page Transition Options', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Page Transition Switch.
			array(
				'id'       => 'page_transition_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Page Transition', 'appon' ),
				'subtitle' => esc_html__( 'Choose if want to activate Page Transition or not. (Please Note: Preloader option will not work if you enable this.)', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Page Transition Background Color.
			array(
				'id'       => 'page_transition_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a color for the Page Transition.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.page-transition-layer',
				),
				'required' => array(
					array(
						'page_transition_switch',
						'equals',
						true,
					),
				),
			),

			// Page Transition Loader Color.
			array(
				'id'       => 'page_transition_loader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Loader Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a color for the Page Transition Loader.', 'appon' ),
				'default'  => array(
					'color' => '#ff8522',
					'alpha' => 1,
				),
				'output'   => array(
					'stroke' => '.page-transition-layer-spinner .page-transition-layer-spinner-path',
				),
				'required' => array(
					array(
						'page_transition_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Scroll To Top', 'appon' ),
		'icon'       => 'el el-chevron-up',
		'id'    	 => 'scroll_to_top',
		'subsection' => true,
		'fields'     => array(

			// Scroll To Top Info.
			array(
				'id'    => 'info_scroll_to_top',
				'type'  => 'info',
				'title' => esc_html__( 'Scroll To Top Options', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Scroll To Top Switch.
			array(
				'id'       => 'scroll_to_top_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Scroll To Top', 'appon' ),
				'subtitle' => esc_html__( 'Choose if want to activate Scroll To Top or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Scroll To Top Direction.
			array(
				'id'       => 'scroll_to_top_direction',
				'type'     => 'select',
				'title'    => esc_html__( 'Direction', 'appon' ),
				'subtitle' => esc_html__( 'Select Direction of the Scroll To Top.', 'appon' ),
				'options'  => array(
					'left'    => 'Left',
					'right'   => 'Right',
				),
				'default'  => 'left',
				'required'      => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

			// Scroll To Top Background Color.
			array(
				'id'       => 'scroll_to_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a background color for the Scroll To Top.', 'appon' ),
				'output'   => array(
					'background-color' => '.scrollup',
				),
				'required'      => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'GDPR Notice', 'appon' ),
		'icon'       => 'el el-exclamation-sign',
		'id'    	 => 'gdpr_notice',
		'subsection' => true,
		'fields'     => array(

			// GDPR Notice Info.
			array(
				'id'    => 'info_gdpr_notice',
				'type'  => 'info',
				'title' => esc_html__( 'GDPR Notice Options', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// GDPR Notice Switch.
			array(
				'id'       => 'gdpr_notice_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate GDPR Notice', 'appon' ),
				'subtitle' => esc_html__( 'Choose if want to activate GDPR Notice or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// GDPR Notice Background Color.
			array(
				'id'       => 'gdpr_notice_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a background color for the GDPR Notice.', 'appon' ),
				'default'  => array(
					'color' => '#3b4354',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.gdpr-notice',
				),
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Typography.
			array(
				'id'             => 'gdpr_notice_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'GDPR Notice Typography', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font of GDPR Notice.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'output'         => array(
				    '.gdpr-notice p'
				),
				'units'          => 'px',
				'default'        => array(
					'font-weight' => '400',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '28px',
				),
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Content.
			array(
				'id'       => 'gdpr_notice_content',
				'type'     => 'textarea',
				'title'    => esc_html__( 'GDPR Notice Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on GDPR Notice.', 'appon' ),
				'default'  => "Our website use cookies to improve and personalize your experience and to display advertisements (if any). Our website may also include cookies from third parties like Google Adsense, Google Analytics, YouTube. By using this website, you consent to the use of cookies. We've updated our Privacy Policy, please click on the button beside to check our Privacy Policy.",
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Button Text.
			array(
				'id'       => 'gdpr_notice_button_text',
				'type'     => 'text',
				'title'    => esc_html__( 'GDPR Notice Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Enter Button Text for GDPR Notice button.', 'appon' ),
				'default'  => 'Privacy Policy',
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Button Link.
			array(
				'id'       => 'gdpr_notice_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'GDPR Notice Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Enter Button Link for GDPR Notice button.', 'appon' ),
				'default'  => '#',
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Remove Link.
			array(
			    'id'    => 'gdpr_notice_remove_link',
			    'type'  => 'info',
			    'style' => 'warning',
			    'desc'  => wp_kses_post( '<a href="' . esc_url( 'tools.php?page=remove_personal_data' ) . '" target="_blank">Click here</a> to forget a user.' ),
		    ),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Header', 'appon' ),
		'icon'  => 'el el-website',
		'id'    => 'header',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'General', 'appon' ),
		'icon'       => 'el el-cog-alt',
		'id'         => 'general',
		'subsection' => true,
		'fields'     => array(

			// Header Style Info.
			array(
				'id'    => 'info_header_style',
				'type'  => 'info',
				'title' => esc_html__( 'Header Style', 'appon' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Header Style Options.
			array(
				'id'       => 'header-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header Style', 'appon' ),
				'subtitle' => esc_html__( 'Select Header Style (Header will be changed as per selection || N.B.: You can change header even from page to page).', 'appon' ),
				'options'  => array(
					'header-style-default' => array(
						'alt'   => esc_html__( 'Default Style', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Default.png' ),
						'title' => esc_html__( 'Default Style', 'appon' ),
					),
					'header-style-one'     => array(
						'alt'   => esc_html__( 'Style One', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-One.png' ),
						'title' => esc_html__( 'Style One', 'appon' ),
					),
					'header-style-two'     => array(
						'alt'   => esc_html__( 'Style Two', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Two.png' ),
						'title' => esc_html__( 'Style Two', 'appon' ),
					),
					'header-style-three'   => array(
						'alt'   => esc_html__( 'Style Three', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Three.png' ),
						'title' => esc_html__( 'Style Three', 'appon' ),
					),
					'header-style-four'    => array(
						'alt'   => esc_html__( 'Style Four', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Four.png' ),
						'title' => esc_html__( 'Style Four', 'appon' ),
					),
					'header-style-five'    => array(
						'alt'   => esc_html__( 'Style Five', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Five.png' ),
						'title' => esc_html__( 'Style Five', 'appon' ),
					),
					'header-style-six'     => array(
						'alt'   => esc_html__( 'Style Six', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Six.png' ),
						'title' => esc_html__( 'Style Six', 'appon' ),
					),
					'header-style-seven'   => array(
						'alt'   => esc_html__( 'Style Seven', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Seven.png' ),
						'title' => esc_html__( 'Style Seven', 'appon' ),
					),
					/*'header-style-eight'   => array(
						'alt'   => esc_html__( 'Style Eight', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eight.png' ),
						'title' => esc_html__( 'Style Eight', 'appon' ),
					),
					'header-style-nine'   => array(
						'alt'   => esc_html__( 'Style Nine', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Nine.png' ),
						'title' => esc_html__( 'Style Nine', 'appon' ),
					),
					'header-style-ten'   => array(
						'alt'   => esc_html__( 'Style Ten', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten', 'appon' ),
					),
					'header-style-eleven'   => array(
						'alt'   => esc_html__( 'Style Eleven', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eleven.png' ),
						'title' => esc_html__( 'Style Eleven', 'appon' ),
					),
					'header-style-twelve'   => array(
						'alt'   => esc_html__( 'Style Twelve', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Twelve.png' ),
						'title' => esc_html__( 'Style Twelve', 'appon' ),
					),*/
				),
				'default'  => 'header-style-default',
			),

			/* ============================= */
			// START OF HEADER CART OPTIONS
			/* ============================= */

			// Header Cart Info.
			array(
				'id'    => 'header_cart_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Cart Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Cart Display.
			array(
				'id'       => 'header_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Header "Style Default" will not work with this option.)', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			/* ============================= */
			// END OF HEADER CART OPTIONS
			/* ============================= */


			/* ============================= */
			// START OF HEADER DEFAULT OPTIONS
			/* ============================= */

			// Header Default Info.
			array(
				'id'    => 'header_default_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Default Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Default Header Main Background Color.
			array(
				'id'       => 'header_default_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Default" only)', 'appon' ),
				'output'   => array(
					'background-color' => '.wraper_header.style-default .wraper_header_main',
				),
			),

			/* ============================= */
			// END OF HEADER DEFAULT OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER ONE OPTIONS
			/* ============================= */

			// Header One Info.
			array(
				'id'    => 'header_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header One Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header One Floating.
			array(
				'id'       => 'header_one_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header One Header Main Background Color.
			array(
				'id'       => 'header_one_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main',
				),
			),

			// Header One Sticky.
			array(
				'id'       => 'header_one_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header One Sticky Header Main Background Color.
			array(
				'id'       => 'header_one_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'appon' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_one_sticky',
						'equals',
						true,
					),
				),
			),

			// Header One Logo.
			array(
				'id'       => 'header_one_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
                    'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-White-White.png',
                ),
			),

			// Header One Retina Logo.
			array(
				'id'       => 'header_one_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),

			// Header One Menu Typography.
			array(
				'id'             => 'header_one_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header One Menu Underline Color.
			array(
				'id'       => 'header_one_menu_underline_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Underline Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the menu underline.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.45,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header One Submenu Background Color.
			array(
				'id'       => 'header_one_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'appon' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-one .rt-mega-menu',
				),
			),

			// Header One Submenu Typography.
			array(
				'id'             => 'header_one_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Montserrat',
					'font-weight'    => '400',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header One Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_one_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'appon' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header One Cart Counter Color.
			array(
				'id'       => 'header_one_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'appon' ),
				'default'  => array(
					'color' => '#1bcc88',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
			),
			
			// Header One Button One Dispay.
			array(
				'id'       => 'header_one_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want button on header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),
			
			// Header One Button One Color.
			array(
				'id'       => 'header_one_button_one_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'appon' ),
				'default'  => array(
					'color' => '#1bcc88',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_one_button_one_display',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main .header_main_calltoaction > .btn.button-one',
				),
			),
			
			// Header One Button One Text.
			array(
				'id'       => 'header_one_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'appon' ),
				'default'  => esc_html__( 'Sign Up', 'appon' ),
				'required' => array(
					array(
						'header_one_button_one_display',
						'equals',
						true,
					),
				),
			),
			
			// Header One Button One Link.
			array(
				'id'       => 'header_one_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'appon' ),
				'default'  => esc_html__( '#', 'appon' ),
				'required' => array(
					array(
						'header_one_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header One Search Display.
			array(
				'id'       => 'header_one_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header One Hamburger Display.
			array(
				'id'       => 'header_one_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header One Hamburger Mobile.
			array(
				'id'       => 'header_one_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Width.
			array(
				'id'            => 'header_one_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'appon' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'appon' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Background.
			array(
				'id'       => 'header_one_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'appon' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'appon' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-one"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Display.
			array(
				'id'       => 'header_one_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header One Mobile Menu Background Color.
			array(
				'id'       => 'header_one_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'appon' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-one"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Typography.
			array(
				'id'             => 'header_one_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-one"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER TWO OPTIONS
			/* ============================= */

			// Header Two Info.
			array(
				'id'    => 'header_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Two Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Two Floating.
			array(
				'id'       => 'header_two_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Two Header Main Background Color.
			array(
				'id'       => 'header_two_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main',
				),
			),

			// Header Two Sticky.
			array(
				'id'       => 'header_two_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Two Sticky Header Main Background Color.
			array(
				'id'       => 'header_two_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'appon' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_two_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two Logo.
			array(
				'id'       => 'header_two_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
                    'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-Dark.png',
                ),
			),

			// Header Two Retina Logo.
			array(
				'id'       => 'header_two_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),

			// Header Two Menu Typography.
			array(
				'id'             => 'header_two_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Two Menu Underline Color.
			array(
				'id'       => 'header_two_menu_underline_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Underline Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the menu underline.', 'appon' ),
				'default'  => array(
					'color' => '#ffda2a',
					'alpha' => 0.6,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header Two Submenu Background Color.
			array(
				'id'       => 'header_two_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'appon' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-two .rt-mega-menu',
				),
			),

			// Header Two Submenu Typography.
			array(
				'id'             => 'header_two_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Montserrat',
					'font-weight'    => '400',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Two Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_two_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'appon' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Two Cart Counter Color.
			array(
				'id'       => 'header_two_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'appon' ),
				'default'  => array(
					'color' => '#73c21e',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
			),

			// Header Two Search Display.
			array(
				'id'       => 'header_two_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Two Hamburger Display.
			array(
				'id'       => 'header_two_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Two Hamburger Mobile.
			array(
				'id'       => 'header_two_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Width.
			array(
				'id'            => 'header_two_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'appon' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'appon' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Background.
			array(
				'id'       => 'header_two_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'appon' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'appon' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-two"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Display.
			array(
				'id'       => 'header_two_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Two Mobile Menu Background Color.
			array(
				'id'       => 'header_two_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'appon' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-two"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Typography.
			array(
				'id'             => 'header_two_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-two"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER THREE OPTIONS
			/* ============================= */

			// Header Three Info.
			array(
				'id'    => 'header_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Three Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Three Header Main Background Color.
			array(
				'id'       => 'header_three_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-three"] .wraper_header_main',
				),
			),

			// Header Three Header Color Scheme.
			array(
				'id'       => 'header_three_header_color_scheme',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Header Color Scheme', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#99fdff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
					'color'            => 'body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > ul li.current-menu-item a, body[data-header-style="header-style-three"] .wraper_header_main .header_main .header-social ul.social li a:hover',
					'border-color'     => 'body[data-header-style="header-style-three"] .wraper_header_main .header_main .header-social ul.social li a:hover',
				),
			),

			// Header Three Logo.
			array(
				'id'       => 'header_three_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
					'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-White-White.png',
				),
			),

			// Header Three Retina Logo.
			array(
				'id'       => 'header_three_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),

			// Header Three Menu Typography.
			array(
				'id'             => 'header_three_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '500',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
				),
				'output'         => array(
					'body[data-header-style="header-style-three"] .wraper_header_main .nav',
				),
			),

			// Header Three Copyright Text.
			array(
				'id'       => 'header_three_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Copyright Text', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'appon' ),
				'default'  => esc_html__( 'Appon Theme © All Rights Reserved', 'appon' ),
			),

			/* ============================= */
			// END OF HEADER THREE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER FOUR OPTIONS
			/* ============================= */

			// Header Four Info.
			array(
				'id'    => 'header_four_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Four Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Four Header Main Background Color.
			array(
				'id'       => 'header_four_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#252525',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-four"] .sidr',
				),
			),
			
			// Header Four Header Color Scheme.
			array(
				'id'       => 'header_four_header_color_scheme',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Header Color Scheme', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#fe6c33',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > ul li a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .header-search-bar .form-row:before',
					'color'            => 'body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > ul li.current-menu-item a',
				),
			),
			
			// Header Four Branding Icon.
			array(
				'id'       => 'header_four_branding_icon',
				'type'     => 'media',
				'title'    => esc_html__( 'Branding Icon', 'appon' ),
				'subtitle' => esc_html__( 'You can upload Branding Icon on your website.', 'appon' ),
				'default'  => array(
					'url'  => get_template_directory_uri() . '/assets/images/Logo-Branding.png',
				),
			),

			// Header Four Logo.
			array(
				'id'       => 'header_four_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
					'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-White-White.png',
				),
			),

			// Header Four Retina Logo.
			array(
				'id'       => 'header_four_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),

			// Header Four Menu Typography.
			array(
				'id'             => 'header_four_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Rubik',
					'font-weight'    => '700',
					'font-size'      => '30px',
					'color'          => '#ffffff',
					'line-height'    => '38px',
				),
				'output'         => array(
					'body[data-header-style="header-style-four"] .wraper_header_main .nav',
				),
			),
			
			// Header Four Search Display.
			array(
				'id'       => 'header_four_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			/* ============================= */
			// END OF HEADER FOUR OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER FIVE OPTIONS
			/* ============================= */

			// Header Five Info.
			array(
				'id'    => 'header_five_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Five Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Five Floating.
			array(
				'id'       => 'header_five_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Five Header Main Background Color.
			array(
				'id'       => 'header_five_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .wraper_header_main',
				),
			),

			// Header Five Sticky.
			array(
				'id'       => 'header_five_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Five Sticky Header Main Background Color.
			array(
				'id'       => 'header_five_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_five_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Five Logo.
			array(
				'id'       => 'header_five_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
                    'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-Dark.png',
                ),
			),

			// Header Five Retina Logo.
			array(
				'id'       => 'header_five_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),
			
			// Header Five Flyout Menu Background Color.
			array(
				'id'       => 'header_five_flyout_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Flyout Menu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for flyout menu.', 'appon' ),
				'default'  => array(
					'color' => '#040404',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .wraper_flyout_menu, body[data-header-style="header-style-five"] .flyout-menu-overlay > .flyout-menu-overlay-line',
				),
			),

			// Header Five Menu Typography.
			array(
				'id'             => 'header_five_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Eczar',
					'font-weight'    => '400',
					'font-size'      => '42px',
					'color'          => '#ffffff',
					'line-height'    => '50px',
				),
				'output'         => array(
					'body[data-header-style="header-style-five"] .wraper_flyout_menu > .table > .table-cell > .flyout-menu > .flyout-menu-nav',
				),
			),

			// Header Five Cart Counter Color.
			array(
				'id'       => 'header_five_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'appon' ),
				'default'  => array(
					'color' => '#b7914a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count',
				),
			),
			
			/* ============================= */
			// END OF HEADER FIVE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER SIX OPTIONS
			/* ============================= */

			// Header Six Info.
			array(
				'id'    => 'header_six_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Six Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Six Floating.
			array(
				'id'       => 'header_six_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Six Header Main Background Color.
			array(
				'id'       => 'header_six_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main',
				),
			),

			// Header Six Sticky.
			array(
				'id'       => 'header_six_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Six Sticky Header Main Background Color.
			array(
				'id'       => 'header_six_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.95,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Logo.
			array(
				'id'       => 'header_six_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
                    'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-White-White.png',
                ),
			),

			// Header Six Retina Logo.
			array(
				'id'       => 'header_six_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),

			// Header Six Menu Typography.
			array(
				'id'             => 'header_six_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Six Menu Underline Color.
			array(
				'id'       => 'header_six_menu_underline_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Underline Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the menu underline.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header Six Submenu Background Color.
			array(
				'id'       => 'header_six_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'appon' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-six .rt-mega-menu',
				),
			),

			// Header Six Submenu Typography.
			array(
				'id'             => 'header_six_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Montserrat',
					'font-weight'    => '400',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Six Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_six_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'appon' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Six Cart Counter Color.
			array(
				'id'       => 'header_six_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'appon' ),
				'default'  => array(
					'color' => '#ff2c54',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
			),
			
			// Header Six Button One Dispay.
			array(
				'id'       => 'header_six_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want button on header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),
			
			// Header Six Button One Color.
			array(
				'id'       => 'header_six_button_one_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style Six" only.', 'appon' ),
				'default'  => array(
					'color' => '#ff2c54',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_six_button_one_display',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main .header_main_calltoaction > .btn.button-one',
				),
			),
			
			// Header Six Button One Text.
			array(
				'id'       => 'header_six_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style Six" only.', 'appon' ),
				'default'  => esc_html__( 'Sign Up', 'appon' ),
				'required' => array(
					array(
						'header_six_button_one_display',
						'equals',
						true,
					),
				),
			),
			
			// Header Six Button One Link.
			array(
				'id'       => 'header_six_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Applies for header "Style Six" only.', 'appon' ),
				'default'  => esc_html__( '#', 'appon' ),
				'required' => array(
					array(
						'header_six_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Search Display.
			array(
				'id'       => 'header_six_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Six Hamburger Display.
			array(
				'id'       => 'header_six_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Header Six Hamburger Mobile.
			array(
				'id'       => 'header_six_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
				'required' => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Hamburger Width.
			array(
				'id'            => 'header_six_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'appon' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'appon' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Hamburger Background.
			array(
				'id'       => 'header_six_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'appon' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'appon' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-six"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Mobile Menu Display.
			array(
				'id'       => 'header_six_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Six Mobile Menu Background Color.
			array(
				'id'       => 'header_six_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'appon' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-six"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_six_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Mobile Menu Typography.
			array(
				'id'             => 'header_six_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-six"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_six_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER SIX OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER SEVEN OPTIONS
			/* ============================= */

			// Header Seven Info.
			array(
				'id'    => 'header_seven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Seven Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Seven Floating.
			array(
				'id'       => 'header_seven_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Seven Header Main Background Color.
			array(
				'id'       => 'header_seven_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seven"] .wraper_header_main',
				),
			),

			// Header Seven Sticky.
			array(
				'id'       => 'header_seven_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'appon' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			// Header Seven Sticky Header Main Background Color.
			array(
				'id'       => 'header_seven_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Header Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'appon' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seven"] .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_seven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Seven Logo.
			array(
				'id'       => 'header_seven_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'appon' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'appon' ),
				'default'  => array(
                    'url'  => get_template_directory_uri() . '/assets/images/Logo-Default-White-White.png',
                ),
			),

			// Header Seven Retina Logo.
			array(
				'id'       => 'header_seven_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'appon' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'appon' ),
			),
			
			// Header Seven Flyout Menu Background Color.
			array(
				'id'       => 'header_seven_flyout_menu_background_color',
				'type'     => 'background',
				'title'    => esc_html__( 'Header Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for Header.', 'appon' ),
				'default'  => array(
				    'background-image'    =>  get_template_directory_uri() . '/assets/images/Header-7-Menu-Background.png',
				    'background-size'     => 'cover',
				    'background-position' => 'right center',
					'background-color'    => '#ffffff',
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seven"] .wraper_flexi_menu > .flexi-menu-overlay',
				),
			),

			// Header Seven Menu Typography.
			array(
				'id'             => 'header_seven_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '32px',
					'color'          => '#363F54',
					'line-height'    => '45px',
				),
				'output'         => array(
					'body[data-header-style="header-style-seven"] .wraper_flexi_menu > .table > .table-cell > .flexi-menu > .flexi-menu-nav',
				),
			),
			
			/* ============================= */
			// END OF HEADER SEVEN OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Short Header', 'appon' ),
		'icon'       => 'el el-website',
		'id'         => 'inner_page_banner',
		'subsection' => true,
		'fields'     => array(

			// Short Header Style Options.
			array(
				'id'       => 'short-header',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Select Short Header', 'appon' ),
				'subtitle' => esc_html__( 'Choose what kind of short header you want to set.', 'appon' ),
				'options'  => array(
					'Banner-With-Breadcrumb'     => array(
						'alt'   => esc_html__( 'Banner-With-Breadcrumb', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-With-Breadcrumb.png' ),
						'title' => esc_html__( 'Banner & Breadcrumb', 'appon' ),
					),
					'Banner-only'     => array(
						'alt'   => esc_html__( 'Banner Only', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-Only.png' ),
						'title' => esc_html__( 'Banner Only', 'appon' ),
					),
					'breadcrumb-only' => array(
						'alt'   => esc_html__( 'Breadcrumb-Only', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Breadcrumb-Only.png' ),
						'title' => esc_html__( 'Breadcrumb Only', 'appon' ),
					),
					'banner-none'   => array(
						'alt'   => esc_html__( 'Banner None', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-None.png' ),
						'title' => esc_html__( 'Banner None', 'appon' ),
					),
				),
				'default'  => 'Banner-only',
			),
			
			// Inner Page Banner Info.
			array(
				'id'    => 'inner_page_banner_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Inner Page Banner', 'appon' ),
			),

			// Inner Page Banner Background.
			array(
				'id'       => 'inner_page_banner_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Inner Page Banner Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for Inner Page Banner. (Please Note: This is the default image of Inner Page Banner section. You can change background image on respective pages.)', 'appon' ),
				'default'  => array(
					'background-image'      => get_template_directory_uri() . '/assets/images/Default-Banner-Background.jpg',
					'background-position'   => 'center center',
					'background-size'       => 'cover',
					'background-color'      => '#2c0f6e',
				),
				'output'   => array(
					'.wraper_inner_banner',
				),
			),

			// Inner Page Banner Border Bottom.
			array(
				'id'       => 'inner_page_banner_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Inner Page Banner Border Bottom', 'appon' ),
				'subtitle' => esc_html__( 'Set Border Bottom for Inner Page Banner.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_inner_banner_main',
				),
			),

			// Inner Page Banner Padding.
			array(
				'id'             => 'inner_page_banner_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Inner Page Banner Padding', 'appon' ),
				'subtitle'       => esc_html__( 'Set padding for inner page banner area.', 'appon' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '165px',
					'padding-bottom' => '135px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_main > .container',
				),
			),

			// Inner Page Banner Title Font.
			array(
				'id'             => 'inner_page_banner_title_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Title Font', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner title.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '45px',
					'color'          => '#ffffff',
					'line-height'    => '52px',
				),
				'output'         => array(
					'.inner_banner_main .title',
				),
			),

			// Inner Page Banner Subtitle Font.
			array(
				'id'             => 'inner_page_banner_subtitle_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Subtitle Font', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner subtitle.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '20px',
					'color'          => '#ffffff',
					'line-height'    => '30px',
				),
				'output'         => array(
					'.inner_banner_main .subtitle',
				),
			),

			// Inner Page Banner Alignment.
			array(
				'id'      => 'inner_page_banner_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Inner Page Banner Alignment', 'appon' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

			// Breadcrumb Style Info.
			array(
				'id'    => 'breadcrumb_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Breadcrumb', 'appon' ),
			),

			// Breadcrumb Arrow Style.
			array(
				'id'       => 'breadcrumb_arrow_style',
				'type'     => 'select',
				'title'    => __( 'Breadcrumb Arrow Style', 'appon' ),
				'subtitle' => __( 'Select an icon for breadcrumb arrow.', 'appon' ),
				'data'     => 'elusive-icons',
				'default'  => 'el el-chevron-right',
			),

			// Breadcrumb Font.
			array(
				'id'             => 'breadcrumb_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Breadcrumb Font', 'appon' ),
				'subtitle'       => esc_html__( 'This will be the default font of your Inner Page Banner Breadcrumb.', 'appon' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '26px',
				),
				'output'         => array(
					'.inner_banner_breadcrumb #crumbs',
				),
			),

			// Breadcrumb Padding.
			array(
				'id'             => 'breadcrumb_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Breadcrumb Padding', 'appon' ),
				'subtitle'       => esc_html__( 'Set padding for breadcrumb area.', 'appon' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '0px',
					'padding-bottom' => '125px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_breadcrumb > .container',
				),
			),

			// Breadcrumb Alignment.
			array(
				'id'      => 'breadcrumb_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Breadcrumb Alignment', 'appon' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'  => esc_html__( 'Footer', 'appon' ),
		'icon'   => 'el el-photo',
		'id'     => 'footer',
		'fields' => array(

			// Footer Style Info.
			array(
				'id'    => 'footer_style_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Footer Style', 'appon' ),
			),

			// Footer Style Options.
			array(
				'id'       => 'footer-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Footer Style', 'appon' ),
				'subtitle' => esc_html__( 'Select footer style. (N.B.: Please set style for individual footer on their respective settings below.)', 'appon' ),
				'options'  => array(
					'footer-default' => array(
						'alt'   => esc_html__( 'Default Footer', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Default.png' ),
						'title' => esc_html__( 'Default Footer', 'appon' ),
					),
					'footer-custom' => array(
						'alt'   => esc_html__( 'Custom Footer', 'appon' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Custom.png' ),
						'title' => esc_html__( 'Custom Footer ', 'appon' ),
					),
				),
				'default'  => 'footer-default',
			),

			/* ============================= */
			// START OF FOOTER ONE OPTIONS
			/* ============================= */

			// Footer One Info.
			array(
				'id'    => 'footer_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Default Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Open social links in new window.
			array(
				'id'      => 'hide-footer-widget',
				'type'    => 'switch',
				'title'   => esc_html__( 'Hide footer widget area', 'appon' ),
				'default' => false,
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),
			// Footer One Background.
			array(
				'id'       => 'footer_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for Footer.', 'appon' ),
				'default'  => array(
					'background-color' => '#272053',
				),
				'output'   => array(
					'.wraper_footer.style-default',
				),
				'required' => array(
					array(
						'hide-footer-widget',
						'equals',
						true,
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Main Background.
			array(
				'id'       => 'footer_one_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'appon' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section.', 'appon' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-default .wraper_footer_main',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Main Bottom Border.
			array(
				'id'       => 'footer_one_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'appon' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section.', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.2,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-default .wraper_footer_main',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Copyright Background.
			array(
				'id'       => 'footer_one_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'appon' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background.', 'appon' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-default .wraper_footer_copyright',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Copyright Text.
			array(
				'id'       => 'footer_one_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'appon' ),
				'subtitle' => esc_html__( 'Enter Copyright Text.', 'appon' ),
				'default'  => esc_html__( 'Appon Theme - 2019', 'appon' ),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			/* ============================= */
			// END OF FOOTER DEFAULT OPTIONS
			/* ============================= */


			/* ============================= */
			// START OF FOOTER CUSTOM OPTIONS
			/* ============================= */

			// Footer Eleven Info.
			array(
				'id'    => 'footer_custom_info',
				'type'  => 'info',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Custom Footer Settings', 'appon' ),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),


			array(
				'id'       => 'footer_list_text',
				'title'    => __('Custom Footer', 'appon'),
				'type'     => 'select',
				'options'  =>radiant_get_custom_footers_list(),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),

			),

			/* ============================= */
			// END OF FOOTER ELEVEN OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Elements', 'appon' ),
		'icon'  => 'el el-braille',
		'id'    => 'elements',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Scroll Bar', 'appon' ),
		'id'         => 'scroll_bar',
		'icon'       => 'el el-adjust-alt',
		'subsection' => true,
		'fields'     => array(

			// Display Footer Main Section.
			array(
				'id'       => 'scrollbar_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Custom Scrollbar', 'appon' ),
				'subtitle' => esc_html__( 'Choose if Custom Scrollbar will be activate or not. (Please Note: This will take effect on infinity scroll areas but not for entire website.)', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Scroll Bar Color.
			array(
				'id'       => 'scrollbar_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Scroll Bar Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a color for Scroll Bar.', 'appon' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 1,
				),
			),

			// Scroll Bar Width.
			array(
				'id'       => 'scrollbar_width',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'height'   => false,
				'title'    => esc_html__( 'Scroll Bar Width', 'appon' ),
				'subtitle' => esc_html__( 'Set width for Scroll Bar.', 'appon' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'width' => '7',
					'units' => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Button', 'appon' ),
		'icon'       => 'el el-off',
		'id'         => 'button-style',
		'subsection' => true,
		'fields'     => array(

			// Button Padding.
			array(
				'id'             => 'button_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Button Padding', 'appon' ),
				'subtitle'       => esc_html__( 'Allow padding for buttons.', 'appon' ),
				'default'        => array(
					'padding-top'    => '12px',
					'padding-right'  => '35px',
					'padding-bottom' => '13px',
					'padding-left'   => '35px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Background Color.
			array(
				'id'       => 'button_background_color_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Background Color', 'appon' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons hover.', 'appon' ),
				'default'  => array(
					'color' => '#252525',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button.hover-style-one .radiantthemes-button-main:hover, .radiantthemes-button.hover-style-two .radiantthemes-button-main > .overlay, .radiantthemes-button.hover-style-three .radiantthemes-button-main > .overlay, .radiantthemes-button.hover-style-four .radiantthemes-button-main:hover, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border.
			array(
				'id'      => 'button_border',
				'type'    => 'border',
				'title'   => esc_html__( 'Border', 'appon' ),
				'default' => array(
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px',
					'border-style'  => 'solid',
					'border-color'  => '#ffffff',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Border Color.
			array(
				'id'      => 'button_hover_border_color',
				'type'    => 'border',
				'title'   => esc_html__( 'Hover Border Color', 'appon' ),
				'default' => array(
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px',
					'border-style'  => 'solid',
					'border-color'  => '#ffffff',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border Radius.
			array(
				'id'             => 'border-radius',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Border Radius', 'appon' ),
				'subtitle'       => esc_html__( 'Users can change the Border Radius for Buttons.', 'appon' ),
				'all'            => false,
				'default'        => array(
					'margin-top'    => '0px',
					'margin-right'  => '0px',
					'margin-bottom' => '0px',
					'margin-left'   => '0px',
					'units'         => 'px',
				),
			),

			// Box Shadow.
			array(
				'id'      => 'theme_button_box_shadow',
				'type'    => 'box_shadow',
				'title'   => esc_html__( 'Theme Button Box Shadow', 'appon' ),
				'units'   => array( 'px', 'em', 'rem' ),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
				'opacity' => true,
				'rgba'    => true,
				'default' => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '0',
					'spread'       => '0',
					'opacity'      => '0.01',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),

			),

			// Button Typography.
			array(
				'id'             => 'button_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Button Typography', 'appon' ),
				'subtitle'       => esc_html__( 'Typography options for buttons. Remember, this will effect all buttons of this theme. (Please Note: This change will effect all theme buttons, including Radiants Buttons, Radiant Contact Form Button, Radiant Fancy Text Box Button.)', 'appon' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Montserrat',
					'font-weight'    => '700',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Font Color.
			array(
				'id'       => 'button_typography_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Hover Font Color', 'appon' ),
				'subtitle' => esc_html__( 'Select button hover font color.', 'appon' ),
				'default'  => '#ffffff',
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Icon Color.
			array(
				'id'       => 'button_typography_icon',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main i',
				),
			),

			// Hover Icon Color.
			array(
				'id'       => 'button_typography_icon_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Icon Color', 'appon' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present', 'appon' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover i',
				),
			),

			// Hover Style.
			array(
				'id'       => 'button_hover_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hover Style', 'appon' ),
				'subtitle' => esc_html__( 'Select Hover Style of the "Button".', 'appon' ),
				'options'  => array(
					'one'   => 'Style One (Fade)',
					'two'   => 'Style Two (Sweep Right)',
					'three' => 'Style Three (Zoom Out)',
					'four'  => 'Style Four (Fade with Icon Right)',
				),
				'default'  => 'four',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Contact Form', 'appon' ),
		'icon'       => 'el el-tasks',
		'id'         => 'contact_form_style',
		'subsection' => true,
		'fields'     => array(

		    // Height For Row Gap.
			array(
                'id'             => 'contact_form_style_row_gap',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => __( 'Gap For Rows', 'appon' ),
				'subtitle'       => __( 'Users can change gap for rows.', 'appon' ),
                'default'            => array(
                    'margin-top'     => '0px',
                    'margin-right'   => '0px',
                    'margin-bottom'  => '20px',
                    'margin-left'    => '0px',
                    'units'          => 'px',
                ),
                'output'         => array(
					'.radiant-contact-form .form-row, div.wpcf7-response-output',
				),
			),

			// Height For Input Fields.
			array(
				'id'       => 'contact_form_style_input_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Input Fields', 'appon' ),
				'subtitle' => __( 'Users can change height for Input Fields.', 'appon' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '45',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select',
				),
			),

			// Height For Textarea Fields.
			array(
				'id'       => 'contact_form_style_textarea_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Textarea Fields', 'appon' ),
				'subtitle' => __( 'Users can change height for Textarea Fields.', 'appon' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '100',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row textarea',
				),
			),

			// Padding For Input Fields Focus.
			array(
				'id'             => 'contact_form_style_input_padding_focus',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => false,
				'title'          => esc_html__( 'Padding For Input Fields Focus', 'appon' ),
				'subtitle'       => esc_html__( 'Users can change padding for input fields focus.', 'appon' ),
				'default'        => array(
					'padding-top'    => '0px',
					'padding-right'  => '0px',
					'padding-bottom' => '0px',
					'padding-left'   => '0px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiant-contact-form .form-row input[type=text]:focus, .radiant-contact-form .form-row input[type=email]:focus, .radiant-contact-form .form-row input[type=url]:focus, .radiant-contact-form .form-row input[type=tel]:focus, .radiant-contact-form .form-row input[type=number]:focus, .radiant-contact-form .form-row input[type=password]:focus, .radiant-contact-form .form-row input[type=date]:focus, .radiant-contact-form .form-row input[type=time]:focus, .radiant-contact-form .form-row select:focus, .radiant-contact-form .form-row textarea:focus',
				),
			),

			// Box Shadow For Input Fields.
			array(
				'id'       => 'contact_form_style_input_box_shadow',
				'type'     => 'box_shadow',
				'title'    => esc_html__( 'Box Shadow For Input Fields', 'appon' ),
				'subtitle' => esc_html__( 'Users can change the Box Shadow for input fields.', 'appon' ),
				'units'    => array( '' ),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select, .radiant-contact-form .form-row textarea',
				),
				'opacity'  => true,
				'rgba'     => true,
				'default'  => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '20px',
					'spread'       => '0',
					'opacity'      => '0.15',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Pages', 'appon' ),
		'icon'  => 'el el-book',
		'id'    => 'pages-option',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Error 404', 'appon' ),
		'icon'       => 'el el-error',
		'id'         => '404_error',
		'subsection' => true,
		'fields'     => array(

			// 404 Page Style.
			array(
				'id'       => '404_error_style',
				'type'     => 'select',
				'title'    => esc_html__( '404 Page Style', 'appon' ),
				'subtitle' => esc_html__( 'Select 404 Page Style of the website.', 'appon' ),
				'options'  => array(
					'one'   => 'Style One (Image and Text)',
					'two'   => 'Style Two (Image, Text and Button)',
					'three' => 'Style Three (Image, Text and Button)',
					'four'  => 'Style Four (Image, Text and Button)',
				),
				'default'  => 'one',
			),

			/* ============================= */
			// START OF 404 ERROR ONE OPTIONS
			/* ============================= */

			// Footer One Info.
			array(
				'id'    => '404_error_one_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style One Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error One Background.
			array(
				'id'       => '404_error_one_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style One".)', 'appon' ),
				'default'  => array(
					'background-color'      => '#3f198a',
				),
				'output'   => array(
					'.wraper_error_main.style-one',
				),
			),

			// 404 Error One Image.
			array(
				'id'       => '404_error_one_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'appon' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style One".)', 'appon' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/assets/images/404-Error-Style-One-Image.png',
				),
			),

			// 404 Error One Content.
			array(
				'id'       => '404_error_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style One".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Page Not Found</h1>",
			),

			// 404 Error One Button Text.
			array(
				'id'       => '404_error_one_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'appon' ),
				'default'  => esc_html__( 'Back To Home Page', 'appon' ),
			),

			// 404 Error One Button Link.
			array(
				'id'       => '404_error_one_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'appon' ),
			),

			/* ============================= */
			// END OF 404 ERROR ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF 404 ERROR TWO OPTIONS
			/* ============================= */

			// 404 Error Two Info.
			array(
				'id'    => '404_error_two_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Two Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Two Background.
			array(
				'id'       => '404_error_two_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Two".)', 'appon' ),
				'default'  => array(
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-two',
				),
			),

			// 404 Error Two Image.
			array(
				'id'       => '404_error_two_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'appon' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Two".)', 'appon' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/assets/images/404-Error-Style-Two-Image.png',
				),
			),

			// 404 Error Two Content.
			array(
				'id'       => '404_error_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Two".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>The requested page could not be found!</h1>",
			),

			// 404 Error Two Button Text.
			array(
				'id'       => '404_error_two_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Two".', 'appon' ),
				'default'  => esc_html__( 'Back To Home Page', 'appon' ),
			),

			// 404 Error Two Button Link.
			array(
				'id'       => '404_error_two_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Two".', 'appon' ),
				'default'  => esc_html__( '#', 'appon' ),
			),

			/* ============================= */
			// END OF 404 ERROR TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF 404 ERROR THREE OPTIONS
			/* ============================= */

			// 404 Error Three Info.
			array(
				'id'    => '404_error_three_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Three Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Three Background.
			array(
				'id'       => '404_error_three_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Three".)', 'appon' ),
				'default'  => array(
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-three',
				),
			),

			// 404 Error Three Image.
			array(
				'id'       => '404_error_three_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'appon' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Three".)', 'appon' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/assets/images/404-Error-Style-Three-Image.png',
				),
			),

			// 404 Error Three Content.
			array(
				'id'       => '404_error_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Three".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Oops!</h1><h2>We can't seem to find the page you're looking for.</h2>",
			),

			// 404 Error Three Button Text.
			array(
				'id'       => '404_error_three_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Three".', 'appon' ),
				'default'  => esc_html__( 'Back To Home Page', 'appon' ),
			),

			// 404 Error Three Button Link.
			array(
				'id'       => '404_error_three_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Three".', 'appon' ),
				'default'  => esc_html__( '#', 'appon' ),
			),

			/* ============================= */
			// END OF 404 ERROR THREE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF 404 ERROR FOUR OPTIONS
			/* ============================= */

			// 404 Error Four Info.
			array(
				'id'    => '404_error_four_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Four Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Four Background.
			array(
				'id'       => '404_error_four_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Four".)', 'appon' ),
				'default'  => array(
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-four',
				),
			),

			// 404 Error Four Image.
			array(
				'id'       => '404_error_four_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'appon' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Four".)', 'appon' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/assets/images/404-Error-Style-Four-Image.png',
				),
			),

			// 404 Error Four Content.
			array(
				'id'       => '404_error_four_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Four".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Sorry! This Page Was Lost</h1>",
			),

			// 404 Error Four Button Text.
			array(
				'id'       => '404_error_four_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Four".', 'appon' ),
				'default'  => esc_html__( 'Back To Home Page', 'appon' ),
			),

			// 404 Error Four Button Link.
			array(
				'id'       => '404_error_four_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'appon' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Four".', 'appon' ),
				'default'  => esc_html__( '#', 'appon' ),
			),

			/* ============================= */
			// END OF 404 ERROR FOUR OPTIONS
			/* ============================= */

		),
	)
);
if (  class_exists( 'Radiantthemes_Addons' ) ) {
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Maintenance Mode', 'appon' ),
		'icon'       => 'el el-broom',
		'id'         => 'maintenance_mode',
		'subsection' => true,
		'fields'     => array(

			// Maintenance Mode Switch.
			array(
				'id'       => 'maintenance_mode_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Maintenance Mode?', 'appon' ),
				'subtitle' => esc_html__( 'Choose if want to Activate Maintenance Mode.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Maintenance Mode Style.
			array(
				'id'       => 'maintenance_mode_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Maintenance Mode Style', 'appon' ),
				'subtitle' => esc_html__( 'Select Maintenance Mode Style of the website.', 'appon' ),
				'options'  => array(
					'one'   => 'Style One (Background With Text)',
					'two'   => 'Style Two (Image With Text)',
					'three' => 'Style Three (Background With Text)',
				),
				'default'  => 'one',
			),

			/* ============================= */
			// START OF MAINTENANCE MODE ONE OPTIONS
			/* ============================= */

			// Maintenance Mode One Info.
			array(
				'id'    => 'maintenance_mode_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Maintenance Mode Style One Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Maintenance Mode One Background.
			array(
				'id'       => 'maintenance_mode_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Maintenance Mode Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style One".)', 'appon' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-One-Image.png',
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_maintenance_main.style-one',
				),
			),

			// Maintenance Mode One Content.
			array(
				'id'       => 'maintenance_mode_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Maintenance Mode Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style One".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>",
			),

			/* ============================= */
			// END OF MAINTENANCE MODE ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF MAINTENANCE MODE TWO OPTIONS
			/* ============================= */

			// Maintenance Mode Two Info.
			array(
				'id'    => 'maintenance_mode_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Maintenance Mode Style Two Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Maintenance Mode Two Background.
			array(
				'id'       => 'maintenance_mode_two_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Maintenance Mode Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style Two".)', 'appon' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-Two-Image.png',
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_maintenance_main.style-two',
				),
			),

			// Maintenance Mode Two Content.
			array(
				'id'       => 'maintenance_mode_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Maintenance Mode Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style Two".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1><strong>This Website Is</strong> Under Construction.</h1><h2>Please Check Back Soon...</h2>",
			),

			/* ============================= */
			// END OF MAINTENANCE MODE TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF MAINTENANCE MODE THREE OPTIONS
			/* ============================= */

			// Maintenance Mode Three Info.
			array(
				'id'    => 'maintenance_mode_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Maintenance Mode Style Three Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Maintenance Mode Three Background.
			array(
				'id'       => 'maintenance_mode_three_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Maintenance Mode Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style Three".)', 'appon' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-Three-Image.png',
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_maintenance_main.style-three',
				),
			),

			// Maintenance Mode Three Content.
			array(
				'id'       => 'maintenance_mode_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Maintenance Mode Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style Three".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>",
			),

			/* ============================= */
			// END OF MAINTENANCE MODE THREE OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Coming Soon', 'appon' ),
		'icon'       => 'el el-warning-sign',
		'id'         => 'coming_soon',
		'subsection' => true,
		'fields'     => array(

			// Coming Soon Switch.
			array(
				'id'       => 'coming_soon_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Coming Soon', 'appon' ),
				'subtitle' => esc_html__( 'Choose if want to activate Coming Soon mode.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			// Coming Soon Launch Date-Time.
			array(
				'id'       => 'coming_soon_datetime',
				'type'     => 'text',
				'title'    => esc_html__( 'Launch Date & Time', 'appon' ),
				'subtitle' => esc_html__( 'Enter Launch Date & Time.', 'appon' ),
				'default'  => '2019-08-25 12:00',
			),

			// Coming Soon Style.
			array(
				'id'       => 'coming_soon_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Coming Soon Style', 'appon' ),
				'subtitle' => esc_html__( 'Select Coming Soon Style of the website.', 'appon' ),
				'options'  => array(
					'one'   => 'Style One',
					'two'   => 'Style Two',
					'three' => 'Style Three',
				),
				'default'  => 'one',
			),

			/* ============================= */
			// START OF COMING SOON ONE OPTIONS
			/* ============================= */

			// Coming Soon One Info.
			array(
				'id'    => 'coming_soon_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Coming Soon Style One Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Coming Soon One Background.
			array(
				'id'       => 'coming_soon_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Coming Soon Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style One".)', 'appon' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-One-Background-Image.png',
					'background-color'      => '#000000',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_comingsoon_main.style-one',
				),
			),

			// Coming Soon One Content.
			array(
				'id'       => 'coming_soon_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Coming Soon Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style One".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Our New Site Is Coming Soon</h1><h2>Stay tuned for something amazing</h2>",
			),

			/* ============================= */
			// END OF COMING SOON ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF COMING SOON TWO OPTIONS
			/* ============================= */

			// Coming Soon Two Info.
			array(
				'id'    => 'coming_soon_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Coming Soon Style Two Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Coming Soon Two Background.
			array(
				'id'       => 'coming_soon_two_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Coming Soon Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style Two".)', 'appon' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-Two-Background-Image.png',
					'background-color'      => '#000000',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_comingsoon_main.style-two',
				),
			),

			// Coming Soon Two Content.
			array(
				'id'       => 'coming_soon_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Coming Soon Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style Two".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Coming Soon</h1><h2>Stay tuned for something amazing</h2>",
			),

			/* ============================= */
			// END OF COMING SOON TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF COMING SOON THREE OPTIONS
			/* ============================= */

			// Coming Soon Three Info.
			array(
				'id'    => 'coming_soon_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Coming Soon Style Three Settings', 'appon' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Coming Soon Three Background.
			array(
				'id'       => 'coming_soon_three_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Coming Soon Background', 'appon' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style Three".)', 'appon' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-Three-Background-Image.png',
					'background-color'      => '#000000',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_comingsoon_main.style-three',
				),
			),

			// Coming Soon Three Content.
			array(
				'id'       => 'coming_soon_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Coming Soon Content', 'appon' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style Three".)', 'appon' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Our Awesome Website Is <strong>Coming Soon!</strong></h1><h2>Stay tuned for something amazing</h2>",
			),

			/* ============================= */
			// END OF COMING SOON THREE OPTIONS
			/* ============================= */

		),
	)
);
}
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Search', 'appon' ),
		'icon'       => 'el el-search-alt',
		'id'         => 'search',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'search_page_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Search Page Banner Image', 'appon' ),
				'subtitle' => esc_html__( 'Select search page banner image', 'appon' ),
			),

			array(
				'id'       => 'search_page_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Title', 'appon' ),
				'subtitle' => esc_html__( 'Enter search page banner title', 'appon' ),
				'default'  => 'Search',
			),

			array(
				'id'       => 'search_page_banner_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Subtitle', 'appon' ),
				'subtitle' => esc_html__( 'Enter search page banner subtitle', 'appon' ),
				'default'  => '',
			),

		),
	)
);
if ( class_exists( 'Tribe__Events__Main' ) ) {
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Event', 'appon' ),
		'icon'       => 'el el-calendar',
		'id'         => 'banner_layout',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'events_banner_details',
				'type'     => 'select',
				'title'    => esc_html__( 'Banner Details', 'appon' ),
				'subtitle' => esc_html__( 'Select Banner options', 'appon' ),
				'options'  => array(
					'banner-breadcumbs'    => 'Short Banner With Breadcumbs',
					'banner-only'          => 'Short Banner Only',
					'breadcumbs-only'      => 'Breadcumbs Only',
					'none'                 => 'None',
				),
				'default'  => 'banner-breadcumbs',
			),
			array(
				'id'       => 'event_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Event Banner Image', 'appon' ),
				'subtitle' => esc_html__( 'Select event banner image', 'appon' ),
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
			array(
				'id'       => 'event_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Event Title', 'appon' ),
				'subtitle' => esc_html__( 'Enter event banner title', 'appon' ),
				'default'  => 'Events',
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
			array(
				'id'       => 'event_banner_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Event Subtitle', 'appon' ),
				'subtitle' => esc_html__( 'Enter event banner subtitle', 'appon' ),
				'default'  => '',
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
		),
	)
);
}

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Blog', 'appon' ),
		'icon'  => 'el el-bullhorn',
		'id'    => 'blog',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Blog Layout', 'appon' ),
		'icon'       => 'el el-check-empty',
		'id'         => 'blog_layout',
		'subsection' => true,
		'fields'     => array(

			// Blog Style.
			array(
				'id'       => 'blog-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Style', 'appon' ),
				'subtitle' => esc_html__( 'Select blog style', 'appon' ),
				'options'  => array(
					'default'   => array(
						'alt'   => 'Default',
						'img'  => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Default.png',
						'title' => esc_html__( 'Default', 'appon' ),
					),
					'one'   => array(
						'alt' => 'Classic',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Classic.png',
						'title' => esc_html__( 'Classic', 'appon' ),
					),
					'two'   => array(
						'alt' => 'Masonry',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Masonry.png',
						'title' => esc_html__( 'Masonry', 'appon' ),
					),
					'three' => array(
						'alt' => 'List',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List.png',
						'title' => esc_html__( 'List', 'appon' ),
					),
					'four' => array(
						'alt' => 'Masonry (No Image)',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List-No-Image.png',
						'title' => esc_html__( 'List (No Image)', 'appon' ),
					),
					'five' => array(
						'alt' => 'Standard',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Metro.png',
						'title' => esc_html__( 'Standard', 'appon' ),
					),
				),
				'default'  => 'default',
			),

			// Blog Layout.
			array(
				'id'       => 'blog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Layout', 'appon' ),
				'subtitle' => esc_html__( 'Select blog layout', 'appon' ),
				'options'  => array(
					'leftsidebar'  => array(
						'alt' => 'Left Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Left-Sidebar.png',
					),
					'nosidebar'    => array(
						'alt' => 'No Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-No-Sidebar.png',
					),
					'rightsidebar' => array(
						'alt' => 'Right Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Right-Sidebar.png',
					),
				),
				'default'  => 'rightsidebar',
				'required' => array(
					array(
						'blog-style',
						'!=',
						'default',
					),
				),
			),

			// Blog Layout Sidebar Width.
			array(
				'id'       => 'blog-layout-sidebar-width',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Width', 'appon' ),
				'subtitle' => esc_html__( 'Select sidebar width for blog pages.', 'appon' ),
				'options'  => array(
					'three-grid'  => '3 Grids',
					'four-grid'   => '4 Grids',
					'five-grid'   => '5 Grids',
				),
				'default'  => 'three-grid',
				'required' => array(
					array(
						'blog-layout',
						'!=',
						'nosidebar',
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Blog Options', 'appon' ),
		'icon'       => 'el el-ok-sign',
		'id'         => 'blog_options',
		'subsection' => true,
		'fields'     => array(
		    array(
				'id'       => 'display_social_sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Social Sharing Box', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to show Social Sharing icons on Blog Page (applicable for default structure).', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),
			array(
				'id'       => 'display_author_information',
				'type'     => 'switch',
				'title'    => esc_html__( 'Author Information Box', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to show author information on Blog Details Page.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_categries',
				'type'     => 'switch',
				'title'    => esc_html__( 'Categories', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to show the categories on both Blog Page and Blog Details Page.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Tags', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to show the tags on both Blog Page and Blog Details Page.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_navigation',
				'type'     => 'switch',
				'title'    => esc_html__( 'Navigation', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to previous and next navigation the Previous/Next Navigation on Blog Details Page.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_related_article',
				'type'     => 'switch',
				'title'    => esc_html__( 'Related Article', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to show related article on Blog Details Page.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => false,
			),

			array(
				'id'       => 'blog_comment_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Comments', 'appon' ),
				'subtitle' => esc_html__( 'Select if you want to show comments on Blog Details Page.', 'appon' ),
				'on'       => esc_html__( 'Yes', 'appon' ),
				'off'      => esc_html__( 'No', 'appon' ),
				'default'  => true,
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Team', 'appon' ),
		'icon'  => 'el el-user',
		'id'    => 'team',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Team Details', 'appon' ),
		'icon'       => 'el el-address-book',
		'id'         => 'team_details',
		'subsection' => true,
		'fields'     => array(

			// Team Details Style.
			array(
				'id'       => 'team_details_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Team Details Style', 'appon' ),
				'subtitle' => esc_html__( 'Select team details style', 'appon' ),
				'options'  => array(
					'blank'   => array(
						'alt' => 'Blank',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-Blank.png',
						'title' => esc_html__( 'Blank', 'appon' ),
					),
					'one'   => array(
						'alt' => 'Style One',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-One.png',
						'title' => esc_html__( 'Style One', 'appon' ),
					),
				),
				'default'  => 'blank',
			),

		),
	)
);

if ( class_exists( 'woocommerce' ) ) {

	Redux::setSection(
		$opt_name, array(
			'title' => esc_html__( 'Shop', 'appon' ),
			'icon'  => 'el el-shopping-cart',
			'id'    => 'shop',
		)
	);

	Redux::setSection(
		$opt_name, array(
			'title'      => esc_html__( 'Product Listing', 'appon' ),
			'icon'       => 'el el-list-alt',
			'id'         => 'product_listing',
			'subsection' => true,
			'fields'     => array(

				// Product Listing Layout.
				array(
					'id'       => 'shop-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Listing Layout', 'appon' ),
					'subtitle' => esc_html__( 'Select Product Listing Layout', 'appon' ),
					'options'  => array(
						'shop-style-three-column' => array(
						    'title'  => 'Three Column',
							'alt'    => 'Three Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-One.jpg',
						),
						'shop-style-four-column'   => array(
						    'title'  => 'Four Column',
							'alt'    => 'Four Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Two.jpg',
						),
						'shop-style-five-column' => array(
						    'title'  => 'Five Column',
							'alt'    => 'Five Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Three.jpg',
						),
						'shop-style-six-column'  => array(
						    'title'  => 'Six Column',
							'alt'    => 'Six Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Four.jpg',
						),
					),
					'default'  => 'shop-style-four-column',
				),

				//Products Per Page.
				array(
    				'id'       => 'shop-products-per-page',
    				'type'     => 'text',
    				'title'    => esc_html__( 'Products Per Page', 'appon' ),
    				'subtitle' => esc_html__( 'Put number of products you wants to show per page', 'appon' ),
    				'default'  => '12',
    				'validate' => 'numeric'
			    ),

				// Sidebar.
				array(
					'id'       => 'shop-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar.', 'appon' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'appon' ),
					'options'  => array(
						'shop-leftsidebar'  => array(
							'alt' => 'Left Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Left-Sidebar.jpg',
						),
						'shop-nosidebar'    => array(
							'alt' => 'No Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-No-Sidebar.jpg',
						),
						'shop-rightsidebar' => array(
							'alt' => 'Right Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-nosidebar',
				),

				// Shop Box Style.
				array(
					'id'       => 'shop_box_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Box Style', 'appon' ),
					'subtitle' => esc_html__( 'Select Style of the Shop Box.', 'appon' ),
					'options'  => array(
						'style-one'  => array(
						    'title' => 'Overlay',
							'alt'   => 'Overlay',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-One.jpg',
						),
						'style-two' => array(
						    'title' => 'Minimal',
							'alt'   => 'Minimal',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Two.jpg',
						),
						'style-three' => array(
						    'title' => 'Classic',
							'alt'   => 'Classic',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Three.jpg',
						),
						'style-four' => array(
						    'title' => 'Simple',
							'alt'   => 'Simple',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Four.jpg',
						),
						'style-five' => array(
						    'title' => 'Detailed',
							'alt'   => 'Detailed',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Five.jpg',
						),
					),
					'default'  => 'style-one',
				),

			),
		)
	);

	Redux::setSection(
		$opt_name, array(
			'title'      => esc_html__( 'Product Details', 'appon' ),
			'icon'       => 'el el-shopping-cart',
			'id'         => 'product_details',
			'subsection' => true,
			'fields'     => array(

				// Product Details Layout.
				array(
					'id'       => 'shop-details-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Details Layout', 'appon' ),
					'subtitle' => esc_html__( 'Select Product Details Layout', 'appon' ),
					'options'  => array(
						'style-one' => array(
							'alt'   => 'Style One',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-One.jpg',
						),
						'style-two' => array(
							'alt'   => 'Style Two',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-Two.jpg',
						),
						'style-three' => array(
							'alt'   => 'Style Three',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-Three.jpg',
						),
					),
					'default'  => 'style-one',
				),

				// Sidebar.
				array(
					'id'       => 'shop-details-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar', 'appon' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'appon' ),
					'options'  => array(
						'shop-details-leftsidebar'  => array(
							'alt'   => 'Left Sidebar',
							'title' => 'Left Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Left-Sidebar.jpg',
						),
						'shop-details-nosidebar'    => array(
							'alt'   => 'No Sidebar',
							'title' => 'No Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-No-Sidebar.jpg',
						),
						'shop-details-rightsidebar' => array(
							'alt'   => 'Right Sidebar',
							'title' => 'Right Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-details-nosidebar',
				),

			),
		)
	);

}

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Social Icons', 'appon' ),
		'icon'    => 'el el-globe',
		'id'      => 'social_icons',
		'submenu' => false,
		'fields'  => array(

			// Open social links in new window.
			array(
				'id'      => 'social-icon-target',
				'type'    => 'switch',
				'title'   => esc_html__( 'Open links in new window', 'appon' ),
				'desc'    => esc_html__( 'Open social links in new window', 'appon' ),
				'default' => true,
			),

			// Google +.
			array(
				'id'      => 'social-icon-googleplus',
				'type'    => 'text',
				'title'   => esc_html__( 'Google +', 'appon' ),
				'desc'    => esc_html__( 'Link to the profile page', 'appon' ),
				'default' => '#',
			),

			// Facebook.
			array(
				'id'      => 'social-icon-facebook',
				'type'    => 'text',
				'title'   => esc_html__( 'Facebook', 'appon' ),
				'desc'    => esc_html__( 'Link to the profile page', 'appon' ),
				'default' => '#',
			),

			// Twitter.
			array(
				'id'      => 'social-icon-twitter',
				'type'    => 'text',
				'title'   => esc_html__( 'Twitter', 'appon' ),
				'desc'    => esc_html__( 'Link to the profile page', 'appon' ),
				'default' => '#',
			),

			// Vimeo.
			array(
				'id'      => 'social-icon-vimeo',
				'type'    => 'text',
				'title'   => esc_html__( 'Vimeo', 'appon' ),
				'desc'    => esc_html__( 'Link to the profile page', 'appon' ),
				'default' => '#',
			),

			// YouTube.
			array(
				'id'    => 'social-icon-youtube',
				'type'  => 'text',
				'title' => esc_html__( 'YouTube', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Flickr.
			array(
				'id'    => 'social-icon-flickr',
				'type'  => 'text',
				'title' => esc_html__( 'Flickr', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// LinkedIn.
			array(
				'id'    => 'social-icon-linkedin',
				'type'  => 'text',
				'title' => esc_html__( 'LinkedIn', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Pinterest.
			array(
				'id'    => 'social-icon-pinterest',
				'type'  => 'text',
				'title' => esc_html__( 'Pinterest', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Xing.
			array(
				'id'    => 'social-icon-xing',
				'type'  => 'text',
				'title' => esc_html__( 'Xing', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Viadeo.
			array(
				'id'    => 'social-icon-viadeo',
				'type'  => 'text',
				'title' => esc_html__( 'Viadeo', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Vkontakte.
			array(
				'id'    => 'social-icon-vkontakte',
				'type'  => 'text',
				'title' => esc_html__( 'Vkontakte', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Tripadvisor.
			array(
				'id'    => 'social-icon-tripadvisor',
				'type'  => 'text',
				'title' => esc_html__( 'Tripadvisor', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Tumblr.
			array(
				'id'    => 'social-icon-tumblr',
				'type'  => 'text',
				'title' => esc_html__( 'Tumblr', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Behance.
			array(
				'id'    => 'social-icon-behance',
				'type'  => 'text',
				'title' => esc_html__( 'Behance', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Instagram.
			array(
				'id'    => 'social-icon-instagram',
				'type'  => 'text',
				'title' => esc_html__( 'Instagram', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Dribbble.
			array(
				'id'    => 'social-icon-dribbble',
				'type'  => 'text',
				'title' => esc_html__( 'Dribbble', 'appon' ),
				'desc'  => esc_html__( 'Link to the profile page', 'appon' ),
			),

			// Skype.
			array(
				'id'    => 'social-icon-skype',
				'type'  => 'text',
				'title' => esc_html__( 'Skype', 'appon' ),
				'desc'  => wp_kses_post( 'Skype login. You can use <strong>callto:</strong> or <strong>skype:</strong> prefix' ),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Custom CSS', 'appon' ),
		'icon'    => 'el el-css',
		'id'      => 'radiantthemes_custom_css_section',
		'submenu' => false,
		'fields'  => array(

			// Custom CSS Editor.
			array(
                'id'       => 'radiantthemes_custom_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'appon' ),
				'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'appon' ),
				'mode'     => 'css',
				'compiler' => true,
                'theme'    => 'chrome',
                'default'  => ""
            ),

		),
	)
);


// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);


if ( ! function_exists( 'compiler_action' ) ) {
	function compiler_action( $options, $css, $changed_values ) {
		global $wp_filesystem;

		$filename = get_parent_theme_file_path( '/assets/css/radiantthemes-user-custom.css' );
		$css = $options['radiantthemes_custom_css_editor'];

		if( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		if( $wp_filesystem ) {
			$wp_filesystem->put_contents(
				$filename,
				$css,
				FS_CHMOD_FILE // predefined mode settings for WP files
			);
		}
	}
}

    function radiant_get_custom_footers_list() {
    	$footers = array('' => __('Default', 'appon'));
    	$footers_list = get_posts( 'post_type="radiant_footer"&post_status="private"&numberposts=-1' );
    	foreach ($footers_list as $footer) {
    	 $footers[$footer->ID] = $footer->post_title . ' (ID = ' . $footer->ID . ')';
    	}
    	return $footers;
    }
