<?php
/**
 * Fancy Text Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Fancy_Text_Box' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Fancy_Text_Box extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Fancy Text Box', 'radiantthemes-addons' ),
					'base'        => 'rt_fancy_text_box_style',
					'description' => esc_html__( 'Add Fancy Text Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/FancyTextBox-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_team_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Fancy Text Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'style_variation',
							'value'       => array(
								esc_html__( 'Style One (On Hover Top Vertical Line)', 'radiantthemes-addons' )    => 'one',
								esc_html__( 'Style Two (On Hover Shadow)', 'radiantthemes-addons' )               => 'two',
								esc_html__( 'Style Three (On Hover Slide Down)', 'radiantthemes-addons' )         => 'three',
								esc_html__( 'Style Four (Left Image With Shadow Box)', 'radiantthemes-addons' )   => 'four',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_color',
							'description' => esc_html__( 'Set your Fancy Textbox Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'radiantthemes-addons' ),
							'value'       => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_title',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
							'value'       => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_subtitle',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Fancy Text Box Content', 'radiantthemes-addons' ),
							'value'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do.', 'radiantthemes-addons' ),
							'param_name' => 'fancy_textbox_content',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Icon Type', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Choose if you want image or icon.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Image', 'radiantthemes-addons' ) => 'image',
								esc_html__( 'Icon', 'radiantthemes-addons' )  => 'icon',
							),
							'param_name'  => 'fancy_textbox_icontype',
							'std'         => 'image',
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Add Icon (Eg. 80x80)', 'radiantthemes-addons' ),
							'param_name' => 'fancy_textbox_image',
							'dependency'  => array(
								'element' => 'fancy_textbox_icontype',
								'value'   => 'image',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Icon Library', 'radiantthemes-addons' ),
							'description' => esc_html__( 'From custom icon library.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Icofont', 'radiantthemes-addons' )    => 'icofont-font',
							),
							'param_name'  => 'fancy_textbox_icon',
							'std'         => 'icofont-font',
							'admin_label' => true,
							'dependency'  => array(
								'element' => 'fancy_textbox_icontype',
								'value'   => 'icon',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon (Icofont)', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_icon_icofont',
							'value'       => 'icofont icofont-angry-monster',
							'settings'    => array(
								'emptyIcon'    => true,
								'type'         => 'icofont',
								'iconsPerPage' => 48,
							),
							'dependency'  => array(
								'element' => 'fancy_textbox_icon',
								'value'   => 'icofont-font',
							),
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'Link', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_link',
							'admin_label' => true,
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
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
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
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'fancytextbox_css',
							'group'      => esc_html__( 'Fancy Text Box Design', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_fancy_text_box_style', array( $this, 'radiantthemes_fancy_text_box_style_func' ) );
		}

		/**
		 * [radiantthemes_fancy_text_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_fancy_text_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'            => 'one',
					'fancy_textbox_color'        => '',
					'fancy_textbox_title'        => esc_html__( 'Title', 'radiantthemes-addons' ),
					'fancy_textbox_subtitle'     => esc_html__( 'Subtitle.', 'radiantthemes-addons' ),
					'fancy_textbox_content'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'radiantthemes-addons' ),
					'fancy_textbox_icontype'     => 'image',
					'fancy_textbox_image'        => '',
					'fancy_textbox_icon'         => 'icofont-font',
					'fancy_textbox_icon_icofont' => 'icofont icofont-angry-monster',
					'fancy_textbox_link'         => '',
					'animation'                  => '',
					'extra_class'                => '',
					'extra_id'                   => '',
					'fancytextbox_css'           => '',
				), $atts
			);

			$styles = array();

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );

			// CUSTOM ID.
			$ourstory_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			
			// LINK TAG.
			$fancy_textbox_link         = vc_build_link( $shortcode['fancy_textbox_link'] );
			$fancy_textbox_link_url     = ( ! empty( $fancy_textbox_link['url'] ) ) ? $fancy_textbox_link['url'] : '';
			$fancy_textbox_link_title   = ( ! empty( $fancy_textbox_link['title'] ) ) ? $fancy_textbox_link['title'] : '';
			$fancy_textbox_link_target  = ( ! empty( $fancy_textbox_link['target'] ) ) ? 'target="' .$fancy_textbox_link['target'].'"' : '';
			$fancy_textbox_link_rel     = ( ! empty( $fancy_textbox_link['rel'] ) ) ? ' rel="' .$fancy_textbox_link['rel'].'"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();

			if ( ! empty( $shortcode['fancy_textbox_color'] ) ) {
				// CUSTOM CSS.
				$custom_css = ".rt-fancy-text-box.element-two.{$random_class} > .holder .icon i,
				.rt-fancy-text-box.element-three.{$random_class} > .holder:hover .more .btn{
					color: {$shortcode['fancy_textbox_color']} ;
				}";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
		    }
		    // ADD DESIGN CSS.
			$fancy_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['fancytextbox_css'], ' ' ), $atts );
			// RENDERED HTML.
			$selected_font_type  = str_replace( '-font', '', $shortcode['fancy_textbox_icon'] );
			$selected_font_style = $shortcode[ 'fancy_textbox_icon_' . $selected_font_type ];

			// MAIN LAYOUT.
			$output  = "\r" . '<!-- fancy-text-box -->' . "\r";
			$output .= '<div class="rt-fancy-text-box element-' . $shortcode['style_variation'] . ' ' . $animation_classes . ' ' . $random_class . ' ' . $shortcode['extra_class'] . '" ' . $ourstory_id . '>';
			    require 'template/template-fancy-text-box-' . $shortcode['style_variation'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- fancy-text-box -->' . "\r";
			return $output;
		}
	}
}
