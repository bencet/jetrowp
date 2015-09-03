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
	?>
	<div class="slider">
		<img class="prev" src="images/previous.png">
		<img class="next" src="images/next.png">
		<div id="carousel">
			<div class="item" style="background-image: url('http://aidea.hu/jetrowp/wp-content/uploads/2015/07/nagy.jpg');">
				<div class="big">
					<div class="box">
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
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
		<div class="items">
			<div class="headers">
				<div><img class="icons" src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/fogask.jpg"/></div>
				<div class="title">check out my latest portfolio items</div>
			</div>
			Maecenas ipsum metus, semper hendrerit varius mattis, congue sit amet tellus.
			Aliquam ullamcorper dui sed magna posue re ut elementum enim rutrum. Nami mi erat, 
			porta id ultrices nec, pellentesque vel nunc. Cras varius fermentum iaculis.
			Aenean sodales nibh non lectus tempor a interdum justo ultricies.
			<div class="button"><a href="#">MORE</a></div>
		</div>
	
		<div class="items">
			<div class="headers">
			<div><img class="icons" src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/pipa.jpg" alt="" /></div>
<div class="title">offer top notch quality work & services</div>
</div>
Maecenas ipsum metus, semper hendrerit varius mattis, congue sit amet tellus. Aliquam ullamcorper dui sed magna posue re ut elementum enim rutrum. Nami mi erat, porta id ultrices nec, pellentesque vel nunc. Cras varius fermentum iaculis. Aenean sodales nibh non lectus tempor a interdum justo ultricies.
<div class="button"><a href="#">MORE</a></div>
</div>
<div class="items">
<div class="headers">
<div><img class="icons" src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/ember.jpg" alt="" /></div>
<div class="title">follow me on twitter, facebook &amp; pinterest</div>
</div>
Maecenas ipsum metus, semper hendrerit varius mattis, congue sit amet tellus. Aliquam ullamcorper dui sed magna posue re ut elementum enim rutrum. Nami mi erat, porta id ultrices nec, pellentesque vel nunc. Cras varius fermentum iaculis. Aenean sodales nibh non lectus tempor a interdum justo ultricies.
<div class="button"><a href="#">MORE</a></div>
</div>
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