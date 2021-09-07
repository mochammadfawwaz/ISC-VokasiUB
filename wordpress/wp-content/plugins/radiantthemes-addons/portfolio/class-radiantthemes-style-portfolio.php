<?php
/**
 * Portfolio Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Portfolio' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Portfolio extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Portfolio', 'radiantthemes-addons' ),
					'base'        => 'rt_portfolio_style',
					'description' => esc_html__( 'Add Portfolio with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Portfolio-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_portfolio_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_style_variation',
							'value'      => array(
								esc_html__( 'Style One (Masonry)', 'radiantthemes-addons' )                        => 'one',
								esc_html__( 'Style Two (Masonry)', 'radiantthemes-addons' )                        => 'two',
								esc_html__( 'Style Three (Box)', 'radiantthemes-addons' )                          => 'three',
								esc_html__( 'Style Four (Masonry)', 'radiantthemes-addons' )                       => 'four',
								esc_html__( 'Style Five (Masonry)', 'radiantthemes-addons' )                       => 'five',
								esc_html__( 'Style Six (Masonry) - 4 Items In a Row', 'radiantthemes-addons' )     => 'six',
								esc_html__( 'Style Seven (Masonry) - 4 Items In a Row', 'radiantthemes-addons' )   => 'seven',
								esc_html__( 'Style Eight (Box)', 'radiantthemes-addons' )                          => 'eight',
								esc_html__( 'Style Nine (Box)', 'radiantthemes-addons' )                           => 'nine',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Portfolio Category', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Display posts from a specific category (enter portfolio category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_category',
							'value'       => 'all',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'How many items to show?', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_max_posts',
							'description' => esc_html__( 'Use -1 to dislay all posts. ', 'radiantthemes-addons' ),
							'value'       => '8',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'How many items in a row?', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_row_posts',
							'description' => esc_html__( 'Set number of posts to display in a row. ', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Four', 'radiantthemes-addons' )  => 'four',
							),
							'std'         => 'three',
                            'dependency'  => array(
                                'element' => 'portfolio_style_variation',
                                'value'   => array(
                                    'five',
                                    'eight',
                                    'nine',
                                ),
                            ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Enable portfolio link?', 'radiantthemes-addons' ),
							'param_name' => 'add_link',
							//'value'       => 'true',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Enable portfolio zoom?', 'radiantthemes-addons' ),
							'param_name' => 'add_zoom',
							//'value'       => 'true',
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
							'param_name' => 'portfolio_looping_order',
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
							'param_name' => 'portfolio_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'ASC',
							'group'      => 'Looping',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Offset Posts', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_looping_offset',
							'description' => esc_html__( 'Use this field to ignore few posts (Eg.: 2 ).', 'radiantthemes-addons' ),
							'group'       => 'Looping',
						),
					),
				)
			);
			add_shortcode( 'rt_portfolio_style', array( $this, 'radiantthemes_portfolio_style_func' ) );
		}

		/**
		 * [radiantthemes_portfolio_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_portfolio_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'portfolio_style_variation'  => 'one',
					'portfolio_category'         => 'all',
					'portfolio_max_posts'        => '8',
					'portfolio_row_posts'        => 'three',
					'add_zoom'					 => '',
					'add_link'                   => '',
					'portfolio_box_number'       => '3',
					'extra_class'                => '',
					'extra_id'                   => '',
					'portfolio_looping_order'    => 'ID',
					'portfolio_looping_sort'     => 'DESC',
					'portfolio_looping_offset'   => '0',
				), $atts
			);
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			require 'template/template-portfolio-style-' . esc_attr( $shortcode['portfolio_style_variation'] ) . '.php';

			return $output;
		}

	}
}
