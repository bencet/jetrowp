<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
</div>

<div class="footer">	
	<div class="container2">
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : 
			dynamic_sidebar( 'sidebar-2' ); ?>
		<?php endif; ?>
		
		<div class="clear">
		</div>
	</div>
</div>	
<?php wp_footer(); ?>

</body>
</html>
