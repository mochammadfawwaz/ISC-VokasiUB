<?php
/**
 * RadiantThemes_Style_Twitter_Widget  Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Twitter_Widget' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Twitter_Widget extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Twitter Widget', 'radiantthemes-addons' ),
					'base'        => 'rt_twitter',
					'description' => esc_html__( 'The most recent posts thumbnail', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Twitter Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )  => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )  => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Username:', 'radiantthemes-addons' ),
							'param_name'  => 'username',
							'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'value'       => '',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'No. of Maximum Tweets:', 'radiantthemes-addons' ),
							'param_name'  => 'maxtweets',
							'value'       => '5',
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Enable Links:', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'spotlight',
							),
							'param_name'  => 'enablelinks',
							'admin_label' => true,
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Show User:', 'radiantthemes-addons' ),
							
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'spotlight',
							),
							'param_name'  => 'showuser',
							'admin_label' => true,
						),	
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Show Time:', 'radiantthemes-addons' ),
							
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'spotlight',
							),
							'param_name'  => 'showtime',
							'admin_label' => true,
						),	
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Show Images:', 'radiantthemes-addons' ),
							
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'spotlight',
							),
							'param_name'  => 'showimages',
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
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						
					),
				)
			);
			add_shortcode( 'rt_twitter', array( $this, 'radiantthemes_twitter_widget_func' ) );
		}

		/**
		 * [radiantthemes_twitter_widget_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_twitter_widget_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'  => 'one',
					'username'	       => 'envato',
					'maxtweets'        => '2',
					'enablelinks'      => '',
					'showuser'         => '',
					'showtime'         => '',
					'showimages'       => '',
                    'extra_class'     => '',
                    'extra_id'       => '',
            	), $atts
			);
			
			

			
		//$output = '';
		$id = $shortcode['extra_id'] ? ' id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

		// MAIN LAYOUT.
		$output = '<!-- radiantthemes-twitter-widget --><div class="radiantthemes-twitter-widget element-' . esc_attr( $shortcode['style_variation'] ) . ' ' .  esc_attr( $shortcode['extra_class'] ) . '" ' . $id . '>';
		
    		//////////////////
    		$username    = ! empty( $shortcode['username'] ) ? $shortcode['username'] : esc_html__( 'twitter', 'appon' );
    		$maxtweets   = ! empty( $shortcode['maxtweets'] ) ? $shortcode['maxtweets'] : esc_html__( '5', 'appon' );
    		$enablelinks = esc_attr( $shortcode['enablelinks'] );
    		$showuser    = esc_attr( $shortcode['showuser'] );
    		$showtime    = esc_attr( $shortcode['showtime'] );
    		$showimages  = esc_attr( $shortcode['showimages'] );
            // This is where you run the code and display the output.
            $random_id = substr( md5( microtime() ), 0, 40 ); 
            $output .= '<div id="'. esc_attr( $random_id ).'" class="radiantthemes-twitter-widget-holder" data-twitter-box-username="'.esc_attr( $username ) .'" data-twitter-box-maxtweets="'. esc_attr( $maxtweets ).'" data-twitter-box-enablelinks="'. esc_attr( $enablelinks ).'" data-twitter-box-showuser="'. esc_attr( $showuser ).'" data-twitter-box-showtime="'. esc_attr( $showtime ).'" data-twitter-box-showimages="'.esc_attr( $showimages ).'"></div>';
			/////////////////

		$output .= '</div>' . "\r";
		$output .= '<!-- radiantthemes-twitter-widget -->' . "\r";
		return $output;
			
		}
	}
}
