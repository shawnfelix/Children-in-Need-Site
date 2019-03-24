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


<!-- BEGIN .container -->
<div class="container container-opaque">
