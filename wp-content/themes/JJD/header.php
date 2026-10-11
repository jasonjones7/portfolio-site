<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/3c5559653c.js" crossorigin="anonymous"></script>

	<!-- Animate on Scroll -->
  	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Jomhuria&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">





<style>
		/* Align the navbar (logo left, menu right) to the same content gutter as the page
		   content (.jj-row uses 56px on desktop / 24px on mobile) so it doesn't run edge-to-edge. */
		#wrapper-navbar .navbar { padding-left: 56px; padding-right: 56px; }
		#wrapper-navbar .navbar > .container-fluid { padding-left: 0; padding-right: 0; }
		@media (max-width: 860px) {
			#wrapper-navbar .navbar { padding-left: 24px; padding-right: 24px; }
		}
	</style>

</head>

<body <?php body_class(); ?>>

<div class="site" id="page">
<div class="page-wrap">


	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite" style="padding-top:16px; background:#14110D;">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md">

		<?php if ( 'container' == $container ) : ?>
			<div class="container-fluid">
		<?php endif; ?>

				<!-- ===== Logo / site brand (LEFT) — pulls from Settings → General → Site Title ===== -->
				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size:36px; font-weight:900;" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- ===== The WordPress Menu (RIGHT-aligned via ml-auto/ms-auto) ===== -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto ms-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>



			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
