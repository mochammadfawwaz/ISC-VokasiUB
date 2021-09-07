<?php
/**
 * Countdown Timer Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Countdown' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Countdown extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', 'admin_scripts' );
			/**
			 * [admin_scripts description]
			 *
			 * @param  [type] $hook description.
			 */
			function admin_scripts( $hook ) {
				if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
					wp_register_style(
						'radiantthemes_datetimepicker',
						plugins_url( 'radiantthemes-addons/admin/css/bootstrap-datetimepicker-admin.css' )
					);
					wp_enqueue_style( 'radiantthemes_datetimepicker' );
				}
			}

			vc_map(
				array(
					'name'        => esc_html__( 'Countdown', 'radiantthemes-addons' ),
					'base'        => 'rt_countdown_style',
					'description' => esc_html__( 'Add Countdown', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/CountdownTimer-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_countdown_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Countdown Timer Style', 'radiantthemes-addons' ),
							'param_name'  => 'countdown_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'datetimepicker',
							'heading'     => esc_html__( 'Target Time For Countdown', 'radiantthemes-addons' ),
							'param_name'  => 'countdown_datetime',
							'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm:ss).', 'radiantthemes-addons' ),
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
					),
				)
			);
			add_shortcode( 'rt_countdown_style', array( $this, 'radiantthemes_countdown_style_func' ) );
		}

		/**
		 * [radiantthemes_countdown_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_countdown_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'countdown_style'    => 'one',
					'countdown_datetime' => '',
					'extra_class'        => '',
					'extra_id'           => '',
				), $atts
			);

			$id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output = '<div class="rt-countdown element-' . esc_attr( $shortcode['countdown_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $id  . ' data-countdown="' . esc_attr( $shortcode['countdown_datetime'] ) . '"></div>';
			return $output;
		}
	}
}
