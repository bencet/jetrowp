<?php
/**
 * Template Name: Page Home
 *
 * The template for displaying home page
 *
 * It is a custom template made by Bence.
 */

get_header(); ?>
	
	<?php
		$args = array( 'post_type' => 'slide', );
		$loop = new WP_Query( $args );	
		$count = 0;
	?>
	<div class="slider">
		<img class="prev" src="<?php bloginfo('stylesheet_directory'); ?>/images/previous.png">
		<img class="next" src="<?php bloginfo('stylesheet_directory'); ?>/images/next.png">
		<div id="carousel">
			<div class="item" style="background-image: url('http://aidea.hu/jetrowp/wp-content/uploads/2015/07/nagy.jpg');">
				<div class="big">
					<div class="box">
						<h3><?php while ( $loop->have_posts() ) : $loop->the_post(); 
						$count++;
						if ($count == 1) { 
							the_title(); 
							echo '</h3>';
							the_content();  }							
						endwhile;	?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="small">
			<ul id="thumbs" class="images">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li><?php the_post_thumbnail() ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
	
<div class="clear"></div>

<div class="features">
<?php  if( have_rows('features') ):
	while( have_rows('features') ): the_row(); 
		
		// vars
		$icon = get_sub_field('icons');
		$title = get_sub_field('title');
		$content = get_sub_field('content');?>
		<div class="items">
			<div class="headers">
				<div><img class="icons" src="<?php $icon ?>"/></div>
				<div class="title"><?php $title ?></div>
			</div>
			<?php $content ?>
			<div class="button"><a href="#">MORE</a></div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
</div>
<div class="recent">
<div class="midline"><span>RECENT WORKS</span></div>

<?php $arguments = array(
    'numberposts' => 4,
    'post_type' => 'portfolio' );

    $recent_posts = wp_get_recent_posts( $arguments );
	
	foreach( $recent_posts as $recent ){
		echo '<div class="post">'.
				get_the_post_thumbnail($recent["ID"], 'thumbnail') .
				'<div class="inpost">
				<p class="pp1">' . $recent["post_title"]. '</p>
				<p class="pp2">'.
				date( 'F j, Y', strtotime( $recent['post_date'] ) ) .
				'</p></div></div>';
	}
?>
</div>

<?php get_footer(); ?>