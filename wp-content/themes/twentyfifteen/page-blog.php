<?php
/**
 * Template Name: Page Blog
 *
 * The template for displaying posts on blog page
 *
 * It is a custom template made by Bence.
 */

get_header(); ?>

			<?php 
			// Start the loop.
			while ( have_posts() ) : the_post();
				the_content();

			// End the loop.
			endwhile;
			?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>