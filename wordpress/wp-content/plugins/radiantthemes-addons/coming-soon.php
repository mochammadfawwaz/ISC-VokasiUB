<?php
/**
 * Template for Coming Soon Page
 *
 * @package appon
 */

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<!-- wraper_comingsoon_main -->
		<div class="wraper_comingsoon_main style-<?php echo esc_attr( appon_global_var( 'coming_soon_style', '', false ) ); ?>">
			<?php if ( 'one' === appon_global_var( 'coming_soon_style', '', false ) ) : ?>
				<!-- START OF 404 STYLE ONE CONTENT -->
				<div class="table">
					<div class="table-cell">
						<!-- comingsoon_main -->
						<div class="comingsoon_main">
							<div class="holder">
								<?php
								if ( appon_global_var( 'coming_soon_one_content', '', false ) ) {
									echo wp_kses_post( appon_global_var( 'coming_soon_one_content', '', false ) );
								}
								?>
							</div>
							<!-- comingsoon-counter -->
							<div class="comingsoon-counter" data-launch-date="<?php echo esc_attr( appon_global_var( 'coming_soon_datetime', '', false ) ); ?>">
							</div>
							<!-- comingsoon-counter -->
						</div>
						<!-- comingsoon_main -->
					</div>
				</div>
				<!-- END OF 404 STYLE ONE CONTENT -->
			<?php elseif ( 'two' === appon_global_var( 'coming_soon_style', '', false ) ) : ?>
				<!-- START OF 404 STYLE TWO CONTENT -->
				<div class="table">
					<div class="table-cell">
						<!-- comingsoon_main -->
						<div class="comingsoon_main">
							<div class="holder">
								<?php
								if ( appon_global_var( 'coming_soon_two_content', '', false ) ) {
									echo wp_kses_post( appon_global_var( 'coming_soon_two_content', '', false ) );
								}
								?>
							</div>
							<!-- comingsoon-counter -->
							<div class="comingsoon-counter" data-launch-date="<?php echo esc_attr( appon_global_var( 'coming_soon_datetime', '', false ) ); ?>">
							</div>
							<!-- comingsoon-counter -->
						</div>
						<!-- comingsoon_main -->
					</div>
				</div>
				<!-- END OF 404 STYLE TWO CONTENT -->
			<?php elseif ( 'three' === appon_global_var( 'coming_soon_style', '', false ) ) : ?>
				<!-- START OF 404 STYLE THREE CONTENT -->
				<div class="table">
					<div class="table-cell">
						<!-- comingsoon_main -->
						<div class="comingsoon_main">
							<div class="holder">
								<?php
								if ( appon_global_var( 'coming_soon_three_content', '', false ) ) {
									echo wp_kses_post( appon_global_var( 'coming_soon_three_content', '', false ) );
								}
								?>
							</div>
							<!-- comingsoon-counter -->
							<div class="comingsoon-counter" data-launch-date="<?php echo esc_attr( appon_global_var( 'coming_soon_datetime', '', false ) ); ?>">
							</div>
							<!-- comingsoon-counter -->
						</div>
						<!-- comingsoon_main -->
					</div>
				</div>
				<!-- END OF 404 STYLE THREE CONTENT -->
			<?php endif; ?>
		</div>
		<!-- wraper_comingsoon_main -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php wp_footer(); ?>

</body>
</html>
