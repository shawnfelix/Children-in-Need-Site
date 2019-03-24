<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package GivingPress Lite
 * @since GivingPress Lite 1.0
 */

?>

<!-- END .container -->
</div>

<!-- BEGIN .footer -->
<div class="footer">

	<!-- BEGIN .content -->
	<div class="content no-bg">

		<?php if ( is_active_sidebar( 'footer' ) ) { ?>

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN .footer-widgets -->
			<div class="footer-widgets <?php echo givingpress_lite_count_widgets( 'footer' ); ?>">

				<?php dynamic_sidebar( 'footer' ); ?>

			<!-- END .footer-widgets -->
			</div>

		<!-- END .row -->
		</div>

		<?php } ?>

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN .footer-information -->
			<div class="footer-information">

				<div class="align-left">

					<p><?php esc_html_e( 'Copyright', 'givingpress-lite' ); ?> &copy; <?php echo date( esc_html__( 'Y', 'givingpress-lite' ) ); ?> &middot; <?php esc_html_e( 'All Rights Reserved', 'givingpress-lite' ); ?> &middot; <?php bloginfo( 'name' ); ?></p>

					<p><a href="https://givingpress.com/theme/givingpress-lite/" target="_blank"><?php esc_html_e( 'Nonprofit Website', 'givingpress-lite' ); ?></a> <?php esc_html_e( 'by GivingPress', 'givingpress-lite' ); ?> &middot; <a href="<?php bloginfo( 'rss2_url' ); ?>"><?php esc_html_e( 'RSS Feed', 'givingpress-lite' ); ?></a> &middot; <?php wp_loginout(); ?></p>

				</div>

				<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

				<div class="align-right">

					<?php wp_nav_menu( array(
						'theme_location' => 'social-menu',
						'title_li' => '',
						'depth' => 1,
						'container_class' => 'social-menu',
						'menu_class'      => 'social-icons',
						'link_before'     => '<span>',
						'link_after'      => '</span>',
						)
					); ?>

				</div>

				<?php } ?>

			<!-- END .footer-information -->
			</div>

		<!-- END .row -->
		</div>

	<!-- END .content -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>

</body>
</html>
