<?php
/**
 * The sidebar containing the main widget area
 *
 */
?>
<div class="sidebar">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) :
		dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>
</div>
