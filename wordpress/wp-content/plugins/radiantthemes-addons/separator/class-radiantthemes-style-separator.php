<?php
/**
 * Separator Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Separator' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Separator extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Separator', 'radiantthemes-addons' ),
					'base'        => 'rt_separator_style',
					'description' => esc_html__( 'Radiant Theme Separator', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Separator-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_separator_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Separator Style', 'radiantthemes-addons' ),
							'param_name'  => 'radiantthemes_separator_style',
							'value'       => array(
								esc_html__( 'Style One (Line Style)', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Separator Width (In Pixels) eg. 50px', 'radiantthemes-addons' ),
							'param_name'  => 'radiantthemes_separator_width',
							'value'       => '50px',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Separator Height (In Pixels) eg. 5px', 'radiantthemes-addons' ),
							'param_name'  => 'radiantthemes_separator_height',
							'value'       => '5px',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Separator Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiantthemes_separator_color',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Separator Gap Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiantthemes_separator_gap_color',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__(  'Separator Direction', 'radiantthemes-addons' ),
							'param_name'  => 'radiantthemes_separator_direction',
							'value'       => array(
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'         => 'center',
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
			add_shortcode( 'rt_separator_style', array( $this, 'radiantthemes_separator_style_func' ) );
		}

		/**
		 * [radiantthemes_separator_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_separator_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
                    'radiantthemes_separator_style'     => 'one',
                    'radiantthemes_separator_width'     => '50px',
                    'radiantthemes_separator_height'    => '5px',
                    'radiantthemes_separator_color'     => '#000000',
                    'radiantthemes_separator_gap_color' => '#ffffff',
                    'radiantthemes_separator_direction' => 'center',
					'extra_class'                       => '',
					'extra_id'                          => '',
				), $atts
			);

			// GENERATE CUSTOM ID.
			$separator_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output = '<!-- radiantthemes-separator -->';
			$output .= '<div ' . $separator_id . ' class="radiantthemes-separator element-' . esc_attr( $shortcode['radiantthemes_separator_style'] ) . ' text-' . esc_attr( $shortcode['radiantthemes_separator_direction'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '">';
			$output .= '<div class="radiantthemes-separator-block" style="width: ' . esc_attr( $shortcode['radiantthemes_separator_width'] ) . ' ; height: ' . esc_attr( $shortcode['radiantthemes_separator_height'] ) . ' ; background-color: ' . esc_attr( $shortcode['radiantthemes_separator_color'] ) . ' ;">';
			$output .= '<div class="radiantthemes-separator-block-gap" style="background-color: ' . esc_attr( $shortcode['radiantthemes_separator_gap_color'] ) . ' ;"></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<!-- radiantthemes-separator -->';
			return $output;
		}
	}
}
