<?php
/**
 * Template for Blog Item Ten.
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
            $output .= '<div class="date-box">';
                $output .= '<p class="date-box-day">' . get_the_date('d') . '</p>';
                $output .= '<p class="date-box-month">' . get_the_date('M') . '</p>';
            $output .= '</div>';
            
            $output .= '<div class="holder">';
                $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                $output .= '<p class="excerpt">' . get_the_excerpt() . '</p>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';