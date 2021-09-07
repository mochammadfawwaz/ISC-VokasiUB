<?php
/**
 * Template for Blog Item Four.
 *
 * @package RadiantThemes
 */

// POST FORMAT QUOTE.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="pic">';
            $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
        $output .= '</div>';
        $output .= '<div class="data">';
            $output .= '<ul class="meta-data">';
                $output .= '<li class="date"><i class="fa fa-calendar-o"></i>' . get_the_date() . '</li>';
            $output .= '</ul>';
            $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
            $output .= '<p class="excerpt">' . substr( get_the_excerpt() , 0, 90 ) . '...</p>';
        $output .= '</div>';
        $output .= '<div class="more">';
            $output .= '<a class="btn" href="' . get_the_permalink() . '"><span>' . esc_html__('Read More', 'radiantthemes-addons') . '</span></a>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';