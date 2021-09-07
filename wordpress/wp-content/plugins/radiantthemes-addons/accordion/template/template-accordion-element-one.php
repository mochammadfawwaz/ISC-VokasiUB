<?php
/**
 * Accordion Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<div class="radiantthemes-accordion-item">';
$output .= '<div class="radiantthemes-accordion-item-title">';
$output .= '<div class="radiantthemes-accordion-item-title-icon"><i class="main-icon"></i></div>';
$output .= '<h4 class="panel-title">' . esc_attr( $shortcode['accordion_item_title'] ) . '</h4>';
$output .= '</div>';
$output .= '<div class="radiantthemes-accordion-item-body">';
$output .= $content;
$output .= '</div>';
$output .= '</div>';
