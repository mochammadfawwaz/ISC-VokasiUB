<?php
/**
 * Template for Blog Item One.
 *
 * @package RadiantThemes
 */
if($data%4) {

    // SMALL LAYOUT.
    $output .= '<!-- blog-item -->';
    $output .= '<article class="blog-item small-layout ' . $rt_animation . '" ' . $time . '>';
        $output .= '<div class="holder">';
            $output .= '<div class="pic">';
                $output .= '<div class="pic-placeholder">';
                    $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x80.png' ) . '" alt="Blank Image" width="100" height="80">';
                    $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
                $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="data">';
                $output .= '<ul class="meta-data">';
                    $output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
                    $output .= '<li class="date">' . get_the_date() . '</li>';
                $output .= '</ul>';
                $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                $output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__('Read More', 'radiantthemes-addons') . '...</a>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</article>';
    $output .= '<!-- blog-item -->';

} else {

    // LARGE LAYOUT.
    $output .= '<!-- blog-item -->';
    $output .= '<article class="blog-item large-layout ' . $rt_animation . '" ' . $time . '>';
        $output .= '<div class="holder">';
            $output .= '<div class="pic">';
                $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x52.png' ) . '" alt="Blank Image" width="100" height="52">';
                $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
            $output .= '</div>';
            $output .= '<div class="data">';
                $output .= '<ul class="meta-data">';
                    $output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
                    $output .= '<li class="date">' . get_the_date() . '</li>';
                $output .= '</ul>';
                $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                $output .= '<p>' . substr( get_the_excerpt() , 0, 160) . '...</p>';
                $output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__('Continue Reading', 'radiantthemes-addons') . '...</a>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</article>';
    $output .= '<!-- blog-item -->';

} $data++;
