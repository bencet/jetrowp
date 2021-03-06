<?php
/**
 * The main template file, displays the posts on Blog page.
 */

get_header(); ?>
	<div class="bcontainer">
		<div class="bcontainer1">

		<?php 
			$args=array(
				'post_status' => 'publish',
				'paged' => get_query_var('paged'),
			);
			$my_query = null;
			$my_query = new WP_Query($args);
			
			while ($my_query->have_posts()) : $my_query->the_post();
			
			if ( has_post_format( 'quote' )) { ?>
					<div class="quote">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/qu.jpg">
						<p>	<?php the_excerpt(); ?>	</p>
					</div>
			<?php }		
			else if ( has_post_format( 'link' )) {  ?>
					<div class="attachment">
						<div class="title"><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></div>
						<div class="tenpx"></div>
						<p> <?php the_excerpt(); ?> </p>
					</div>
			<?php } 
			else { ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<img class="blog" <?php	the_post_thumbnail('blog'); ?>
					<?php
						$string = array();
						$tags = get_the_tags();
					?>		
					<?php } ?>
					
					<div>
						<div class="title tmobile"><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></div>
						<div class="dataco">
							<p>date<br><span><?php the_time('F d, Y') ?></span></p>
							<p>tags<br><span>
							<?php if ($tags) {
									foreach( $tags as $tag ) {
										$string[] = $tag->name;
									}
									echo implode( ', ' , $string );
								}		?></span></p>
							<p>comments<br><span>4</span></p>
						</div>
						<div class="titcon">
							<div class="title tdesktop"><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></div>
							<div> <?php the_excerpt(); ?> </div>
						</div>	
					</div>
			<?php } ?>
			<div class="clear"></div>
			<div class="midlineb"></div>
			
			<?php endwhile; ?>
		<?php wp_pagenavi(); ?>
		<div class="clearForMedia"></div>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
