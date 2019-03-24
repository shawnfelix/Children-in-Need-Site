<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package GivingPress Lite
 * @since GivingPress Lite 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- IE Compatibility Off -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- Mobile View -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( bloginfo( 'pingback_url' ) ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrapper -->
<div id="wrapper">

<?php include 'navbar.php'; ?>

<?php $header_image = get_header_image(); ?>

<?php if ( ! is_page() || is_home() || is_page() && ! has_post_thumbnail() ) { ?>
<?php if ( 'blank' != get_theme_mod( 'header_textcolor' ) || ! empty( $header_image ) ) { ?>

<!-- BEGIN #header -->
<div id="header">

	<?php if ( ! empty( $header_image ) ) { ?>

	<!-- BEGIN .custom-header -->
	<div class="custom-header bg-image" style="background-image:linear-gradient( rgba(111, 111, 111, 0), rgba(33, 33, 33, 0.58) ), url(<?php header_image(); ?>);">

	<?php } ?>

	<!-- BEGIN #site-info -->
	<div id="site-info">

		<!-- BEGIN .content -->
		<div class="content">

			<div id="header-content" <?php if ( ! empty( $header_image ) ) { ?>class="vertical-center"<?php } ?>>

				<?php if ( 'blank' != get_theme_mod( 'header_textcolor' ) ) { ?>

					<!-- BEGIN #masthead -->
					<div id="masthead">

						<h2 class="site-description">
							<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
						</h2>

					<!-- END #masthead -->
					</div>

				<?php } ?>

			</div>

			<?php if ( ! empty( $header_image ) ) { ?>

			<img class="hide-img" src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />

			<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END #site-info -->
	</div>

	<?php if ( ! empty( $header_image ) ) { ?>

	<!-- BEGIN .custom-header -->
	</div>

	<?php } ?>

<!-- END #header -->
</div>

<?php } ?>
<?php } ?>

<!-- BEGIN .container -->
<div class="container container-opaque">
