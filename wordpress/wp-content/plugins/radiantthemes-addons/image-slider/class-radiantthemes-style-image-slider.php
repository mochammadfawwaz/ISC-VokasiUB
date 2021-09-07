<?php
/**
 * Image Slider Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Image_Slider' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Image_Slider extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Image Slider', 'radiantthemes-addons' ),
					'base'        => 'rt_image_slider',
					'description' => esc_html__( 'Add Image Slider.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Image-Slider-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_image_slider',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Image Slider Style', 'radiantthemes-addons' ),
							'param_name'  => 'image_slider_style_variation',
							'value'       => array(
								esc_html__( 'Style One (Icon and Title)', 'radiantthemes-addons' )  => 'one',
								esc_html__( 'Style Two (3D Stack)', 'radiantthemes-addons' )        => 'two',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'attach_images',
							'heading'     => esc_html__( 'Upload Images', 'radiantthemes-addons' ),
							'holder'      => 'div',
							'param_name'  => 'image_slider_url',
							'description' => esc_html__( 'Upload Images for Slider', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Images on Desktop', 'radiantthemes-addons' ),
							'param_name'  => 'images_in_desktop',
							'description' => esc_html__( 'Images on Desktop (in single row)', 'radiantthemes-addons' ),
							'value'       => '3',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Images on Tab', 'radiantthemes-addons' ),
							'param_name'  => 'images_in_tab',
							'description' => esc_html__( 'Images on Tab (in single row)', 'radiantthemes-addons' ),
							'value'       => '2',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Images on Mobile', 'radiantthemes-addons' ),
							'param_name'  => 'images_in_mobile',
							'description' => esc_html__( 'Images on Mobile (in single row)', 'radiantthemes-addons' ),
							'value'       => '1',
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
			add_shortcode( 'rt_image_slider', array( $this, 'radiantthemes_image_slider_style_func' ) );
		}

		/**
		 * [radiantthemes_image_slider_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_image_slider_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'image_slider_style_variation' => 'one',
					'image_slider_url'             => '',
					'images_in_desktop'            => '3',
                    'images_in_tab'                => '2',
                    'images_in_mobile'             => '1',
					'extra_class'                  => '',
					'extra_id'                     => '',
				), $atts
			);

			$image_ids = explode( ',', $shortcode['image_slider_url'] );
			
			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
        		'radiantthemes-addons-custom',
        		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
        	);
        	wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			$output  = '<div class="rt-image-slider element-' . $shortcode['image_slider_style_variation'] . ' owl-carousel" data-owl-desktop-items="' . $shortcode['images_in_desktop'] . '" data-owl-tab-items="' . $shortcode['images_in_tab'] . '" data-owl-mobile-items="' . $shortcode['images_in_mobile'] . '">';
			foreach ( $image_ids as $img_id ) {
				$images_src          = wp_get_attachment_image_src( $img_id, 'full' );
				$images_title        = get_post( $img_id )->post_title;
				$images_description  = get_post( $img_id )->post_content;
				
				if ( 'one' === $shortcode['image_slider_style_variation'] ) {
				    $output .= '<div class="rt-image-slider-item">';
        				$output .= '<div class="holder">';
        				    $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x91.png' ) . '" alt="blank image" width="100" height="91">';
        				    $output .= '<div class="pic" style="background-image:url('. $images_src[0] .')"></div>';
        				    $output .= '<div class="data">';
        				        $output .= '<div class="table">';
        				            $output .= '<div class="table-cell">';
        				                $output .= '<div class="icon"><i class="fa fa-camera"></i></div>';
        				                $output .= '<h5 class="title">' . $images_title . '</h5>';
        				                $output .= '<p class="description">' . $images_description . '</p>';
    				                $output .= '</div>';
				                $output .= '</div>';
			                $output .= '</div>';
			                $output .= '<a class="overlay fancybox" href="' . $images_src[0] . '"></a>';
        				$output .= '</div>';
    				$output .= '</div>';
    			} elseif ( 'two' === $shortcode['image_slider_style_variation'] ) {
    			    $output .= '<div class="rt-image-slider-item">';
        				$output .= '<div class="holder">';
        				    $output .= '<div class="pic">';
        				        $output .= '<img src="'. $images_src[0] .'" alt="'. $images_title .'">';
        				    $output .= '</div>';
        				$output .= '</div>';
    				$output .= '</div>';
    			}
				
			}
			$output .= '</div>';
			
			

			return $output;
		}
	}
}