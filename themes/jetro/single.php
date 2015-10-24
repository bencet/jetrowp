<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
<div class="bcontainer">
<div class="bcontainer1">

	<?php
		while ( have_posts() ) : the_post(); ?>
		    
			<?php if ( has_post_thumbnail() ) { ?>
			<?php 
				$string = array();
				$tags = get_the_tags();
				
			?>
				<img class="blog" <?php	the_post_thumbnail('blog'); ?>
			<?php } ?>
			<div class="datacoSingle">
				<div>
					<p>date<br><span><?php the_time('F d, Y') ?></span></p>
				</div>
				<div>
					<p>tags<br><span>
					<?php 
						if ($tags) {
							foreach( $tags as $tag ) {
								$string[] = $tag->name;
							}			
							echo implode( ', ' , $string ); 
						}?>
					</span></p>
				</div>
				<div>
					<p>comments<br><span>4</span></p>
				</div>
			</div>
			<div class="titconSingle">
				<?php the_content(); ?>
			</div>
	<?php endwhile; ?>
		
</div>
<div class="clearForMedia"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
