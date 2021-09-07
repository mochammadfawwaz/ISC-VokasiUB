<?php
/**
 * Radiantthemes Accordion Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Accordion' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Accordion {
		/**
		 * [$radiant_accordionstyle] description
		 *
		 * @var [type]
		 */
		private $radiant_accordionstyle;

		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Accordion', 'radiantthemes-addons' ),
					'base'        => 'rt_accordion_style',
					'class'       => 'wpb_rt_vc_extension_accordion_style',
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Accordion-Element-Icon.png' ),
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only' => 'rt_accordion_style_item',
					),
					'js_view'     => 'VcColumnView',
					'description' => esc_html__( 'Add Accordion.', 'radiantthemes-addons' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Accordion Style', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_style',
							'value'       => array(
								esc_html__( 'Style One (Outlined Plus-Minus Style)', 'radiantthemes-addons' )         => 'one',
								esc_html__( 'Style Two (Solid Plus-Minus Style) - Dark', 'radiantthemes-addons' )     => 'two',
								esc_html__( 'Style Three (Solid Plus-Minus Style) - Light', 'radiantthemes-addons' )  => 'three',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_color',
							'description' => esc_html__( 'Set your Accordion Color Scheme. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'accordion_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),
					),
				)
			);

			vc_map(
				array(
					'name'                    => esc_html__( 'Accordion Item', 'radiantthemes-addons' ),
					'base'                    => 'rt_accordion_style_item',
					'description'             => esc_html__( 'Add the title and content', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_accordion_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(

						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Accordion Title', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_item_title',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'holder'     => 'div',
							'heading'    => esc_html__( 'Accordion Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
						),
					),
				)
			);
			add_shortcode( 'rt_accordion_style', array( $this, 'radiantthemes_accordion_style_func' ) );
			add_shortcode( 'rt_accordion_style_item', array( $this, 'radiantthemes_accordion_style_item_func' ) );
		}

		/**
		 * [radiantthemes_accordion_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_accordion_style_func( $atts, $content = null, $tag ) {

			$shortcode                    = shortcode_atts(
				array(
					'accordion_style'        => 'one',
                    'accordion_color'        => '',
                    'accordion_extra_class'  => '',
                    'accordion_extra_id'     => '',
                    'accordion_css'          => '',
				), $atts
			);
			$this->radiant_accordionstyle = $shortcode['accordion_style'];
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();
			
			// ADD CUSTOM CSS.
			$custom_css = $shortcode['accordion_color'] ? '.radiantthemes-accordion.element-one.'.$random_class.' .radiantthemes-accordion-item.radiantthemes-active > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon,
			.radiantthemes-accordion.element-two.'.$random_class.' .radiantthemes-accordion-item.radiantthemes-active,
			.radiantthemes-accordion.element-two.'.$random_class.' .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon > .line:before,
		    .radiantthemes-accordion.element-two.'.$random_class.' .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon > .line:after{
                background-color: '.$shortcode['accordion_color'].' ;
            }' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			// ADDITIONAL ID.
			$accordion_id = $shortcode['accordion_extra_id'] ? 'id="' . esc_attr( $shortcode['accordion_extra_id'] ) . '"' : '';

			// ADDITIONAL CSS.
			$accordion_content_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['accordion_css'], ' ' ), $atts );

			$output  = '<div class="radiantthemes-accordion element-' . esc_attr( $shortcode['accordion_style'] ) . ' ' . esc_attr( $shortcode['accordion_extra_class'] ) . ' ' . esc_attr( $accordion_content_css ) . ' ' . $random_class . '" ' . $accordion_id . ' >';
			$output .= do_shortcode( $content );
			$output .= '</div>';
			return $output;
		}

		/**
		 * [radiantthemes_accordion_style_item_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_accordion_style_item_func( $atts, $content = null, $tag ) {
			$accordionicon = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_accordionstyle' => '',
					'accordion_item_title'   => '',
				), $atts
			);

			$output = '';

			if ( ! isset( $shortcode['accordion_item_title'] ) || '' === $shortcode['accordion_item_title'] ) {
				$shortcode['accordion_item_title'] = 'Accordion';
			}
			require 'template/template-accordion-element-' . $this->radiant_accordionstyle . '.php';
			return $output;
		}
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Accordion_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Accordion_Style extends WPBakeryShortCodesContainer {

	}
}

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Accordion_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Accordion_Style_Item extends WPBakeryShortCode {

	}
}
