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
		$args = array( 'post_type' => 'portfolio', 'posts_per_page' => '-1' );
		$portfolios = new WP_Query( $args );
		$i=0;		
		
		while ( $portfolios->have_posts() ) : $portfolios->the_post(); 		
		
			$i++;
			echo '<div class="ppost _'.$i; 
			
			$terms_of_post =strip_tags( get_the_term_list( $post->ID, 'portfolio_tag', ' ', ' ' ));			
			echo $terms_of_post;
			
			if($i%4==0) {echo ' ppostp">'; } else {echo '">';}			
				the_post_thumbnail(); 
				echo '<div class="inpost"><p class="pp1">'; 
				the_title(); 
				echo '</p><p class="pp2">';			
				the_time( get_option( 'date_format' ) );
			echo '</p></div></div>';
			
		endwhile;	
	?>
</div>
<?php get_footer(); ?>