<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appon
 */
?>

	<?php
    $footerBuilder_id = appon_global_var('footer_list_text', '', false);
    $getFooterPost = get_post($footerBuilder_id);
    $content = $getFooterPost->post_content;
    echo "<!-- wraper_footer -->";
    echo "<footer class='wraper_footer custom-footer'>";
    echo "<div class='container'>";
    echo do_shortcode($content);
    echo "</div>";
    echo "</footer>";
    echo "<!-- wraper_footer -->";
    ?>