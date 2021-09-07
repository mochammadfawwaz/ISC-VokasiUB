<?php
/**
 * Blockquote Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Blockquote' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Blockquote extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Blockquote', 'radiantthemes-addons' ),
					'base'        => 'rt_blockquote_style',
					'description' => esc_html__( 'Add Blockquote', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Blockquote-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_blockquote_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blockquote Style', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_style',
							'value'      => array(
								esc_html__( 'Style One (Centered Bordered With Icon)', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two (Left Bordered Without Icon)', 'radiantthemes-addons' )  => 'two',
								esc_html__( 'Style Three (Left With Icon)', 'radiantthemes-addons' )            => 'three',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Author', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_author',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter your content.', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_content',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => true,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_font_color',
							'group'      => esc_html__( 'Appearance', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_icon_color',
							'group'      => esc_html__( 'Appearance', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_blockquote_style', array( $this, 'radiantthemes_blockquote_style_func' ) );
		}

		/**
		 * [radiantthemes_blockquote_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_blockquote_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'blockquote_style'       => 'one',
                    'blockquote_author'      => '',
                    'blockquote_content'     => '',
                    'blockquote_animation'   => '',
                    'blockquote_extra_class' => '',
                    'blockquote_extra_id'    => '',
                    'blockquote_font_color'  => '',
                    'blockquote_icon_color'  => '',
                    'blockquote_css'         => '',
				), $atts
			);

			// GENARATE DYNAMIC CLASSES.
			$animation_classes = $this->getCSSAnimation( $shortcode['blockquote_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['blockquote_css'], ' ' ), $atts );
			$blockquote_style  = esc_attr( $shortcode['blockquote_font_color'] );
			$icon_style        = esc_attr( $shortcode['blockquote_icon_color'] );
			
			// ADD CUSTOM ID.
			$blockquote_id = $shortcode['blockquote_extra_id'] ? 'id="' . esc_attr( $shortcode['blockquote_extra_id'] ) . '"' : '';
			$blockquote_style = $blockquote_style ? 'style="color:' . $blockquote_style . ';"' : '';
			$icon_style = $icon_style ? 'style="color:' . $icon_style . ';"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			// MAIN LAYOUT.
			$output  = '<div class="radiantthemes-blockquote element-' . esc_attr( $shortcode['blockquote_style'] ) . ' ' . $animation_classes . ' ' . $shortcode['blockquote_extra_id'] . ' ' . esc_attr( $css_class ) . '" ' . $blockquote_id . '>';
			$output .= '<blockquote ' .  $blockquote_style . '><i class="fa fa-quote-left" '.  $icon_style . '></i>';
			$output .= esc_attr( $shortcode['blockquote_content'] );
			$output .= '<cite>' . esc_attr( $shortcode['blockquote_author'] ) . '</cite>';
			$output .= '</blockquote>';
			$output .= '</div>';

			return $output;
		}
	}
}
