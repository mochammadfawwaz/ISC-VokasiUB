<?php
/**
 * Template for Blog Item Eight.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="data">';
            $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
            $output .= '<p class="excerpt">' . get_the_excerpt() . '</p>';
            $output .= '<div class="author-info">';
                $output .= '<img class="author-info-image" src="' . get_avatar_url( get_the_author_meta('ID') ) . '" alt="' . esc_html__('Author Image', 'radiantthemes-addon') . '">';
                $output .= '<p class="author-info-name">' . get_the_author() . '</p>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
