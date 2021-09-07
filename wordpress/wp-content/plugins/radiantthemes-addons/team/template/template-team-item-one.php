<?php
/**
 * Template Style One for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x78.png' ) . '" alt="Blank Image" width="100" height="78">';
        $output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
        $output .= '<div class="color-overlay"></div>';
        $output .= '<div class="data">';
            $output .= '<div class="table">';
                $output .= '<div class="table-cell">';
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
        if ( 'yes' === $shortcode['team_enable_link'] ) {
            $output .= '<a class="cursor-overlay" href="' . get_the_permalink() . '" style="cursor:url(' . plugins_url( 'radiantthemes-addons/assets/images/Black-Cursor.png' ) . ') 33 33, auto;"></a>';
        } else {
            $output .= '<div class="cursor-overlay" style="cursor:url(' . plugins_url( 'radiantthemes-addons/assets/images/Black-Cursor.png' ) . ') 33 33, auto;"></div>';
        }
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
