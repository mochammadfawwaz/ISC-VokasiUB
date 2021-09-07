<?php
/**
 * Iconbox Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Iconbox' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Iconbox extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Icon Box', 'radiantthemes-addons' ),
					'base'        => 'rt_iconbox_style',
					'description' => esc_html__( 'Add Icon Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/IconBox-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_iconbox_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Icon Library', 'radiantthemes-addons' ),
							'description' => esc_html__( 'From custom icon library.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Icofont', 'radiantthemes-addons' )    => 'icofont-font',
							),
							'param_name'  => 'icon_font_type',
							'std'         => 'icofont-font',
							'admin_label' => true,
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon (Icofont)', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'param_name'  => 'icon_icofont',
							'value'       => 'icofont icofont-angry-monster',
							'settings'    => array(
								'emptyIcon'    => true,
								'type'         => 'icofont',
								'iconsPerPage' => 48,
							),
							'dependency'  => array(
								'element' => 'icon_font_type',
								'value'   => 'icofont-font',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Icon Align', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon alignment.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Inherit', 'radiantthemes-addons' )  => 'inherit',
								esc_html__( 'Left', 'radiantthemes-addons' )     => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' )   => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )    => 'right',
							),
							'param_name'  => 'icon_font_align',
							'std'         => 'inherit',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'class'       => '',
							'heading'     => esc_html__( 'Icon size', 'radiantthemes-addons' ),
							'param_name'  => 'icon_size',
							'value'       => '',
							'description' => esc_html__( 'Enter icon size. (eg. 10px, 1em, 1rem)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'icon_color',
							'description' => esc_html__( 'Choose Icon color. If none selected, the default theme color will be used.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Icon Border Radius', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon border radius (N.B.: This option can be replaced from "Design" tab).', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Square', 'radiantthemes-addons' )  => 'square',
								esc_html__( 'Rounded', 'radiantthemes-addons' ) => 'rounded',
								esc_html__( 'Circle', 'radiantthemes-addons' )  => 'circle',
							),
							'param_name'  => 'icon_border_radius',
							'std'         => 'square',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'icon_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => true,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'icon_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'icon_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'icon_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_iconbox_style', array( $this, 'radiantthemes_iconbox_style_func' ) );
		}

		/**
		 * [radiantthemes_iconbox_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_iconbox_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'icon_font_type'     => 'icofont-font',
					'icon_icofont'       => 'icofont icofont-angry-monster',
					'icon_font_align'    => 'inherit',
					'icon_size'          => '',
					'icon_color'         => '',
					'icon_border_radius' => 'square',
					'icon_animation'     => '',
					'icon_extra_class'   => '',
					'icon_extra_id'      => '',
					'icon_css'           => '',
				), $atts
			);
			
			wp_register_style( 'rt-icofont', false );
			wp_enqueue_style( 'rt-icofont' );

			// ADD RANDOM CLASS.
			$random_class = 'rt' . wp_rand();

			// ADD CUSTOM CSS.
			$custom_css = $shortcode['icon_font_align'] ? '.radiantthemes-iconbox.'.$random_class.'{
			    text-align: '.$shortcode['icon_font_align'].' ;
			}' : '';
			$custom_css .= $shortcode['icon_size'] ? '.radiantthemes-iconbox.'.$random_class.' > .radiantthemes-iconbox-holder > i{
			    font-size: '.$shortcode['icon_size'].' ;
			}' : '';
			$custom_css .= $shortcode['icon_color'] ? '.radiantthemes-iconbox.'.$random_class.' > .radiantthemes-iconbox-holder > i{
			    color: '.$shortcode['icon_color'].' ;
            }' : '';

			wp_add_inline_style( 'rt-icofont', $custom_css );

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['icon_animation'] );

			// ADDITIONAL ID.
			$iconbox_id = $shortcode['icon_extra_id'] ? 'id="' . $shortcode['icon_extra_id'] . '"' : '';

			// ADDITIONAL CSS.
			$iconbox_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['icon_css'], ' ' ), $atts );
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
        	
        	wp_register_style(
        		'radiantthemes-icofont',
        		plugins_url( 'radiantthemes-addons/assets/css/icofont.min.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-icofont' );

			// RENDERED HTML.
			$selected_font_type  = str_replace( '-font', '', $shortcode['icon_font_type'] );
			$selected_font_style = $shortcode[ 'icon_' . $selected_font_type ];

			$output  = '<div class="radiantthemes-iconbox element-one ' . $shortcode['icon_extra_class'] . ' ' . $random_class . '" ' . $iconbox_id . ' data-border-radius="' . $shortcode['icon_border_radius'] . '">';
			$output .= '<div class="radiantthemes-iconbox-holder ' . $animation_classes . ' ' . esc_attr( $iconbox_css ) . '">';
			$output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
			$output .= '</div>';
			$output .= '</div>';

			return $output;
		}
	}
}
