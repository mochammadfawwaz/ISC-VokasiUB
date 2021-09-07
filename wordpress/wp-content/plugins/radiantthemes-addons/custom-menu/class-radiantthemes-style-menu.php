<?php
/**
 * Custom Menu
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Menu' ) ) {

	/**
	 * Get All created menu list.
	 *
	 * @return array
	 */
	function rt_get_menu() {
		$custom_menus = array();
		if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
			$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			if ( is_array( $menus ) && ! empty( $menus ) ) {
				foreach ( $menus as $single_menu ) {
					if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
						$custom_menus[ $single_menu->name ] = $single_menu->term_id;
					}
				}
			}
		}
		return $custom_menus;
	}
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Menu extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Custom Menu', 'radiantthemes-addons' ),
					'base'        => 'rt_menu_style',
					'description' => esc_html__( 'Add Custom Menu with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Menu-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_menu_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Menu Style', 'radiantthemes-addons' ),
							'param_name' => 'custom_menu_style',
							'value'      => array(
								esc_html__( 'Style One (Dot Style)', 'radiantthemes-addons' )            => 'one',
								esc_html__( 'Style Two (No Bullet Style)', 'radiantthemes-addons' )      => 'two',
								esc_html__( 'Style Three (Right Arrow Style)', 'radiantthemes-addons' )  => 'three',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Menu', 'radiantthemes-addons' ),
							'param_name'  => 'nav_menu',
							'value'       => array_flip( rt_get_menu() ),
							'description' => empty( rt_get_menu() ) ? esc_html__( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'radiantthemes-addons' ) : esc_html__( 'Select menu to display.', 'radiantthemes-addons' ),
							'save_always' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'custom_menu_color',
							'description' => esc_html__( 'Set your Fancy Textbox Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
					),
				)
			);
			add_shortcode( 'rt_menu_style', array( $this, 'radiantthemes_menu_style_func' ) );
		}

		/**
		 * [radiantthemes_menu_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_menu_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'custom_menu_style'    => 'one',
					'nav_menu' => '',
					'custom_menu_color'    => '',
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

			if ( ! empty( $shortcode['custom_menu_color'] ) ) {
				// CUSTOM CSS.
				$custom_css = ".radiantthemes-custom-menu.element-one.{$random_class} ul.menu li,
				.radiantthemes-custom-menu.element-two.{$random_class} ul.menu li,
				.radiantthemes-custom-menu.element-three.{$random_class} ul.menu li{
					color: {$shortcode['custom_menu_color']} ;
				}";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}
			// MAIN LAYOUT.
			$ex_id  = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';
			$output = '<!-- radiantthemes-custom-menu -->';
			$output .= '<div class="radiantthemes-custom-menu element-' . $shortcode['custom_menu_style'] . ' ' . $random_class . ' ' . $shortcode['extra_class'] . '"  ' . $ex_id . '  >';
			    require 'template/template-menu-item-' . $shortcode['custom_menu_style'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-custom-menu -->' . "\r";
			return $output;
		}
	}
}
