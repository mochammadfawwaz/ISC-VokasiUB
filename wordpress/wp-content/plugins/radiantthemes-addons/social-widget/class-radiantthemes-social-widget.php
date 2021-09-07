<?php
/**
 * RadiantThemes_Style_Social_Widget  Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Social_Widget' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Social_Widget extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Social Widget', 'radiantthemes-addons' ),
					'base'        => 'rt_social',
					'description' => esc_html__( 'The most recent posts thumbnail', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Social Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One (With White Background)', 'radiantthemes-addons' )  => 'one',
								esc_html__( 'Style Two (With Black Background)', 'radiantthemes-addons' )  => 'two',
								esc_html__( 'Style Three (Only Icon)', 'radiantthemes-addons' )            => 'three',
								esc_html__( 'Style Four (With Border)', 'radiantthemes-addons' )           => 'four',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Hover Color', 'radiantthemes-addons' ),
							'param_name'  => 'hover_color',
							'description' => esc_html__( 'Set your Hover Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
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
			add_shortcode( 'rt_social', array( $this, 'radiantthemes_social_widget_func' ) );
		}

		/**
		 * [radiantthemes_social_widget_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_social_widget_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation' => 'one',
					'hover_color'     => '',
                    'extra_class'     => '',
                    'extra_id'        => '',
				),
				$atts
			);

		// GENERATE RANDOM CLASS.
		$random_class = 'rt' . rand();

		if ( ! empty( $shortcode['hover_color'] ) ) {
			// ADD CUSTOM CSS.
			$custom_css = ".radiantthemes-social-widget.element-one.{$random_class} > ul.radiantthemes-social-widget-buttons > li > a:hover,
			.radiantthemes-social-widget.element-two.{$random_class} > ul.radiantthemes-social-widget-buttons > li > a:hover,
			.radiantthemes-social-widget.element-four.{$random_class} > ul.radiantthemes-social-widget-buttons > li > a:hover{
				background-color: {$shortcode['hover_color']};
			}
			.radiantthemes-social-widget.element-three.{$random_class} > ul.radiantthemes-social-widget-buttons > li > a:hover{
				color: {$shortcode['hover_color']};
			}
			.radiantthemes-social-widget.element-four.{$random_class} > ul.radiantthemes-social-widget-buttons > li > a{
				border-color: {$shortcode['hover_color']};
			}";
				wp_register_style( 'social-widget', false );
				wp_enqueue_style( 'social-widget' );

				wp_add_inline_style( 'social-widget', $custom_css );
		}

		// GET ID.
		$id = $shortcode['extra_id'] ? ' id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

		// MAIN LAYOUT.
		$output  = '<div class="radiantthemes-social-widget ' . esc_attr( $random_class ) . ' element-' . esc_attr( $shortcode['style_variation'] ) . ' ' .  esc_attr( $shortcode['extra_class'] ) . '" ' . $id . '>';

		if ( true == appon_global_var( 'social-icon-target', '', false ) ) {
			$social_target = ' target="_blank"';
		} else {
			$social_target = '';
		}

		$output .='<ul class="radiantthemes-social-widget-buttons">';
		 if ( ! empty( appon_global_var( 'social-icon-googleplus', '', false ) ) ) :
				$output .= '<li class="google-plus"><a href="';
				$output .= esc_url( appon_global_var( 'social-icon-googleplus', '', false ) ).'"';
				$output .= esc_attr( $social_target ).'>';
				$output .= '<i class="fa fa-google-plus"></i></a></li>';

			 endif;


        if ( ! empty( appon_global_var( 'social-icon-facebook', '', false ) ) ) :
				$output .='<li class="facebook"><a href="'.esc_url( appon_global_var( 'social-icon-facebook', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-facebook"></i></a></li>';
			 endif;
		if ( ! empty( appon_global_var( 'social-icon-twitter', '', false ) ) ) :
				$output .='<li class="twitter"><a href="'.esc_url( appon_global_var( 'social-icon-twitter', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-twitter"></i></a></li>';
			 endif;
		if ( ! empty( appon_global_var( 'social-icon-vimeo', '', false ) ) ) :
				$output .='<li class="vimeo"><a href="'.esc_url( appon_global_var( 'social-icon-vimeo', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-vimeo"></i></a></li>';
			 endif;
			if ( ! empty( appon_global_var( 'social-icon-youtube', '', false ) ) ) :
				$output .='<li class="youtube"><a href="'.esc_url( appon_global_var( 'social-icon-youtube', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-youtube"></i></a></li>';

	    endif;
	    if ( ! empty( appon_global_var( 'social-icon-flickr', '', false ) ) ) :
			 	$output .='<li class="flickr"><a href="'.esc_url( appon_global_var( 'social-icon-flickr', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-flickr"></i></a></li>';

			 endif;
		 if ( ! empty( appon_global_var( 'social-icon-linkedin', '', false ) ) ) :
		 	$output .='<li class="linkedin"><a href="'.esc_url( appon_global_var( 'social-icon-linkedin', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-linkedin"></i></a></li>';

		endif;
		if ( ! empty( appon_global_var( 'social-icon-pinterest', '', false ) ) ) :
					$output .='<li class="pinterest"><a href="'.esc_url( appon_global_var( 'social-icon-pinterest', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-pinterest"></i></a></li>';

		endif;
		 if ( ! empty( appon_global_var( 'social-icon-xing', '', false ) ) ) :
					$output .='<li class="xing"><a href="'.esc_url( appon_global_var( 'social-icon-xing', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-xing"></i></a></li>';

		endif;
		 if ( ! empty( appon_global_var( 'social-icon-viadeo', '', false ) ) ) :
		 	$output .='<li class="viadeo"><a href="'.esc_url( appon_global_var( 'social-icon-viadeo', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-viadeo"></i></a></li>';

		endif;
		if ( ! empty( appon_global_var( 'social-icon-vkontakte', '', false ) ) ) :
		 	$output .='<li class="vkontakte"><a href="'.esc_url( appon_global_var( 'social-icon-vkontakte', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-vkontakte"></i></a></li>';
		endif;
		 if ( ! empty( appon_global_var( 'social-icon-tripadvisor', '', false ) ) ) :
		 	$output .='<li class="tripadvisor"><a href="'.esc_url( appon_global_var( 'social-icon-tripadvisor', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-tripadvisor"></i></a></li>';

		endif;
		 if ( ! empty( appon_global_var( 'social-icon-tumblr', '', false ) ) ) :
		 $output .='<li class="tumblr"><a href="'.esc_url( appon_global_var( 'social-icon-tumblr', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-tumblr"></i></a></li>';

		endif;
		if ( ! empty( appon_global_var( 'social-icon-behance', '', false ) ) ) :
		 	$output .='<li class="behance"><a href="'.esc_url( appon_global_var( 'social-icon-behance', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-behance"></i></a></li>';

		endif;
		 if ( ! empty( appon_global_var( 'social-icon-instagram', '', false ) ) ) :
		 	$output .='<li class="instagram"><a href="'.esc_url( appon_global_var( 'social-icon-instagram', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-instagram"></i></a></li>';

		endif;
		 if ( ! empty( appon_global_var( 'social-icon-dribbble', '', false ) ) ) :
		 	$output .='<li class="dribbble"><a href="'.esc_url( appon_global_var( 'social-icon-dribbble', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-dribbble"></i></a></li>';

		endif;
		 if ( ! empty( appon_global_var( 'social-icon-skype', '', false ) ) ) :
		 	$output .='<li class="skype"><a href="'.esc_url( appon_global_var( 'social-icon-skype', '', false ) ).'" '.esc_attr( $social_target ).'><i class="fa fa-skype"></i></a></li>';

		endif;

			$output .='</ul>';

		$output .= '</div>' . "\r";
			$output .= '<!-- social -->' . "\r";
		return $output;

		}
	}
}
