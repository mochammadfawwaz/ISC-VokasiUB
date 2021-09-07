<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
		if ( 'default' === appon_global_var( 'blog-style', '', false ) && get_post() && ! preg_match( '/vc_row/', get_post()->post_content ) ) { 
			 the_title( '<h1 class="entry-title">', '</h1>' );
	     } elseif( ! class_exists( 'ReduxFrameworkPlugin' ) && ! preg_match( '/vc_row/', get_post()->post_content ) ) { 
	     	the_title( '<h1 class="entry-title">', '</h1>' ); 
	    }
	    ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'appon' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
