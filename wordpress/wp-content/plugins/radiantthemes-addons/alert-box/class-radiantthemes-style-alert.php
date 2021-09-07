<?php
/**
 * Button Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Alert' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Alert extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Alert Box', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add alert box', 'radiantthemes-addons' ),
					'base'        => 'rt_alert_style',
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Alert-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_alert_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Style', 'radiantthemes-addons' ),
							'param_name' => 'alert_box_style',
							'value'      => array(
								esc_html__( 'Style One (Default Style)', 'radiantthemes-addons' ) => 'one',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Type', 'radiantthemes-addons' ),
							'param_name' => 'alert_box_type',
							'value'      => array(
								esc_html__( 'Info', 'radiantthemes-addons' )     => 'info',
								esc_html__( 'Success', 'radiantthemes-addons' )  => 'success',
								esc_html__( 'Warning', 'radiantthemes-addons' )  => 'warning',
								esc_html__( 'Danger', 'radiantthemes-addons' )   => 'danger',
							),
							'std'        => 'info',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Is Dismissible?', 'radiantthemes-addons' ),
							'param_name' => 'alert_box_dismissible',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Type Alert Title', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_title',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Type Alert Text', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_text',
							'value'       => esc_html__( 'Hola, I am an alert box.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),

						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,

						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),

						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),

					),
					'js_view'     => 'VcIconElementView_Backend',
				)
			);
			add_shortcode( 'rt_alert_style', array( $this, 'radiantthemes_alert_style_func' ) );
		}

		/**
		 * [radiantthemes_alert_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_alert_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'alert_box_style'       => 'one',
					'alert_box_type'        => 'info',
					'alert_box_dismissible' => 'yes',
					'alert_box_title'       => '',
					'alert_box_text'        => 'Hola, I am an alert box.',
					'alert_box_animation'   => '',
					'alert_box_extra_class' => '',
					'alert_box_extra_id'    => '',
				), $atts
			);

			// ADD ANIMATION CLASS.
			$animation_classes = $this->getCSSAnimation( $shortcode['alert_box_animation'] );

			// ADD EXTRA ID.
			$alert_box_extra_id = $shortcode['alert_box_extra_id'] ? 'id="' . esc_attr( $shortcode['alert_box_extra_id'] ) . '"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output = '<div class="radiantthemes-alert-box element-' . $shortcode['alert_box_style'] . ' ' . $animation_classes . ' ' . esc_attr( $shortcode['alert_box_extra_class'] ) . ' alert alert-' . $shortcode['alert_box_type'] . ' fade in"' . $alert_box_extra_id . '>';
			if ( 'yes' === $shortcode['alert_box_dismissible'] ) {
				$output .= '<a href="#" class="close" data-dismiss="alert"><i class="fa fa-times"></i></a>';
			}
			$output .= '<div class="icon">';
			if ( 'info' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-info"></i>';
			} elseif ( 'success' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-check-circle-o"></i>';
			} elseif ( 'warning' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-bell-o"></i>';
			} elseif ( 'danger' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-exclamation-triangle"></i>';
			}
			$output .= '</div>';
			$output .= '<strong>' . esc_attr( $shortcode['alert_box_title'] ) . '</strong>';
			$output .= esc_attr( $shortcode['alert_box_text'] );
			$output .= '</div>';
			return $output;
		}
	}
}
