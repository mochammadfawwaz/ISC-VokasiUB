<?php
/**
 * Template for Blog Item Six.
 *
 * @package RadiantThemes
 */
    
// POST FORMAT STANDARD.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x63.png' ) . '" alt="Blank Image" width="100" height="63">';
            $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
        $output .= '</div>';
        $output .= '<div class="data">';
            $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
            $output .= '<p>' . substr( get_the_excerpt() , 0, 150) . '...</p>';
            $output .= '<a class="btn" href="' . get_the_permalink() . '">';
                $output .= '<span class="btn-sub-one">' . esc_html__('Read More', 'radiantthemes-addon') . '<i class="fa fa-long-arrow-right"></i></span>';
                $output .= '<span class="btn-sub-two"><i class="fa fa-long-arrow-right"></i></span>';
            $output .= '</a>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
