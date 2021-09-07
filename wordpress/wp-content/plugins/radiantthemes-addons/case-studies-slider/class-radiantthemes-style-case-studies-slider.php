<?php
/**
 * Case Studies Slider Style Addon
 *
 * @package RadiantThemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Case_Studies_Slider' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Case_Studies_Slider extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Case Studies Slider', 'radiantthemes-addons' ),
					'base'        => 'rt_case_studies_slider_style',
					'description' => esc_html__( 'Add Case Studies Slider.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Case-Studies-Slider-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_case_studies_slider_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Studies Slider Style', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_style_variation',
							'value'      => array(
								esc_html__( 'Style One (Overlay With Bottom Title)', 'radiantthemes-addons' )            => 'one',
								esc_html__( 'Style Two (Overlay On Hover With Bottom Title)', 'radiantthemes-addons' )   => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_color',
							'description' => esc_html__( 'Set your Case Studies Slider Color Scheme. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Case Studies Category', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Display posts from a specific category (enter case studies category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_category',
							'value'       => 'all',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Loop', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_allow_loop',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_allow_autoplay',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_autoplay_timeout',
							'value'      => 6000,
							'dependency' => array(
								'element' => 'case_studies_slider_allow_autoplay',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Desktop', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_items_in_desktop',
							'description' => esc_html__( 'Items on Desktop (in single row)', 'radiantthemes-addons' ),
							'value'       => '5',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Tab', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_items_in_tab',
							'description' => esc_html__( 'Items on Tab (in single row)', 'radiantthemes-addons' ),
							'value'       => '3',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Mobile', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_items_in_mobile',
							'description' => esc_html__( 'Items on Mobile (in single row)', 'radiantthemes-addons' ),
							'value'       => '1',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
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
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order By', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_looping_order',
							'value'      => array(
								esc_html__( 'Date', 'radiantthemes-addons' )       => 'date',
								esc_html__( 'ID', 'radiantthemes-addons' )         => 'ID',
								esc_html__( 'Title', 'radiantthemes-addons' )      => 'title',
								esc_html__( 'Modified', 'radiantthemes-addons' )   => 'modified',
								esc_html__( 'Random', 'radiantthemes-addons' )     => 'random',
								esc_html__( 'Menu order', 'radiantthemes-addons' ) => 'menu_order',
							),
							'std'        => 'ID',
							'group'      => 'Looping',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
							'group'      => 'Looping',
						),
					),
				)
			);
			add_shortcode( 'rt_case_studies_slider_style', array( $this, 'radiantthemes_case_studies_slider_style_func' ) );
		}

		/**
		 * [radiantthemes_case_studies_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_case_studies_slider_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'case_studies_slider_style_variation'  => 'one',
					'case_studies_slider_color'            => '',
					'case_studies_category'                => 'all',
					'case_studies_slider_allow_loop'       => 'true',
					'case_studies_slider_allow_autoplay'   => 'true',
					'case_studies_slider_autoplay_timeout' => '6000',
					'case_studies_slider_items_in_desktop' => '5',
					'case_studies_slider_items_in_tab'     => '3',
					'case_studies_slider_items_in_mobile'  => '1',
					'case_studies_slider_enable_zoom'      => 'no',
					'extra_class'                          => '',
					'extra_id'                             => '',
					'case_studies_slider_looping_order'    => 'ID',
					'case_studies_slider_looping_sort'     => 'DESC',
				), $atts
			);
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			$random_class = 'rt' . rand();
			$custom_css   = '';

			$custom_css .= $shortcode['case_studies_slider_color'] ? '.radiantthemes-case-studies-slider.element-one.' . $random_class . ' .radiantthemes-case-studies-slider-item > .holder:hover > .data .title{
                color: ' . $shortcode['case_studies_slider_color'] . ';
            }
            .radiantthemes-case-studies-slider.element-one.' . $random_class . ' .owl-dots > .owl-dot > span{
                background-color: ' . $shortcode['case_studies_slider_color'] . ';
            }' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			$enable_zoom = ( 'yes' === $shortcode['case_studies_slider_enable_zoom'] ) ? 'has-fancybox' : '';

			require 'template/template-case-studies-slider-style-' . esc_attr( $shortcode['case_studies_slider_style_variation'] ) . '.php';

			return $output;
		}
	}
}
