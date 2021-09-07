<?php
/**
 * Contact Box Style Addon
 *
 * @package RadiantThemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Contact_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Contact_Box extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Contact Box', 'radiantthemes-addons' ),
					'base'        => 'rt_contact_box_style',
					'description' => esc_html__( 'Add Contact Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Contact-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_contact_box__style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Contact Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_style',
							'value'       => array(
								'Style One (With Title)'    => 'one',
								'Style Two (Without Title)' => 'two',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Contact Box Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_color',
							'description' => esc_html__( 'Set your Contact Box Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Address', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put address to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_address',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Email', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put email to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_email',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Phone', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put phone to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_phone',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Fax', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put fax to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_fax',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter WhatsApp', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put whatsapp to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_whatsapp',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'contact_box_css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_contact_box_style', array( $this, 'radiantthemes_contact_box_style_func' ) );
		}

		/**
		 * [radiantthemes_contact_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_contact_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
                    'contact_box_style'       => 'one',
					'contact_box_color'       => '',
					'contact_box_address'     => '',
					'contact_box_email'       => '',
					'contact_box_phone'       => '',
					'contact_box_fax'         => '',
					'contact_box_whatsapp'    => '',
					'contact_box_animation'   => '',
					'contact_box_extra_id'    => '',
					'contact_box_extra_class' => '',
					'contact_box_css'         => '',
				), $atts
			);

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['contact_box_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['contact_box_animation'], ' ' ), $atts );

			// ADD DESIGN CSS.
			$contact_box_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['contact_box_css'], ' ' ), $atts );
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();

			// ADD CUSTOM CSS.
			$custom_css = $shortcode['contact_box_color'] ? '.radiantthemes-contact-box.'.$random_class.' ul.contact li i{
			    color: '.$shortcode['contact_box_color'].' ;
			}' : '';
	
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			// GET ID.
			$contact_box_id = $shortcode['contact_box_extra_id'] ? 'id="' . esc_attr( $shortcode['contact_box_extra_id'] ) . '"' : '';

			// MAIL LAYOUT.
			$output  = "\r" . '<!-- radiantthemes-contact-box -->' . "\r";
			$output .= '<div class="radiantthemes-contact-box ' . esc_attr( $random_class ) . ' element-' . esc_attr( $shortcode['contact_box_style'] );
			$output .= ' ' . $animation_classes . ' ' . $contact_box_css . ' ' . $shortcode['contact_box_extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $contact_box_id . '>';
			    require 'template/template-contact-box-item-' . $shortcode['contact_box_style'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-contact-box -->' . "\r";
			return $output;

		}
	}
}
