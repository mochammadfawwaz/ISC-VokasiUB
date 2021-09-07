<?php
/**
 * Template Style Three for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x120.png' ) . '" alt="Blank Image" width="100" height="120">';
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
            if ( ! empty( get_the_excerpt() ) ) {
                $output .= '<p class="excerpt">' . get_the_excerpt() . '</p>';
            }
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
