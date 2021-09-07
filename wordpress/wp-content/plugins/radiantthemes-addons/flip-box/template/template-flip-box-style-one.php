<?php
/**
 * Template Flip Box Style One.
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
    $output .= '<div class="first-card matchHeight ' . esc_attr( $flip_box_first_card_css_class ) . '">';
        $output .= '<div class="first-card-main">';
            if ( ! empty( $shortcode['flip_box_first_card_image'] ) ) {
            	$output .= wp_get_attachment_image( $shortcode['flip_box_first_card_image'], 'full' );
            }
            if ( ! empty( $shortcode['flip_box_first_card_title'] ) ) {
            	$output .= '<h4>' . esc_attr( $shortcode['flip_box_first_card_title'] ) . '</h4>';
            }
            if ( ! empty( $shortcode['flip_box_first_card_content'] ) ) {
            	$output .= '<p>' . strip_tags( $shortcode['flip_box_first_card_content'] ) . '</p>';
            }
            $output .= '<div class="clearfix"></div>';
        $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="second-card matchHeight ' . esc_attr( $flip_box_second_card_css_class ) . '">';
        $output .= '<div class="second-card-main">';
            if ( ! empty( $shortcode['flip_box_second_card_title'] ) ) {
            	$output .= '<h4>' . esc_attr( $shortcode['flip_box_second_card_title'] ) . '</h4>';
            }
            if ( ! empty( $shortcode['flip_box_second_card_content'] ) ) {
            	$output .= '<p>' . strip_tags( $shortcode['flip_box_second_card_content'] ) . '</p>';
            }
            $output .= '<a class="btn" href="' . esc_url( $flip_box_second_card_button_url ) . '" target="' . esc_html( $flip_box_second_card_button_target ) . '" rel="' . esc_html( $flip_box_second_card_button_rel ) . '">' . esc_attr( $flip_box_second_card_button_title ) . '<i class="fa fa-long-arrow-right"></i></a>';
            $output .= '<div class="clearfix"></div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
