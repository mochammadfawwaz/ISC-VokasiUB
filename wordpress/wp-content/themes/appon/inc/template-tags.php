<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package appon
 */

if ( ! function_exists( 'appon_global_var' ) ) {
	/**
	 * [appon_global_var description]
	 *
	 * @param  [type] $appon_opt_one   description.
	 * @param  [type] $appon_opt_two   description.
	 * @param  [type] $appon_opt_check description.
	 * @return [type]                          description
	 */
	function appon_global_var(
		$appon_opt_one,
		$appon_opt_two,
		$appon_opt_check
	) {
		global $appon_theme_option;
		if ( $appon_opt_check ) {
			if ( isset( $appon_theme_option[ $appon_opt_one ][ $appon_opt_two ] ) ) {
				return $appon_theme_option[ $appon_opt_one ][ $appon_opt_two ];
			}
		} else {
			if ( isset( $appon_theme_option[ $appon_opt_one ] ) ) {
				return $appon_theme_option[ $appon_opt_one ];
			}
		}
	}
}



if ( ! function_exists( 'appon_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function appon_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string          = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$author_image = sprintf(
			get_avatar( get_the_author_meta('email'), '150' )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'appon' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		$published_on = sprintf(
			/* translators: %s: post date. */
			//esc_html_x( 'Published On - %s', 'post date', 'appon' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

				printf(
					wp_kses_post(
						'<div class="holder">
                            <div class="author-image hidden">' . $author_image . '</div>
                                <div class="data">
                                    <div class="meta">'
					)
				);
				
    				printf(
                        wp_kses_post(
    						'<span class="published-on">' . esc_html__('Posted on', 'appon') . ' ' . $published_on . '</span>
    						<span class="byline">' . esc_html__('by', 'appon') . ' ' . $byline . '</span>'
    					)
    				);

            		// Hide category and tag text for pages.
            		if ( 'post' === get_post_type() ) {
            		    if ( is_single() ) {
                            /* translators: used between list items, there is a space after the comma */
                            if ( true == appon_global_var( 'display_categries', '', false ) ) :
                            $categories_list = get_the_category_list( esc_html__( ', ', 'appon' ) );
                            if ( $categories_list && appon_categorized_blog() ) {
                            	printf(
                            		wp_kses_post( '<span class="category">' . esc_html__('in', 'appon') . '' ) .
                            		/* translators: used between list items, there is a space after the comma */
                            		esc_html( ' %1$s' ) .
                            		wp_kses_post( '</span>' ),
                            		wp_kses_post( $categories_list )
                            	);
                            }
                            endif;
            		    }
            		}
		
					// <li class="category"><i class="fa fa-th-large"></i> ' . $fromcategory . '</li>
				
				echo ' </div>
			</div>
		</div>';

	}
endif;
function appon_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'appon_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'appon_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so appon_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so appon_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in appon_categorized_blog.
 */
function appon_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'appon_categories' );
}
add_action( 'edit_category', 'appon_category_transient_flusher' );
add_action( 'save_post', 'appon_category_transient_flusher' );
