<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
</div><!-- .site -->
<div class="footer">	
	<div class="container2">
		<div class="foot">
			<h3>ABOUT JETRO</h3>
			<p>Lorem ipsum dolor sit amet, malorum recteque
			reprehendunt ea vel. Urbanitas adoslescens vim
			te, per at tritani aperiri. Adhuc invenire convenire
			his ea. Id mei vitae deinique, in eam commodo
			veritus disputando.</p>
			<p>Pro et erant delicata, eu vim essent imperdiet
			accommodare, dictas deseruisse ius an. Solet
			everti definitionem id ius, sonet oporteat cu vim.</p>
		</div>
		<div class="foot">
			<h3>TWITTER WIDGET</h3>
			<p><span>@pixameter</span> What an awesome design
			with great functionality :)</p>
			<p><span>about 1 hour ago</span></p>
			<p><span style="color:#C3C3C3">@designdude</span> What an awesome design
			with great functionality :)</p>
			<p><span>about 2 hour ago</span></p>
			<p>Follow <span>@<?php echo get_option('user'); ?></span></p>
		</div>
		<div class="foot">
			<h3>CONTACT US</h3>
			<p>Lorem ipsum dolor sit amet, malorum recteque
			reprehendunt ea vel. Urbanitas adolescens vim
			te, per at tritani aperiri.
			<p>Tel: <?php echo get_option('phone'); ?><br>
			Email: <?php echo get_option('e-mail'); ?></p>
			<div class="social">
				<ul>
					<li><a href="http://www.facebook.com"><img src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/fb.png"></a></li>
					<li><a href="http://www.twitter.com"><img src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/tw.png"></a></li>
					<li><a href="mailto:torok.bence.2@stud.u-szeged.hu"><img src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/em.png"></a></li>
					<li><a href="http://www.rss.com"><img src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/rs.png"></a></li>
					<li><a href="http://www.vimeo.com"><img src="http://aidea.hu/jetrowp/wp-content/uploads/2015/07/vm.png"></a></li>
				</ul>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
</div>	
<?php wp_footer(); ?>

</body>
</html>
