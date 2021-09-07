<?php
/**
 * Template for Blog Item Nine.
 *
 * @package RadiantThemes
 */

// POST FORMAT QUOTE.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder matchHeight">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x63.png' ) . '" alt="Blank Image" width="100" height="63">';
            $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
        $output .= '</div>';
        $output .= '<div class="data">';
            $output .= '<ul class="meta-data">';
                $output .= '<li class="date">' . get_the_date() . '</li>';
            $output .= '</ul>';
            $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';