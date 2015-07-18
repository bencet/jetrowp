<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="acontainer">
<div class="acontainer-inner">

	<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_content();
			
		// End the loop.
		endwhile;
		?>
</div>
<div class="clearForMedia"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
