<?php
/**
 * Template for Contact Box Element One.
 *
 * @package RadiantThemes
 */

$output .= '<ul class="contact">';
if( $shortcode['contact_box_address'] ){
    $output .= '<li class="address"><i class="fa fa-map-marker"></i><strong>' . esc_html__('Address', 'radiantthemes-addons') . '</strong> ' . $shortcode['contact_box_address'] . '</li>';
}
if( $shortcode['contact_box_email'] ){
    $output .= '<li class="email"><i class="fa fa-envelope"></i><strong>' . esc_html__('Email', 'radiantthemes-addons') . '</strong> ' . $shortcode['contact_box_email'] . '</li>';
}
if( $shortcode['contact_box_phone'] ){
    $output .= '<li class="phone"><i class="fa fa-phone"></i><strong>' . esc_html__('Phone', 'radiantthemes-addons') . '</strong> ' . $shortcode['contact_box_phone'] . '</li>';
}
if( $shortcode['contact_box_fax'] ){
    $output .= '<li class="fax"><i class="fa fa-fax"></i><strong>' . esc_html__('Fax', 'radiantthemes-addons') . '</strong> ' . $shortcode['contact_box_fax'] . '</li>';
}
if( $shortcode['contact_box_whatsapp'] ){
    $output .= '<li class="whatsapp"><i class="fa fa-whatsapp"></i><strong>' . esc_html__('WhatsApp', 'radiantthemes-addons') . '</strong> ' . $shortcode['contact_box_whatsapp'] . '</li>';
}
$output .= '</ul>';
