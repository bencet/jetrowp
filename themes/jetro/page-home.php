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
		$args = array( 'post_type' => 'slide', 'posts_per_page' => '6');
		$loop = new WP_Query( $args );	
		$count = 0;
	?>
	
<div class="slider">
	<img class="prev" src="<?php bloginfo('stylesheet_directory'); ?>/images/previous.png">
	<img class="next" src="<?php bloginfo('stylesheet_directory'); ?>/images/next.png">
	<div id="carousel">
			
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php if (has_post_thumbnail( $loop->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'single-post-thumbnail' ); ?>
			
		<div class="item" style="background-image: url('<?php echo $image[0]; ?>')">
			<div class="big">
			 <?php if (get_the_title()){ ?>
				<div class="box">
					<h3> 
					<?php
						the_title(); 
						echo '</h3>';
						the_content();  				
					?>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>
	<?php endwhile;	?>
	</div>
		
	<div class="small">
		<ul id="thumbs" class="images">	
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php if (has_post_thumbnail( $loop->ID ) ): ?>
					<li><?php the_post_thumbnail('small-slide'); ?></li>			
				<?php endif; ?>
			<?php endwhile;	?>	
		</ul>	
	</div>		
</div>	

<div class="clear"></div>

<div class="features">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php  if( have_rows('features') ):
			while( have_rows('features') ): the_row(); 	
		
				$icon = get_sub_field('icons');
				$title = get_sub_field('title');
				$content = get_sub_field('content');?>
				
				<div class="items">
					<div class="headers">
						<div><img class="icons" src="<?php echo $icon; ?>"/></div>
						<div class="title"><?php echo $title; ?></div>
					</div>
					<?php echo $content; ?>
					<div class="button"><a href="#">MORE</a></div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>
</div>

<div class="recent">
	<div class="midline"><span>RECENT WORKS</span></div>

	<?php
		$args = array( 'post_type' => 'portfolio', 'posts_per_page' => '4');
		$loop_recent = new WP_Query( $args );	
	?>

	<?php while ( $loop_recent->have_posts() ) : $loop_recent->the_post(); ?>
		<?php if (has_post_thumbnail( $loop_recent->ID ) ): ?>
		
		<div class="post">
			<?php the_post_thumbnail(); ?>
			<div class="inpost">
				<p class="pp1"><?php the_title(); ?></p>
				<p class="pp2"><?php the_time('F d, Y'); ?></p>
			</div>
		</div>
		<?php endif; ?>
	<?php endwhile;	?>
	
</div>

<?php get_footer(); ?>