<?php
/**
 * Dropcaps Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Dropcap' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Dropcap extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Dropcap', 'radiantthemes-addons' ),
					'base'        => 'rt_dropcap_style',
					'description' => esc_html__( 'Add Dropcap with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Dropcap-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_dropcap_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Dropcap Style', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_style',
							'value'       => array(
								esc_html__( 'Style One (Basic)', 'radiantthemes-addons' )                   => 'one',
								esc_html__( 'Style Two (Bordered)', 'radiantthemes-addons' )                => 'two',
								esc_html__( 'Style Three (Solid)', 'radiantthemes-addons' )                 => 'three',
								esc_html__( 'Style Four (Top-Left Bordered)', 'radiantthemes-addons' )      => 'four',
								esc_html__( 'Style Five (Bottom-Right Bordered)', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six (Bordered Rounded)', 'radiantthemes-addons' )        => 'six',
								esc_html__( 'Style Seven (Solid Rounded)', 'radiantthemes-addons' )         => 'seven',
								esc_html__( 'Style Eight (Solid Circle)', 'radiantthemes-addons' )          => 'eight',
								esc_html__( 'Style Nine (Solid Circle - Dark)', 'radiantthemes-addons' )    => 'nine',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Dropcap Letter', 'radiantthemes-addons' ),
							'param_name' => 'dropcap_letter',
							'value'      => esc_html__( 'R', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name' => 'dropcap_content',
							'value'      => esc_html__( 'Hola! I am content of dropcap element.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_color',
							'description' => esc_html__( 'Choose color scheme. (Will take theme color if not selected)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_content_color',
							'description' => esc_html__( 'Choose content color', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
					),
				)
			);
			add_shortcode( 'rt_dropcap_style', array( $this, 'radiantthemes_dropcap_style_func' ) );
		}

		/**
		 * [radiantthemes_dropcap_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_dropcap_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'dropcap_style'          => 'one',
                    'dropcap_letter'         => 'R',
                    'dropcap_content'        => 'Hola! I am content of dropcap element.',
                    'dropcap_color'          => '#000000',
                    'dropcap_content_color'  => '#000000',
                    'dropcap_extra_class'    => '',
                    'dropcap_extra_id'       => '',
				), $atts
			);
			
			// ADD ID.
			$dropcaps_id = $shortcode['dropcap_extra_id'] ? 'id="' . $shortcode['dropcap_extra_id'] . '"' : '';
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			// MAIN LAYOUT.
			$output  = '<div class="radiantthemes-dropcaps element-' . $shortcode['dropcap_style'] . ' ' . $shortcode['dropcap_extra_class'] . '"  ' . $dropcaps_id . '>';
            $output  .= '<div class="holder" style="color:' . $shortcode['dropcap_content_color'] . ';">';
            if ( "one" == $shortcode['dropcap_style'] ) {
                $output  .= '<div class="radiantthemes-dropcap-letter">';
            } elseif ( "two" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter" style="border-color:' . $shortcode['dropcap_color'] . ';">';
            } elseif ( "three" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter" style="background-color:' . $shortcode['dropcap_color'] . ';">';
            } elseif ( "four" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter">';
            } elseif ( "five" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter">';
            } elseif ( "six" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter">';
            } elseif ( "seven" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter" style="background-color:' . $shortcode['dropcap_color'] . ';">';
            } elseif ( "eight" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter" style="background-color:' . $shortcode['dropcap_color'] . ';">';
            } elseif ( "nine" == $shortcode['dropcap_style'] ){
                $output  .= '<div class="radiantthemes-dropcap-letter">';
            }
            $output  .= esc_html( $shortcode['dropcap_letter'] );
            $output  .= '</div>';
            $output  .= esc_html( $shortcode['dropcap_content'] );
            $output  .= '</div>';
			$output  .= '</div>' . "\r";
			$output  .= '<!-- dropcap -->' . "\r";
			return $output;
			
		}
	}
}
