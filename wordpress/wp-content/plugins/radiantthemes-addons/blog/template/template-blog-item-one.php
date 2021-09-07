<?php
/**
 * Template for Blog Item One.
 *
 * @package RadiantThemes
 */

if ( has_post_format( 'image' ) ) {
    
    // POST FORMAT IMAGE.
    $output .= '<!-- blog-item -->';
    $output .= '<article class="blog-item post-format-image ' . $rt_animation . '" ' . $time . '>';
        $output .= '<div class="holder">';
            $output .= '<div class="pic">';
                $output .= '<a class="holder" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $query->ID, 'large' ) . '</a>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</article>';
    $output .= '<!-- blog-item -->';
    
} elseif ( has_post_format( 'quote' ) ) {
    
    // POST FORMAT QUOTE.
    $output .= '<!-- blog-item -->';
    $output .= '<article class="blog-item post-format-quote ' . $rt_animation . '" ' . $time . '>';
        $output .= '<div class="holder">';
            $output .= '<div class="data">';
                $output .= '<div class="data-holder">';
                    $output .= '<ul class="meta-data">';
                        $output .= '<li class="date">' . get_the_date() . '</li>';
                        $output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
                    $output .= '</ul>';
                    $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                    $output .= '<h5 class="author">' . get_the_author() . '</h5>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</article>';
    $output .= '<!-- blog-item -->';
    
} elseif ( has_post_format( 'status' ) ) {
    
    // POST FORMAT STATUS.
    $output .= '<!-- blog-item -->';
    $output .= '<article class="blog-item post-format-status ' . $rt_animation . '" ' . $time . '>';
        $output .= '<div class="holder">';
            $output .= '<div class="data">';
                $output .= '<div class="data-holder">';
                    $output .= '<ul class="meta-data">';
                        $output .= '<li class="date">' . get_the_date() . '</li>';
                        $output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
                    $output .= '</ul>';
                    $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                    $output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__('Read More', 'radiantthemes-addons') . '</a>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</article>';
    $output .= '<!-- blog-item -->';
    
} else {
    
    // POST FORMAT STANDARD.
    $output .= '<!-- blog-item -->';
    $output .= '<article class="blog-item post-format-standard ' . $rt_animation . '" ' . $time . '>';
        $output .= '<div class="holder">';
            $output .= '<div class="pic">';
                $output .= '<a class="holder" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $query->ID, 'large' ) . '</a>';
            $output .= '</div>';
            $output .= '<div class="data">';
                $output .= '<div class="data-holder">';
                    $output .= '<ul class="meta-data">';
                        $output .= '<li class="date">' . get_the_date() . '</li>';
                        $output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
                    $output .= '</ul>';
                    $output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                    $output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__('Read More', 'radiantthemes-addons') . '</a>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</article>';
    $output .= '<!-- blog-item -->';
    
}
