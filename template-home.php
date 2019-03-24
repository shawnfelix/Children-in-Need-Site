<?php
/**
Template Name: Home Page
 *
 * This template is used to display the home page.
 *
 * @package GivingPress Lite
 * @since GivingPress Lite 1.0
 */

get_header(); ?>

<?php $thumb = ( get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'giving-featured-large' ) : false; ?>

<?php if ( has_post_thumbnail() ) { ?>
	<div class="feature-img page-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background: linear-gradient(
      rgba(255, 0, 0, 0.45), 
      rgba(255, 0, 0, 0.45)
    ),url(<?php echo esc_url( $thumb[0] ); ?>);" <?php } ?>>
		<h1 class="headline img-headline"><?php the_title(); ?></h1>
		<?php the_post_thumbnail( 'giving-featured-large' ); ?>
	</div>
<?php } ?>

<?php get_template_part( 'content/content', 'home' ); ?>
</div>
<?php get_footer(); ?>
