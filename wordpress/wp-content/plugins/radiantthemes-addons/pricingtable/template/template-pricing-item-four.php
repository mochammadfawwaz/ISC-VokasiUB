<?php
/**
 * Template Style Four Pricing Table
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="spotlight-tag">';
$output .= '<p class="spotlight-tag-text">' . esc_html__('Popular Choice', 'radiantthemes-addon') . '</p>';
$output .= '</div>';
$output .= '<div class="heading">';
if ( ! empty( $shortcode['pricing_table_title'] ) ) {
	$output .= '<h4 class="title">' . $shortcode['pricing_table_title'] . '</h4>';
}
if ( ! empty( $shortcode['pricing_table_subtitle'] ) ) {
	$output .= '<p class="subtitle">' . $shortcode['pricing_table_subtitle'] . '</p>';
}
$output .= '</div>';
$output .= '<div class="pricing">';
if ( ! empty( $shortcode['pricing_table_price'] ) ) {
	$output .= '<p class="price"><sup>' . $shortcode['pricing_table_currency_symbol'] . '</sup>' . $shortcode['pricing_table_price'] . '<sub>' . $shortcode['pricing_table_period'] . '</sub></p>';
}
if ( ! empty( $shortcode['pricing_table_tagline'] ) ) {
	$output .= '<p class="tagline">' . $shortcode['pricing_table_tagline'] . '</p>';
}
$output .= '</div>';
$content = preg_replace('~</?p[^>]*>~', '', $content);
$output .= '<div class="list">' . $content . '</div>';
$output .= '<div class="more">';
$output .= '<a class="btn" href="' . $shortcode['pricing_table_button_link'] . '">' . $shortcode['pricing_table_button'] . '</a>';
$output .= '</div>';
$output .= '</div>';
