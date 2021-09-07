<?php
/**
 * Separator Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Progressbar' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Progressbar extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Progress Bar', 'radiantthemes-addons' ),
					'base'        => 'rt_progressbar_style',
					'description' => esc_html__( 'Radiant Theme Progress Bar', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/ProgressBar-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_progressbar_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progressbar Title', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_title',
							'value'       => 'This is progress bar element',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_color',
							'description' => esc_html__( 'Set your Progressbar Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progressbar Height', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter measurement units (Example: px)', 'radiantthemes-addons' ),
							'admin_label' => true,
							'param_name'  => 'progressbar_height',
							'value'       => '15px',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progress Percentage', 'radiantthemes-addons' ),
							'param_name'  => 'progress_width',
							'value'       => array(
								'100%',
								'90%',
								'80%',
								'70%',
								'60%',
								'50%',
								'40%',
								'30%',
								'20%',
								'10%',
			                ),
							'std'         => '80%',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Animation', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_animated',
							'value'       => array(
								esc_html__( 'true', 'radiantthemes-addons' )  => 'active',
								esc_html__( 'false', 'radiantthemes-addons' ) => ' ',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Striped', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_striped',
							'value'       => array(
								esc_html__( 'true', 'radiantthemes-addons' )  => 'progress-bar-striped',
								esc_html__( 'false', 'radiantthemes-addons' ) => ' ',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),

					),
				)
			);
			add_shortcode( 'rt_progressbar_style', array( $this, 'radiantthemes_progressbar_style_func' ) );
		}

		/**
		 * [radiantthemes_progressbar_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_progressbar_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'progressbar_height'   => '15px',
					'progress_width'       => '80%',
					'progressbar_title'    => 'This is progress bar element',
					'progressbar_color'    => '',
					'progressbar_striped'  => 'progress-bar-striped',
					'progressbar_animated' => 'active',
					'extra_class'          => '',
					'extra_id'             => '',
				), $atts
			);
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();
			if($shortcode['progressbar_color']) {
				// CUSTOM CSS.
				$custom_css = ".rt-progress-bar.element-one.{$random_class} > .progress > .progress-bar{
					background-color: {$shortcode['progressbar_color']} ;
				}";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}

			$progress_id = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';
			// MAIN LAYOUT.
			$output  = '<!-- rt-progress-bar -->';
			$output .= '<div ' . esc_attr( $progress_id ). ' class="rt-progress-bar element-one ' . $random_class . ' ' . $shortcode['extra_class'] . '" data-progress-bar-width="' . esc_attr( $shortcode['progress_width'] ) . '" data-progress-bar-height="' . esc_attr( $shortcode['progressbar_height'] ) . '">';
			$output .= '<div class="title">' . esc_attr( $shortcode['progressbar_title'] );
			$output .= '<span class="progress-width"></span>';
			$output .= '</div>';
			$output .= '<div class="progress">';
			$output .= '<div class="progress-bar ' . esc_attr( $shortcode['progressbar_striped'] ) . ' ' . esc_attr( $shortcode['progressbar_animated'] ) . ' " ></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<!-- rt-progress-bar -->';

			return $output;
		}
	}
}
