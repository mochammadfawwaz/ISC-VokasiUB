<?php
/**
 * Timeline Template Style Three
 *
 * @package RadiantThemes
 */

$output .= '<!-- radiantthemes-timeline-item -->';
$output .= '<div class="radiantthemes-timeline-item" data-thumb="' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '">';
    $output .= '<div class="row">';
        if ( !empty( wp_get_attachment_url( $shortcode['radiant_timeline_image'], 'full' ) ) ) {
            $output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                $output .= '<div class="radiantthemes-timeline-item-pic matchHeight">';
                    $output .= '<div class="table">';
                        $output .= '<div class="table-cell">';
                            $output .= '<div class="radiantthemes-timeline-item-pic-holder">';
                                $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x106.png' ) . '" alt="blank image" width="100" height="106">';
                                $output .= '<div class="radiantthemes-timeline-item-pic-main" style="background-image:url(' . wp_get_attachment_url( $shortcode['radiant_timeline_image'], 'full' ) . ');"></div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        }
        if ( !empty( wp_get_attachment_url( $shortcode['radiant_timeline_image'], 'full' ) ) ) {
            $output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        } else {
            $output .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        }
            $output .= '<div class="radiantthemes-timeline-item-data matchHeight">';
                $output .= '<div class="table">';
                    $output .= '<div class="table-cell">';
                        $output .= '<p class="date">' . esc_html( $shortcode['radiant_timeline_date_month'] ) . ', ' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '</p>';
                        $output .= '<h4 class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
                        $output .= '<p>' . $content . '</p>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- radiantthemes-timeline-item -->';
