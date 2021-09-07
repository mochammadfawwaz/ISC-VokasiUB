<?php
/**
 * Template Style Four for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x150.png' ) . '" alt="Blank Image" width="100" height="150">';
            if ( 'yes' === $shortcode['team_enable_link'] ) {
                $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
            } else {
                $output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
            }
        $output .= '</div>';
        $output .= '<div class="data">';
            $output .= '<h4 class="title">' . get_the_title() . '</h4>';
            $terms = get_the_terms( get_the_ID(), 'profession' );
            if ( ! empty( $terms ) ) {
            	foreach ( $terms as $term ) {
            		$output .= '<p class="designation">' . $term->name . '</p>';
            	}
            }
            $output .= '<ul class="social-icon">';
                if ( !empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                    $output .= '<li class="facebook"><a href="' . get_post_meta( get_the_ID(), '_team_facebook', true ) . '"><i class="fa fa-facebook"></i></a></li>';
                }
                if ( !empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                    $output .= '<li class="twitter"><a href="' . get_post_meta( get_the_ID(), '_team_twitter', true ) . '"><i class="fa fa-twitter"></i></a></li>';
                }
                if ( !empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                    $output .= '<li class="gplus"><a href="' . get_post_meta( get_the_ID(), '_team_gplus', true ) . '"><i class="fa fa-google-plus"></i></a></li>';
                }
                if ( !empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                    $output .= '<li class="pinterest"><a href="' . get_post_meta( get_the_ID(), '_team_pinterest', true ) . '"><i class="fa fa-pinterest-p"></i></a></li>';
                }
            $output .= '</ul>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
