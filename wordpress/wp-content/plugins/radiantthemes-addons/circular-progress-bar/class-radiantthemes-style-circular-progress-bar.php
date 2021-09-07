<?php
/**
 * Circular Progress Bar Text Style Addon
 *
 * @package RadiantThemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Circular_Progress_Bar' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Circular_Progress_Bar extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Circular Progress Bar', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add Circular Progress Bar on the page', 'radiantthemes-addons' ),
					'base'        => 'circular_progress_bar_style',
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Circular-Progress-Bar-Text-Element-Icon.png' ),
					'class'       => 'circular_progress_bar_style_class',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(

						// BASIC.
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Percentage', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter Percentage (ex. 40)', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_percentage',
							'value'       => '40',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Duration', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter Duration (in milliseconds)', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_duration',
							'value'       => '2000',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_animation',
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_extra_class',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'param_name'  => 'circular_progress_bar_extra_id',
							'admin_label' => true,
						),
						
						// PROGRESS ATRIBUTES.
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select background color.', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_progress_background_color',
							'value'       => '#f2f2f2',
							'group'       => esc_html__( 'Progress', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Progress Color', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select progress color.', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_progress_progress_color',
							'value'       => '#bf0000',
							'group'       => esc_html__( 'Progress', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						
						// PERCENTAGE ATRIBUTES.
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select background color.', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_percentage_background_color',
							'value'       => '#ffffff',
							'group'       => esc_html__( 'Percentage', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Font Size', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter font size (ex. 20px)', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_percentage_font_size',
							'group'       => esc_html__( 'Percentage', 'radiantthemes-addons' ),
							'value'       => '20px',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Line Height', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter line height (ex. 26px)', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_percentage_line_height',
							'group'       => esc_html__( 'Percentage', 'radiantthemes-addons' ),
							'value'       => '35px',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font color.', 'radiantthemes-addons' ),
							'param_name'  => 'circular_progress_bar_percentage_font_color',
							'value'       => '#252525',
							'group'       => esc_html__( 'Percentage', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						
						// DESIGN.
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'circular_progress_bar_style_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'circular_progress_bar_style', array( $this, 'radiantthemes_circular_progress_bar_style_func' ) );
		}

		/**
		 * [radiantthemes_circular_progress_bar_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_circular_progress_bar_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
				    'circular_progress_bar_percentage'                    => '45',
				    'circular_progress_bar_duration'                      => '2000',
				    'circular_progress_bar_progress_background_color'     => '#f2f2f2',
                    'circular_progress_bar_progress_progress_color'       => '#bf0000',
                    'circular_progress_bar_percentage_background_color'   => '#ffffff',
                    'circular_progress_bar_percentage_font_size'          => '20px',
                    'circular_progress_bar_percentage_line_height'        => '35px',
                    'circular_progress_bar_percentage_font_color'         => '#252525',
					'circular_progress_bar_animation'                     => '',
					'circular_progress_bar_extra_class'                   => '',
					'circular_progress_bar_extra_id'                      => '',
					'circular_progress_bar_style_css'                     => '',
				), $atts
			);

			// ADD ANIMATION.
			$animation_classes = $this->getCSSAnimation( $shortcode['circular_progress_bar_animation'] );

			// ADD DESIGN CSS.
			$circular_progress_bar_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['circular_progress_bar_style_css'], ' ' ), $atts );

			// ADD RANDOM CLASS.
			$circular_progress_bar_random_class = 'rt' . rand();

			// ADD EXTRA ID.
			$circular_progress_bar_extra_id = $shortcode['circular_progress_bar_extra_id'] ? 'id="' . esc_attr( $shortcode['circular_progress_bar_extra_id'] ) . '"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			// ADD CUSTOM CSS.
			$circular_progress_bar_custom_css = ".radiantthemes-circular-progress-bar.element-one.{$circular_progress_bar_random_class} div span{
                background-color: {$shortcode['circular_progress_bar_percentage_background_color']} ;
                font-size: {$shortcode['circular_progress_bar_percentage_font_size']} ;
                color: {$shortcode['circular_progress_bar_percentage_font_color']} ;
                line-height: {$shortcode['circular_progress_bar_percentage_line_height']} ;
            }";
			wp_add_inline_style( 'radiantthemes-addons-custom', $circular_progress_bar_custom_css );

			// START OF CIRCULAR PROGRESS BAR.
			$output = "\r" . '<!-- radiantthemes-circular-progress-bar -->' . "\r";
            $output .= '<div class="radiantthemes-circular-progress-bar element-one ' . $circular_progress_bar_random_class . ' ' . $animation_classes . ' ' . $circular_progress_bar_class . ' ' . esc_attr( $shortcode['circular_progress_bar_extra_class'] ) . '" ' . $circular_progress_bar_extra_id . '>';
            $output .= '<div class="radiantthemes-circular-progress-bar-main" data-percent="' . $shortcode['circular_progress_bar_percentage'] . '" data-duration="' . $shortcode['circular_progress_bar_duration'] . '" data-color="' . $shortcode['circular_progress_bar_progress_background_color'] . ' , ' . $shortcode['circular_progress_bar_progress_progress_color'] . '"></div>';
            $output .= '</div>';
			$output .= '<!-- radiantthemes-circular-progress-bar -->' . "\r";
			return $output;
			// END OF CIRCULAR PROGRESS BAR.
		}

	}
}
