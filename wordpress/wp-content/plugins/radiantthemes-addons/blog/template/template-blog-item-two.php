<?php
/**
 * Template for Blog Item Two.
 *
 * @package RadiantThemes
 */

// POST FORMAT QUOTE.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x89.png' ) . '" alt="Blank Image" width="100" height="89">';
        $output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></div>';
        $output .= '<div class="overlay"></div>';
        $output .= '<div class="data">';
            $output .= '<div class="table">';
                $output .= '<div class="table-cell">';
                    $output .= '<a class="btn" href="' . get_the_permalink() . '"><i class="fa fa-caret-right"></i></a>';
                    $output .= '<ul class="meta-data">';
                        $output .= '<li class="date">' . get_the_date() . '</li>';
                        $output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
                    $output .= '</ul>';
                    $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';