<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="line"> </div>
<div class="container">
<div class="header">
	<a href="http://aidea.hu/jetrowp/"> <h2>JET<span>RO</span></h2></a>
	<nav id="mobile-menu">
		<div class="hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
					) );	?>
		<?php endif; ?>
	</nav>
</div>
<div class="clear"></div>
<?php if ( ! is_front_page() ) : ?>
	<?php get_line1(); ?>
<?php endif; ?>
