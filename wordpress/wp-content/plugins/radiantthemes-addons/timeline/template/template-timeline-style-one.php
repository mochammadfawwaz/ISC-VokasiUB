<?php
/**
 * Timeline Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<!-- radiantthemes-timeline-item -->';
$output .= '<div class="radiantthemes-timeline-item">';
    $output .= '<div class="radiantthemes-timeline-item-datestamp">' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '</div>';
    $output .= '<div class="holder">';
        if ( !empty( wp_get_attachment_url( $shortcode['radiant_timeline_image'], 'full' ) ) ) {
            $output .= '<div class="radiantthemes-timeline-item-pic">';
                $output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x46.png' ) . '" alt="blank image" width="100" height="46">';
                $output .= '<div class="radiantthemes-timeline-item-pic-main" style="background-image:url(' . wp_get_attachment_url( $shortcode['radiant_timeline_image'], 'full' ) . ');"></div>';
            $output .= '</div>';
        }
        $output .= '<div class="radiantthemes-timeline-item-data">';
            $output .= '<p class="month">' . esc_html( $shortcode['radiant_timeline_date_month'] ) . '</p>';
            $output .= '<h4 class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
            $output .= '<p>' . $content . '</p>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- radiantthemes-timeline-item -->';
