<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 *
 */

get_header(); ?>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_content();
			
		// End the loop.
		endwhile;
		?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
