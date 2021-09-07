<?php
/**
 * RadiantThemes_Style_Post  Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Post' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Post extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Recent Post', 'radiantthemes-addons' ),
					'base'        => 'rt_post_thumbnail',
					'description' => esc_html__( 'The most recent posts element.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Recent Post Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )  => 'one',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'No. of Posts to show:', 'radiantthemes-addons' ),
							'param_name'  => 'number',
							'description' => esc_html__( 'Enter number of posts to display.Leave blank to use default post number.(i.e 4)', 'radiantthemes-addons' ),
							'admin_label' => true,
							'value'     => 4,
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
			add_shortcode( 'rt_post_thumbnail', array( $this, 'radiantthemes_post_thumbnail_widget_func' ) );
		}

		/**
		 * [radiantthemes_post_thumbnail_widget_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_post_thumbnail_widget_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'  => 'one',
                    'number'           => '4',
                    'extra_class'      => '',
                    'extra_id'         => '',
                	), $atts
			);
			
			

			
			$output = '';
			
					
			$maxposts=$shortcode['number'];

			$instance='maxposts='.$maxposts;
		
			$id = $shortcode['extra_id'] ? ' id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

		    // MAIN LAYOUT.
		    $output  = '<div class="radiantthemes-recent-post-widget element-' . esc_attr( $shortcode['style_variation'] ) . ' ' .  esc_attr( $shortcode['extra_class'] ) . '" ' . $id . '>';

			    $output  .='<ul class="radiantthemes-recent-post-widget-holder">';
				
    				$query = new WP_Query(
    					array(
    						'post_type'      => 'post',
    						'posts_per_page' => $maxposts,
    						'orderby'        => 'ID',
    						'order'          => 'DESC',
    
    					)
    				);
    				while ( $query->have_posts() ) :
					$query->the_post();
    					
    				$output  .='<li class="radiantthemes-recent-post-widget-post">';
    				    $output .= '<p class="date">'. get_the_date(). '</p>';
    			        $output .= '<a href="' . get_the_permalink() . '"><p class="title">' . get_the_title() . '</p></a>';
    				$output .= '</li>';
    					
    				endwhile; 
				
			    $output .='</ul>';
		    $output .='</div>';
			

			return $output;
			
		}
	}
}
