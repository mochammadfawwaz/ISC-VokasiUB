<?php
/**
 * Fancy Text Box Template Style Four
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder ' . esc_attr( $fancy_css ) . '">';
    $output .= '<div class="main-placeholder">';
        $output .= '<div class="icon">';
            if ( $shortcode['fancy_textbox_icontype'] == 'image' && $shortcode['fancy_textbox_image'] !== '' ) {
                $output .= wp_get_attachment_image( $shortcode['fancy_textbox_image'], 'full' );
            }
            if ( $shortcode['fancy_textbox_icontype'] == 'icon' && $shortcode['fancy_textbox_icon_icofont'] !== '' ) {
                $output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
            }
        $output .= '</div>';
        $output .= '<div class="data">';
            if ( $shortcode['fancy_textbox_title'] !== '' ) {
                if ( esc_url( $fancy_textbox_link_url ) !== '' ) {
                    $output .= '<h4 class="title"><a href="' . esc_url( $fancy_textbox_link_url ) . '" ' .  $fancy_textbox_link_target  . '' .  $fancy_textbox_link_rel  . '>' . esc_attr( $shortcode['fancy_textbox_title'] ). '</a></h4>';
                } else {
                    $output .= '<h4 class="title">' . esc_attr( $shortcode['fancy_textbox_title'] ). '</h4>';
                }
            }
            if ( $shortcode['fancy_textbox_subtitle'] !== '' ) {
                $output .= '<p class="subtitle">' . esc_attr( $shortcode['fancy_textbox_subtitle'] ). '</p>';
            }
            if ( $shortcode['fancy_textbox_content'] !== '' ) {
                $output .= '<div class="content">';
                    $output .= '<p>' . wp_kses_post( $shortcode['fancy_textbox_content'] ) . '</p>';
                $output .= '</div>';
            }
            if ( esc_url( $fancy_textbox_link_url ) !== '' ) {
                $output .= '<div class="more">';
                    $output .= '<a class="btn" href="' . esc_url( $fancy_textbox_link_url ) . '" ' .  $fancy_textbox_link_target  . '' .  $fancy_textbox_link_rel  . '>' . esc_attr__( 'Learn More', 'radiantthemes-addon' ). '<i class="fa fa-arrow-right"></i></a>';
                $output .= '</div>';
            }
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
