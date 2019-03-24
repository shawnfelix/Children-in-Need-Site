<?php
/**
 * This template is displays the home content.
 *
 * @package GivingPress Lite
 * @since GivingPress Lite 1.0
 */

?>

<?php if ( get_theme_mod( 'givingpress_lite_donation_tagline', 'Donations Are Welcome' ) && '' != get_theme_mod( 'givingpress_lite_donation_tagline', 'Donations Are Welcome' ) ) { ?>


<!-- BEGIN .row -->
<div class="row section-text">
	<div class="text-center">
		<h1 class="headline">Our Mission</h1>
		<div class="row-content radius-full shadow" style="font-family:QanelasLight; padding: 30px 0px;">
			<h1>Over <span style="color:#d21515">50 percent</span> of Haitian children do not have <br>access to education.</h1>
		</br>
			<div class="subtitle-lines">
				<h1 class="margin-lines">
					<span>We're here to change that.</span>
				</h1>
			</div>
		</br>
		</div>
	</div>
	</h1>
<!-- END .row -->
</div>


<?php } ?>

<?php
	$page_one = get_theme_mod( 'givingpress_lite_page_one', '0' );
	$page_two = get_theme_mod( 'givingpress_lite_page_two', '0' );
	$page_three = get_theme_mod( 'givingpress_lite_page_three', '0' );
	$page_four = get_theme_mod( 'givingpress_lite_page_four', '0' );
?>

<!-- Featured Pages Small Section -->
<?php if ( $page_one && $page_two || $page_two && $page_thre || $page_one && $page_three ) { ?>

<!-- BEGIN .featured-pages -->
<section class="featured-pages">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content no-bg">

			<?php if ( $page_one ) { ?>

			<div class="holder clearfix">
				<?php $recent = new WP_Query( array(
					'page_id' => $page_one,
				) );
				while ( $recent->have_posts() ) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home-page', 'small' ); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>

			<?php } ?>

			<?php if ( $page_two ) { ?>

			<div class="holder clearfix">
				<?php $recent = new WP_Query( array(
					'page_id' => $page_two,
				) );
				while ( $recent->have_posts() ) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home-page', 'small' ); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>

			<?php } ?>

			<?php if ( $page_three ) { ?>

			<div class="holder clearfix">
				<?php $recent = new WP_Query( array(
					'page_id' => $page_three,
				) );
				while ( $recent->have_posts() ) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home-page', 'small' ); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>

			<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .featured-pages -->
</section>

<?php } ?>

<!-- Featured Page Wide Section -->
<?php if ( $page_four ) { ?>

	<?php $recent = new WP_Query( array(
		'page_id' => $page_four,
	) );
	while ( $recent->have_posts() ) : $recent->the_post(); ?>
		<?php $thumb = ( get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'giving-featured-large' ) : false; ?>
		<?php $has_content = get_the_content(); ?>

		<!-- BEGIN .featured-page -->
		<section class="featured-page background-scroll"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);"<?php } ?>>

			<!-- BEGIN .row -->
			<div class="row">

				<?php get_template_part( 'content/home-page', 'wide' ); ?>
				<?php if ( has_post_thumbnail() ) { ?><span class="img-shade"></span><?php } ?>

			<!-- END .row -->
			</div>

		<!-- END .featured-page -->
		</section>

		<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

<?php } ?>

<?php if ( '0' == $page_one && '0' == $page_two && '0' == $page_three && '0' == $page_four ) { ?>

<!-- BEGIN .set-options -->
<section class="set-options">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content not-set radius-full">

			<!-- BEGIN .postarea -->
			<div class="postarea full">

				<?php get_template_part( 'content/content', 'none' ); ?>

			<!-- END .postarea -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .set-options -->
</section>
</div>
<?php } ?>
