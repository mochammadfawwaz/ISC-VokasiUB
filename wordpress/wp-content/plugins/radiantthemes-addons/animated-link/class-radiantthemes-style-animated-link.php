<?php
/**
 * Animated Link Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Animated_Link' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Animated_Link extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Animated Link', 'radiantthemes-addons' ),
					'base'        => 'rt_animated_link_style',
					'description' => esc_html__( 'Add Animated Link.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Animated-Link-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_animated_link_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Animated Link Style', 'radiantthemes-addons' ),
							'param_name'  => 'animated_link_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )   => 'six',
								esc_html__( 'Style Seven', 'radiantthemes-addons' ) => 'seven',
								esc_html__( 'Style Eight', 'radiantthemes-addons' ) => 'eight',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Animated Link Color', 'radiantthemes-addons' ),
							'param_name'  => 'animated_link_color',
							'description' => esc_html__( 'Set your Animated Link Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'Link', 'radiantthemes-addons' ),
							'param_name'  => 'animated_link_anchor',
							'admin_label' => false,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
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
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_animated_link_style', array( $this, 'radiantthemes_animated_link_style_func' ) );
		}

		/**
		 * [radiantthemes_animated_link_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_animated_link_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'animated_link_style'  => 'one',
					'animated_link_color'  => '',
					'animated_link_anchor' => '',
					'animation'            => '',
					'extra_class'          => '',
					'extra_id'             => '',
					'css'                  => '',
				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );

			$animated_link_anchor = vc_build_link( $shortcode['animated_link_anchor'] );
			$animated_url         = ( ! empty( $animated_link_anchor['url'] ) ) ? $animated_link_anchor['url'] : '#';
			$animated_title       = ( ! empty( $animated_link_anchor['title'] ) ) ? $animated_link_anchor['title'] : '';
			$animated_target      = ( ! empty( $animated_link_anchor['target'] ) ) ? $animated_link_anchor['target'] : '';
			$animated_rel         = ( ! empty( $animated_link_anchor['rel'] ) ) ? $animated_link_anchor['rel'] : '';

			// ADD ANIMATION ID.
			$animated_link_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();
			
			// ADD CUSTOM CSS.
			$custom_css = $shortcode['animated_link_color'] ? '.rt-animated-link.element-one.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-two.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-three.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-four.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-five.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-six.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-seven.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-eight.'.$random_class.' > .holder > .main-link{
			    color: '.$shortcode['animated_link_color'].' ;
			}' : '';
			$custom_css .= $shortcode['animated_link_color'] ? '.rt-animated-link.element-three.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-four.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-five.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-six.'.$random_class.' > .holder > .main-link > .dot-holder > .dots,
            .rt-animated-link.element-seven.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-seven.'.$random_class.' > .holder > .main-link:after,
            .rt-animated-link.element-eight.'.$random_class.' > .holder > .main-link-fliper{
                background-color: '.$shortcode['animated_link_color'].' ;
			}' : '';
			$custom_css .= $shortcode['animated_link_color'] ? '.rt-animated-link.element-one.'.$random_class.' > .holder:before{
               border-color: '.$shortcode['animated_link_color'].' ;
			}' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			$output = '<div class="rt-animated-link element-' . esc_attr( $shortcode['animated_link_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . ' ' . $animation_classes . ' ' . esc_attr( $css_class ) . ' ' . esc_attr( $random_class ) . '" ' . $animated_link_id . '>';
			require 'template/template-animated-link-style-' . esc_attr( $shortcode['animated_link_style'] ) . '.php';
			$output .= '</div>';
			return $output;
		}
	}
}
