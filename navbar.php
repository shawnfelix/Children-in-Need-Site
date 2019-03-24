<!-- BEGIN #top-info -->
<div id="top-info">

	<?php if ( get_theme_mod( 'givingpress_lite_contact_email', 'info@givingpress.com' ) || get_theme_mod( 'givingpress_lite_contact_phone', '808.123.4567' ) || get_theme_mod( 'givingpress_lite_contact_address', '231 Front Street, Lahaina, HI 96761' ) ) { ?>

	<!-- BEGIN #contact-info -->
	<div id="contact-info">

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN .content -->
			<div class="content">

				<div class="contact-info-wrapper align-left">

				<?php if ( get_theme_mod( 'givingpress_lite_contact_address', '231 Front Street, Lahaina, HI 96761' ) ) { ?>
					<span class="contact-address"><i class="fa fa-map-marker"></i> <?php echo esc_html( get_theme_mod( 'givingpress_lite_contact_address', '231 Front Street, Lahaina, HI 96761' ) ); ?></span>
				<?php } ?>

				<?php if ( get_theme_mod( 'givingpress_lite_contact_email', 'info@givingpress.com' ) ) { ?>
					<span class="contact-email text-right"><i class="fa fa-envelope"></i> <a class="link-email" href="mailto:<?php echo esc_html( get_theme_mod( 'givingpress_lite_contact_email', 'info@givingpress.com' ) ); ?>" target="_blank"><?php echo esc_html( get_theme_mod( 'givingpress_lite_contact_email', 'info@givingpress.com' ) ); ?></a></span>
				<?php } ?>

				<?php if ( get_theme_mod( 'givingpress_lite_contact_phone', '808.123.4567' ) ) { ?>
					<span class="contact-phone text-right"><i class="fa fa-phone"></i> <?php echo esc_html( get_theme_mod( 'givingpress_lite_contact_phone', '808.123.4567' ) ); ?></span>
				<?php } ?>

				</div>

				<?php if ( '1' == get_theme_mod( 'givingpress_lite_display_header_search', '1' ) ) { ?>

				<div class="align-right">

					<div class="header-search clearfix"><?php get_template_part( 'searchform' ); ?></div>

				</div>

				<?php } ?>

			<!-- END .content -->
			</div>

		<!-- END .row -->
		</div>

	<!-- END #contact-info -->
	</div>

	<?php } ?>

	<!-- BEGIN #top-nav -->
	<div id="top-nav">

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN .content -->
			<div class="content no-bg">

				<!-- BEGIN #nav-bar -->
				<div id="nav-bar">

					<?php if ( has_nav_menu( 'main-menu' ) ) { ?>

						<div class="toggle-holder">

					<?php } ?>

					<?php givingpress_lite_custom_logo(); ?>

					<?php if ( has_nav_menu( 'main-menu' ) ) { ?>

						<button class="menu-toggle"><i class="fa fa-bars"></i></button>

						</div>
						<div style="display:inherit">
							<a id="nav-donate-button" class="button large" href="https://www.paypal.me/cinhp"><span class="btn-holder"><?php echo get_theme_mod( 'givingpress_lite_donation_link_text', 'Donate' ); ?></span></a>
							<!-- BEGIN #navigation -->
							<nav id="navigation" class="navigation-main">

								<?php wp_nav_menu( array(
									'theme_location' 		=> 'main-menu',
									'title_li' 					=> '',
									'depth' 						=> 4,
									'fallback_cb'     	=> 'wp_page_menu',
									'container_class' 	=> '',
									'menu_class'      	=> 'menu',
									)
								); ?>
							<!-- END #navigation -->
							</nav>
						</div>
					<?php } elseif ( current_user_can( 'publish_posts' ) ) { ?>

						<!-- BEGIN #navigation -->
						<nav id="navigation" class="navigation-main">

							<p class="instruction"><?php printf( wp_kses( __( 'Create a Custom Navigation Menu <a href="%1$s">here</a>.', 'givingpress-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'nav-menus.php' ) ) ); ?></p>

						<!-- END #navigation -->
						</nav>

					<?php } ?>

				<!-- END #nav-bar -->
				</div>

			<!-- END .content -->
			</div>

		<!-- END .row -->
		</div>

	<!-- END #top-nav -->
	</div>

<!-- END #top-info -->
</div>