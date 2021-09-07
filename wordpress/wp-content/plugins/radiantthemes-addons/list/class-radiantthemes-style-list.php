<?php
/**
 * List Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_List' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_List extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'List', 'radiantthemes-addons' ),
					'base'        => 'rt_list_style',
					'description' => esc_html__( 'Add List with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'List Style', 'radiantthemes-addons' ),
							'param_name'  => 'list_style',
							'value'       => array(
								'Style One (Right Arrow Circle)'         => 'one',
								'Style Two (Right Double Angle)'         => 'two',
								'Style Three (Right Arrow Circle Solid)' => 'three',
								'Style Four (Right Carret)'              => 'four',
								'Style Five (Check Circle)'              => 'five',
								'Style Six (Check Circle Solid)'         => 'six',
								'Style Seven (Dot)'                      => 'seven',
								'Style Eight (Square)'                   => 'eight',
								'Style Nine (Star)'                      => 'nine',
								'Style Ten (Right Arrow)'                => 'ten',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea_html',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name'  => 'content',
							'value'       => wp_kses_post(
								'<ul>
                                    <li>List Item Text One</li>
                                    <li>List Item Text Two</li>
                                    <li>List Item Text Three</li>
                                </ul>', 'radiantthemes-addons'
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'List Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'list_color',
							'description' => esc_html__( 'Set your List Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'list_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'list_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'list_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'list_css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_list_style', array( $this, 'radiantthemes_list_style_func' ) );
		}

		/**
		 * [radiantthemes_list_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_list_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'list_style'        => 'one',
                    'list_color'        => '',
                    'list_animation'    => '',
                    'list_extra_class'  => '',
                    'list_extra_id'     => '',
                    'list_css'          => '',
				), $atts
			);
			
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['list_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['list_animation'], ' ' ), $atts );
			
			// ADD DESIGN CSS.
			$list_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['list_css'], ' ' ), $atts );
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();

			if ( ! empty( $shortcode['list_color'] ) ) {
				// ADD CUSTOM CSS.
				$custom_css = ".radiantthemes-list.{$random_class} ul li:before{
					color: {$shortcode['list_color']};
				}";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}
			// GET ID.
			$list_id = $shortcode['list_extra_id'] ? 'id="' . esc_attr( $shortcode['list_extra_id'] ) . '"' : '';
			
			// MAIL LAYOUT.
			$output  = "\r" . '<!-- list -->' . "\r";
			$output .= '<div class="radiantthemes-list ' . esc_attr( $random_class ) . ' element-' . esc_attr( $shortcode['list_style'] );
			$output .= ' ' . $animation_classes . ' ' . $list_css . ' ' . $shortcode['list_extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $list_id . '>';
			$content = preg_replace('~</?p[^>]*>~', '', $content);
			$output .= $content;
			$output .= '</div>' . "\r";
			$output .= '<!-- list -->' . "\r";
			return $output;
			
		}
	}
}
