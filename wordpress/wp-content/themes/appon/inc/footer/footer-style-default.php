<?php
/**
 * Footer Default Section
 *
 * @package appon
 */
?>

<?php
if ( 'footer-default' === appon_global_var( 'footer-style', '', false ) ) {
	include get_parent_theme_file_path( 'inc/footer/footer-style-one.php' );
} elseif ( 'footer-custom' === appon_global_var( 'footer-style', '', false ) ) {
	include get_parent_theme_file_path( 'inc/footer/footer-custom.php' );
} else {
	?>
<!-- wraper_footer -->
<footer class="wraper_footer style-default">
	<!-- wraper_footer_copyright -->
	<div class="wraper_footer_copyright">
		<div class="container">
			<!-- row -->
			<div class="row footer_copyright">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- footer_copyright -->
					<div class="footer_copyright">
						<p><?php echo esc_html__( 'Appon Theme ', 'appon' ); ?> - <?php echo esc_html( date( 'Y' ) ); ?> | <?php echo esc_html__( 'Designed by RadiantThemes ', 'appon' ); ?></p>
					</div>
					<!-- footer_copyright -->
				</div>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_footer_copyright -->
</footer>
<!-- wraper_footer -->
	<?php
} ?>
