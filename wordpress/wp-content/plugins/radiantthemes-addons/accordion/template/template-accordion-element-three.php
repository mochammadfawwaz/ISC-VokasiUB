<?php
/**
 * Accordion Template Style Three
 *
 * @package Radiantthemes
 */

$output .= '<div class="radiantthemes-accordion-item">';
$output .= '<div class="radiantthemes-accordion-item-title">';
$output .= '<div class="radiantthemes-accordion-item-title-icon"><div class="line"></div></div>';
$output .= '<h4 class="panel-title">' . esc_attr( $shortcode['accordion_item_title'] ) . '</h4>';
$output .= '</div>';
$output .= '<div class="radiantthemes-accordion-item-body">';
$output .= $content;
$output .= '</div>';
$output .= '</div>';
