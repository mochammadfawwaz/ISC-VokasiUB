<?php
/**
 * Timeline Template Style Two
 *
 * @package Radiantthemes
 */

$output .= '<!-- radiantthemes-timeline-item -->';
$output .= '<div class="radiantthemes-timeline-item">';
    $output .= '<div class="radiantthemes-timeline-item-line"></div>';
    $output .= '<div class="radiantthemes-timeline-item-dot"></div>';
    $output .= '<div class="row">';
        $output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
            $output .= '<div class="radiantthemes-timeline-item-datestamp">';
                $output .= '<div class="holder">' . esc_html( $shortcode['radiant_timeline_date_month'] ) . ' <strong>' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '</strong></div>';
            $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
            if ( wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'thumbnail' ) ){
                $output .= '<div class="radiantthemes-timeline-item-pic">';
                    $output .= wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'thumbnail' );
                $output .= '</div>';
            }
            $output .= '<div class="radiantthemes-timeline-item-data">';
                $output .= '<h4 class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
                $output .= '<p>' . $content . '</p>';
            $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="clearfix"></div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- radiantthemes-timeline-item -->';
