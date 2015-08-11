<?php
/**
 * Template Name: Page Portfolio
 *
 * The template for displaying portfolio page
 *
 * It is a custom template made by Bence.
 */

get_header(); ?>

<div class="pcontainer">	
		<ul>
			<li><a href="#" id="filter-all" class="selected filter">all</a></li>
			<li><a href="#" id="filter-print" class="filter">print</a></li>
			<li><a href="#" id="filter-web" class="filter">web</a></li>
			<li><a href="#" id="filter-photoshop" class="filter">photoshop</a></li>
			<li><a href="#" id="filter-wordpress" class="filter">wordpress</a></li>
		</ul>
	<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_content();
			
		// End the loop.
		endwhile;
	?>
</div>
<?php get_footer(); ?>